<?php

namespace BigCommerce\ApiV3\ResponseModels\Page;

use BigCommerce\ApiV3\ResourceModels\Page\Page;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class PageResponse extends SingleResourceResponse
{
    private Page $page;

    public function getPage(): Page
    {
        return $this->page;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->page = new Page($rawData);
    }
}
