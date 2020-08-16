<?php

namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\CustomField;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CustomFieldsResponse extends PaginatedResponse
{
    /**
     * @var CustomField[]
     */
    private array $customFields;

    /**
     * @return CustomField[]
     */
    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    protected function addData(array $data): void
    {
        $this->customFields = array_map(function (\stdClass $f) {
            return new CustomField($f);
        }, $data);
    }
}
