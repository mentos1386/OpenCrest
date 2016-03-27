<?php

namespace OpenCrest;

use GuzzleHttp\Psr7\Response;
use OpenCrest\Interfaces\FactoryInterface;
use OpenCrest\Interfaces\ObjectInterface;

class Factory implements FactoryInterface
{
    /**
     * @param ObjectInterface $object
     * @param array           $data
     * @param Response        $response
     * @return ObjectInterface
     */
    function create(ObjectInterface $object, array $data, Response $response = NULL)
    {
        if (isset($data['items']) or isset($data[0])) {

            // If we have list of items
            $object = $this->createList($object, $data);

        } else {
            // TODO: Some things don't provide ID, possible BUG, that it isn't implemented in CREST
            if (isset($data["id"])) {
                $object->setAttribute("id", $data['id']);
                $uri = $object->getAttribute("uri") . $object->getAttribute("id") . "/";
                $object->setAttribute("uri", $uri);
            }

            foreach ($data as $key => $value) {
                if (array_key_exists($key, $object->getRelations())) {

                    // ˇˇ
                    if (is_string($value)) {
                        // TODO: Sometimes relationship is only a string with href, not array like usually.
                        // TODO: When crest behaves as it should, remove this!
                        // Seen in GET crest.../wars/21/  value "killmails"
                        $object->setValue($key, $value);
                        continue;
                    }
                    // ^^

                    // Create new relation object with relation_id
                    $relation = $object->getRelations($key);
                    $object->setValue($key, $this->create(new $relation($object->getAttribute("id")), $value));
                } else {
                    $object->setValue($key, $value);
                }
            }
        }

        // Add cache-control header to Object, but only if this Endpoint made request
        //  we cant add cache-control for relationships, as we don't have data for them
        if ($response) {
            $object->setAttribute("cache", $response->getHeader("cache-control")[0]);
        }

        return $object;
    }

    /**
     * Custom make function, as ListObject is differently processed
     *
     * @param ObjectInterface $object
     * @param array           $data
     * @return ObjectInterface
     */
    private function createList(ObjectInterface $object, array $data)
    {
        // We check if items are inside in items array, or directly
        if (isset($data['items'])) {
            $items = $data['items'];
        } else {
            $items = $data;
        }

        $values = [];
        $values["totalCount"] = isset($data['totalCount']) ? $data['totalCount'] : count($items);
        $values["pageCount"] = isset($data['pageCount']) ? $data['pageCount'] : 0;

        array_merge($values, $this->parsePages($data));

        $values['items'] = [];

        foreach ($items as $item) {

            // TODO: $types->dogma->attributes->items[0] returns values inside "attribute" array, same with dogma->effects->items[0]
            if (isset($item["attribute"])) {
                $item = $item["attribute"];
            } elseif (isset($item['effect'])) {
                $item = $item["effect"];
            }

            // Create new object
            $_item = $this->create(clone $object, $item);

            // In rare cases, you can get object listing through one endpoint, but get specific object through another
            // This is the case for regions->buy/sellOrders where you get list of orders, but you access those orders
            if ($object->getAttribute("listUri")) {
                $_item->setAttribute("uri", $object->getAttribute("listUri"));
            }

            // Push item to items
            array_push($values['items'], $_item);
        }

        // Set all values
        $object->setValues($values);

        return $object;
    }

    /**
     * We parse next and previous pages depending on date we received
     *
     * @param $pages
     * @return array
     */
    private function parsePages($pages)
    {
        $values = [];

        if (isset($pages['next'])) {
            $values['nextPage'] = [
                'href' => $pages['next']['href'],
                'page' => ($this->parseUrl($pages['next']['href'])['page'] ? (int)$this->parseUrl($pages['next']['href'])['page'] : NULL)
            ];
        }
        if (isset($pages['previous'])) {
            $values['previousPage'] = [
                'href' => $pages['previous']['href'],
                'page' => (int)(!empty($this->parseUrl($pages['previous']['href'])) ? $this->parseUrl($pages['previous']['href'])['page'] : 1)
            ];
        }

        return $values;
    }

    /**
     * Used when parsing Pages
     *
     * @param $url
     * @return string
     */
    private function parseUrl($url)
    {
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $value);

        return $value;
    }

    /**
     * @param ObjectInterface $object
     * @param array           $pattern
     * @return mixed
     */
    function modify(ObjectInterface $object, array $pattern)
    {
        // TODO: Implement modify() method.
    }
}