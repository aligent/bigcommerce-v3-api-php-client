<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Category\CategoryMetafield;
use stdClass;

class CategoryMetafieldResponse extends SingleResourceResponse
{
    private CategoryMetafield $metafield;

    public function getMetafield(): CategoryMetafield
    {
        return $this->metafield;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->metafield = new CategoryMetafield($rawData);
    }
}
