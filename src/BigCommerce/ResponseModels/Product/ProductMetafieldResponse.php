<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductMetafield;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ProductMetafieldResponse extends SingleResourceResponse
{
    private ProductMetafield $metafield;

    /**
     * @return ProductMetafield
     */
    public function getMetafield(): ProductMetafield
    {
        return $this->metafield;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->metafield = new ProductMetafield($rawData);
    }
}
