<?php

namespace BigCommerce\ApiV3\ResponseModels\Meta;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Pagination extends ResourceModel
{
    /**
     * @var int Total number of items in the result set
     */
    public int $total;

    /**
     * @var int Total number of items in the collection response
     */
    public int $count;

    /**
     * @var int The amount of items returned in the collection per page, controlled by the limit parameter
     */
    public int $per_page;

    /**
     * @var int The page you are currently on within the collection
     */
    public int $current_page;

    /**
     * @var int The total number of pages in the collection
     */
    public int $total_pages;

    public ?Links $links;

    protected function beforeBuildObject(): void
    {
        self::buildPropertyObject('links', Links::class);
        parent::beforeBuildObject();
    }
}
