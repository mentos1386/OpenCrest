<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\Endpoint;

class ListObject extends AbstractObject
{

    /**
     * @var Endpoint
     */
    public $endpoint;
    /**
     * @var integer
     */
    public $pageCount;
    /**
     * @var integer
     */
    public $totalCount;
    /**
     * @var array
     */
    public $items = [];
    /**
     * @var array
     */
    public $nextPage;
    /**
     * @var array
     */
    public $previousPage;

    /**
     * @return ListObject
     */
    public function nextPage()
    {
        $page = $this->endpoint->get($this->endpoint->uri, [
            'query' => 'page=' . $this->nextPage['page']
        ]);

        return $this->endpoint->createObject($page);
    }

    /**
     * @return ListObject
     */
    public function previousPage()
    {
        $page = $this->endpoint->get($this->endpoint->uri, [
            'query' => 'page=' . $this->previousPage['page']
        ]);

        return $this->endpoint->createObject($page);
    }


}