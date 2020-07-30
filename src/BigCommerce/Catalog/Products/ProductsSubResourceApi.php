<?php


namespace BigCommerce\ApiV3\Catalog\Products;


use BigCommerce\ApiV3\Client;

trait ProductsSubResourceApi
{
    abstract function getClient(): Client;
    abstract function getResourceId(): ?int;

    public function variants(): VariantsApi
    {
        return new VariantsApi($this->getClient(), null, $this->getResourceId());
    }

    public function variant(int $variantId): VariantsApi
    {
        return new VariantsApi($this->getClient(), $variantId, $this->getResourceId());
    }


    public function modifiers() : ModifiersApi
    {
        return new ModifiersApi($this->getClient(), null, $this->getResourceId());
    }

    public function modifier(int $modifierId): ModifiersApi
    {
        return new ModifiersApi($this->getClient(), $modifierId, $this->getResourceId());
    }

    public function complexRules() : ComplexRulesApi
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
}
