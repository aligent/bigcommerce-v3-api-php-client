<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVideo;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ProductVideoResponse extends SingleResourceResponse
{
    private ProductVideo $video;

    public function getVideo(): ProductVideo
    {
        return $this->video;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->video = new ProductVideo($rawData);
    }
}
