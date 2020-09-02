<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductReview;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductReviewsResponse extends PaginatedResponse
{
    /**
     * @var ProductReview[]
     */
    private array $reviews;

    /**
     * @return ProductReview[]
     */
    public function getReviews(): array
    {
        return $this->reviews;
    }

    protected function addData(array $data): void
    {
        $this->reviews = array_map(function (\stdClass $r) {
            return new ProductReview($r);
        }, $data);
    }
}
