<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductReview;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductReviewResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductReviewsResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;

class ProductReviewsApi extends ResourceApi
{
    public const RESOURCE_NAME = 'reviews';
    public const REVIEW_ENDPOINT = 'catalog/products/%s/reviews/%s';
    public const REVIEWS_ENDPOINT = 'catalog/products/%s/reviews';

    protected function singleResourceEndpoint(): string
    {
        return self::REVIEW_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::REVIEWS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): ProductReviewResponse
    {
        return new ProductReviewResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductReviewsResponse
    {
        return new ProductReviewsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(ProductReview $review): ProductReviewResponse
    {
        return new ProductReviewResponse($this->createResource($review));
    }

    public function update(ProductReview $review): ProductReviewResponse
    {
        return new ProductReviewResponse($this->updateResource($review));
    }
}
