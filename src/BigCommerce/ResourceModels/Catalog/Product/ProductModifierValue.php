<?php


namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;


use JsonSerializable;

class ProductModifierValue implements JsonSerializable
{
    public int $id;
    public int $option_id;
    public ?int $productId;
    public string $label;
    public bool $is_default = false;
    public ?ProductModifierValueAdjuster $adjusters;

    public function __construct(?int $productId, string $label)
    {
        $this->productId = $productId;
        $this->label = $label;
    }

    public static function BuildFromResponse(\stdClass $optionObject): ProductModifierValue
    {
        $modifierValue = new ProductModifierValue(null, '');
        foreach ($optionObject as $key => $value) {
            switch ($key) {
                case 'adjusters':
                    $modifierValue->$key = new ProductModifierValueAdjuster($optionObject->$key);
                    break;
                default:
                    $modifierValue->$key = $value;
            }
        }

        return $modifierValue;
    }

    public function jsonSerialize() : array
    {
        $json = [
            'is_default' => $this->is_default,
            'label'      => $this->label,
        ];

        if (isset($this->adjusters)) $json['adjusters'] = $this->adjusters;
        if (isset($this->productId) && $this->productId > 0) $json['value_data'] = ['product_id' => $this->productId];

        return $json;
    }

    public function addPriceAdjuster(PriceAdjuster $priceAdjuster)
    {
        $this->adjusters = new ProductModifierValueAdjuster();
        $this->adjusters->price = $priceAdjuster;
    }
}
