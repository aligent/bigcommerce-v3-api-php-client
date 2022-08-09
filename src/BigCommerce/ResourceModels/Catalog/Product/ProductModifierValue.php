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
    public int $sort_order;
    public ?ProductModifierValueAdjuster $adjusters;
    public ?object $value_data;

    public function __construct(?int $productId, string $label)
    {
        $this->productId = $productId;
        $this->label = $label;
    }

    public static function buildFromResponse(\stdClass $optionObject): ProductModifierValue
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

    public function jsonSerialize(): array
    {
        $json = [
            'id' => $this->id,
            'option_id' => $this->option_id,
            'is_default' => $this->is_default,
            'label'      => $this->label,
            'sort_order' => $this->sort_order,
        ];

        if (isset($this->adjusters)) {
            $json['adjusters'] = $this->adjusters;
        }
        if (isset($this->value_data)) {
            if (isset($this->productId) && $this->productId > 0) {
                $value_data = (array)$this->value_data;
                $value_data['product_id'] = $this->productId;
                $this->value_data = (object)$this->value_data;
            }
            $json['value_data'] = $this->value_data;
        } else if (isset($this->productId) && $this->productId > 0) {
            $json['value_data'] = ['product_id' => $this->productId];
        }

        return $json;
    }

    public function addPriceAdjuster(PriceAdjuster $priceAdjuster)
    {
        $this->adjusters = new ProductModifierValueAdjuster();
        $this->adjusters->price = $priceAdjuster;
    }
}
