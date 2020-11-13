<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products\ProductModifier;

use BigCommerce\ApiV3\Api\Generic\ResourceImageApi;

class ProductModifierImagesApi extends ResourceImageApi
{
    private int $productId;

    private const PRODUCT_MODIFIER_IMAGE_ENDPOINT = 'catalog/products/%s/modifiers/{modifier_id}/values/%s/image';

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    protected function singleResourceEndpoint(): string
    {
        return self::PRODUCT_MODIFIER_IMAGE_ENDPOINT;
    }

    protected function singleResourceUrl(): string
    {
        return sprintf(
            $this->singleResourceEndpoint(),
            $this->getProductId(),
            $this->getParentResourceId() ?? $this->getResourceId(),
            $this->getResourceId()
        );
    }
}
