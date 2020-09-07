<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVideo;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductVideosResponse extends PaginatedResponse
{
    /**
     * @return ProductVideo[]
     */
    public function getVideos(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductVideo::class;
    }
}
