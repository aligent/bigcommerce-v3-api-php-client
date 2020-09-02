<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariantMetafield;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ProductVariantMetafieldResponse extends SingleResourceResponse
{
    private ProductVariantMetafield $metafield;

    /**
     * @return ProductVariantMetafield
     */
    public function getMetafield(): ProductVariantMetafield
    {
        return $this->metafield;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->metafield = new ProductVariantMetafield($rawData);
    }
}
