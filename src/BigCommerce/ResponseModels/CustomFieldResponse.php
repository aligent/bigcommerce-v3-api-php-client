<?php

namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\CustomField;
use stdClass;

class CustomFieldResponse extends SingleResourceResponse
{
    private CustomField $customField;

    public function getCustomField(): CustomField
    {
        return $this->customField;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->customField = new CustomField($rawData);
    }
}
