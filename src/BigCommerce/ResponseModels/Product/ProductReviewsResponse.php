<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductReview;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductReviewsResponse extends PaginatedResponse
{
    /**
     * @return ProductReview[]
     */
    public function getReviews(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductReview::class;
    }
}
