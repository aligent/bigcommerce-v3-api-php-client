<?php

namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\ResourceModels\Catalog\Summary;
use stdClass;

class SummaryResponse extends SingleResourceResponse
{
    private Summary $summary;

    public function getSummary(): Summary
    {
        return $this->summary;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->summary = new Summary($rawData);
    }
}
