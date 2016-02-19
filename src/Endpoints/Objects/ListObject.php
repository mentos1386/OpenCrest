<?php

namespace OpenCrest\Endpoints\Objects;

class ListObject extends Object
{
    /**
     * @return ListObject
     */
    public function nextPage()
    {
        $page = $this->endpoint->get($this->endpoint->uri, [
            'query' => 'page=' . $this->attributes['nextPage']['page']
        ]);

        return $this->endpoint->createObject($page);
    }

    /**
     * @return ListObject
     */
    public function previousPage()
    {
        $page = $this->endpoint->get($this->endpoint->uri, [
            'query' => 'page=' . $this->attributes['previousPage']['page']
        ]);

        return $this->endpoint->createObject($page);
    }

    /**
     * @param $items
     * @return $this
     */
    public function make($items)
    {
        $this->attributes['totalCount'] = isset($items['totalCount']) ? $items['totalCount'] : null;
        $this->attributes['pageCount'] = isset($items['pageCount']) ? $items['pageCount'] : null;

        $this->parsePages($items);

        // We check if items are inside in items array, or directly
        if (isset($items['items'])) {
            $items = $items['items'];
        }
        $this->attributes['items'] = [];

        $object = new $this->endpoint->object;
        foreach ($items as $item) {

            $_item = $object->make($item);
            $_item->setEndpoint($this->endpoint);
            array_push($this->attributes['items'], $_item);
        }

        return $this;
    }

    /**
     * @param $pages
     */
    private function parsePages($pages)
    {

        if (isset($pages['next'])) {
            $this->attributes['nextPage'] = [
                'href' => $pages['next']['href'],
                'page' => ($this->parseUrl($pages['next']['href'])['page'] ? (int)$this->parseUrl($pages['next']['href'])['page'] : null)
            ];
        }
        if (isset($pages['previous'])) {
            $this->attributes['previousPage'] = [
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