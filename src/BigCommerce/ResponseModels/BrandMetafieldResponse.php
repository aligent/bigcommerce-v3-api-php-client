<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Brand\BrandMetafield;
use stdClass;

class BrandMetafieldResponse extends SingleResourceResponse
{
    private BrandMetafield $metafield;

    public function getMetafield(): BrandMetafield
    {
        return $this->metafield;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->metafield = new BrandMetafield($rawData);
    }
}
