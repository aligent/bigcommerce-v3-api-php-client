<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Client;

trait ProductsSubResourceApi
{
    abstract public function getClient(): Client;

    abstract public function getResourceId(): ?int;

    public function variants(): VariantsApi
    {
        return new VariantsApi($this->getClient(), null, $this->getResourceId());
    }

    public function variant(int $variantId): VariantsApi
    {
        return new VariantsApi($this->getClient(), $variantId, $this->getResourceId());
    }


    public function modifiers(): ModifiersApi
    {
        return new ModifiersApi($this->getClient(), null, $this->getResourceId());
    }

    public function modifier(int $modifierId): ModifiersApi
    {
        return new ModifiersApi($this->getClient(), $modifierId, $this->getResourceId());
    }

    public function complexRules(): ComplexRulesApi
    {
        return new ComplexRulesApi($this->getClient(), null, $this->getResourceId());
    }

    public function complexRule(int $ruleId): ComplexRulesApi
    {
        return new ComplexRulesApi($this->getClient(), $ruleId, $this->getResourceId());
    }

    public function customFields(): CustomFieldsApi
    {
        return new CustomFieldsApi($this->getClient(), null, $this->getResourceId());
    }

    public function customField(int $customFieldId): CustomFieldsApi
    {
        return new CustomFieldsApi($this->getClient(), $customFieldId, $this->getResourceId());
    }

    public function options(): OptionsApi
    {
        return new OptionsApi($this->getClient(), null, $this->getResourceId());
    }

    public function option(int $optionId): OptionsApi
    {
        return new OptionsApi($this->getClient(), $optionId, $this->getResourceId());
    }

    public function images(): ProductImagesApi
    {
        return new ProductImagesApi($this->getClient(), null, $this->getResourceId());
    }

    public function image(int $imageId): ProductImagesApi
    {
        return new ProductImagesApi($this->getClient(), $imageId, $this->getResourceId());
    }

    public function bulkPricingRule(int $ruleId): ProductBulkPricingRulesApi
    {
        return new ProductBulkPricingRulesApi($this->getClient(), $ruleId, $this->getResourceId());
    }

    public function bulkPricingRules(): ProductBulkPricingRulesApi
    {
        return new ProductBulkPricingRulesApi($this->getClient(), null, $this->getResourceId());
    }

    public function metafield(int $metafieldId): ProductMetafieldsApi
    {
        return new ProductMetafieldsApi($this->getClient(), $metafieldId, $this->getResourceId());
    }

    public function metafields(): ProductMetafieldsApi
    {
        return new ProductMetafieldsApi($this->getClient(), null, $this->getResourceId());
    }

    public function review(int $reviewId): ProductReviewsApi
    {
        return new ProductReviewsApi($this->getClient(), $reviewId, $this->getResourceId());
    }

    public function reviews(): ProductReviewsApi
    {
        return new ProductReviewsApi($this->getClient(), null, $this->getResourceId());
    }

    public function video(int $videoId): ProductVideosApi
    {
        return new ProductVideosApi($this->getClient(), $videoId, $this->getResourceId());
    }

    public function videos(): ProductVideosApi
    {
        return new ProductVideosApi($this->getClient(), null, $this->getResourceId());
    }
}
