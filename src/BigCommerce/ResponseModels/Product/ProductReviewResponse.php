<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductReview;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ProductReviewResponse extends SingleResourceResponse
{
    private ProductReview $review;

    public function getReview(): ProductReview
    {
        return $this->review;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->review = new ProductReview($rawData);
    }
}
