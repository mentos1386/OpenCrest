<?php

namespace OpenCrest\Endpoints\Objects;

class ListObject extends Object
{
    /**
     * @return ListObject
     */
    public function nextPage()
    {
        $page = $this->endpoint->httpGet($this->endpoint->uri, [
            'query' => 'page=' . $this->values['nextPage']['page']
        ]);

        return $this->endpoint->createObject($page);
    }

    /**
     * @return ListObject
     */
    public function previousPage()
    {
        $page = $this->endpoint->httpGet($this->endpoint->uri, [
            'query' => 'page=' . $this->values['previousPage']['page']
        ]);

        return $this->endpoint->createObject($page);
    }

    /**
     * @param $data
     * @return $this
     */
    public function make($data)
    {
        // We check if items are inside in items array, or directly
        if (isset($data['items'])) {
            $items = $data['items'];
        } else {
            $items = $data;
        }

        $this->values['totalCount'] = isset($data['totalCount']) ? $data['totalCount'] : count($items);
        $this->values['pageCount'] = isset($data['pageCount']) ? $data['pageCount'] : 0;

        $this->parsePages($data);

        $this->values['items'] = [];

        $object = new $this->endpoint->object;
        foreach ($items as $item) {

            // TODO: $types->dogma->attributes->items[0] returns values inside "attribute" array, same with dogma->effects->items[0]
            if (isset($item["attribute"])) {
                $item = $item["attribute"];
            } elseif (isset($item['effect'])) {
                $item = $item["effect"];
            }

            $_item = $object->make($item);

            // Sometimes (like in type->dogma id isnt provided, as items are relations)
            $_item->id = isset($item['id']) ? $item['id'] : null;

            $_item->setEndpoint($this->endpoint);
            array_push($this->values['items'], $_item);
        }

        return $this;
    }

    /**
     * @param $pages
     */
    private function parsePages($pages)
    {

        if (isset($pages['next'])) {
            $this->values['nextPage'] = [
                'href' => $pages['next']['href'],
                'page' => ($this->parseUrl($pages['next']['href'])['page'] ? (int)$this->parseUrl($pages['next']['href'])['page'] : null)
            ];
        }
        if (isset($pages['previous'])) {
            $this->values['previousPage'] = [
                'href' => $pages['previous']['href'],
                'page' => (int)(!empty($this->parseUrl($pages['previous']['href'])) ? $this->parseUrl($pages['previous']['href'])['page'] : 1)
            ];
        }
    }

    /**
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
     *
     */
    protected function setRelations()
    {
        // No relations
    }
}