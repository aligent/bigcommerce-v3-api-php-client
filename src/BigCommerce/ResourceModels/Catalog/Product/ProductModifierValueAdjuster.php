<?php


namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;


use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class ProductModifierValueAdjuster extends ResourceModel
{
    public ?PriceAdjuster $price;
    public ?WeightAdjuster $weight;
    public string $image_url;
    public object $purchasing_disabled;

    public function __construct(?stdClass $optionObject = null)
    {
        if (!is_null($optionObject)) {
            $this->price = new PriceAdjuster($optionObject->price);
            unset($optionObject->price);

            $this->weight = new WeightAdjuster($optionObject->weight);
            unset($optionObject->weight);
        }

        parent::__construct($optionObject);
    }
}