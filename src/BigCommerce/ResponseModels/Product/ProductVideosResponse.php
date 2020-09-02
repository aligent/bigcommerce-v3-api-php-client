<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVideo;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductVideosResponse extends PaginatedResponse
{
    /**
     * @var ProductVideo[]
     */
    private array $videos;

    /**
     * @return ProductVideo[]
     */
    public function getVideos(): array
    {
        return $this->videos;
    }

    protected function addData(array $data): void
    {
        $this->videos = array_map(function (\stdClass $v) {
            return new ProductVideo($v);
        }, $data);
    }
}
