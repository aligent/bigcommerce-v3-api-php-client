<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class ProductModifier extends ResourceModel
{
    public const PRODUCT_MODIFIER_TYPE_PRODUCT_LIST = 'product_list';
    public const PRODUCT_MODIFIER_TYPE_DROPDOWN     = 'dropdown';

    public string $type;
    public bool $required;
    public int $sort_order;
    public ?ProductModifierConfig $config;
    public string $display_name;
    public int $id;
    public int $product_id;
    public string $name;

    /**
     * @var ProductModifierValue[]
     */
    public array $option_values;

    public function __construct(?stdClass $optionObject = null)
    {
        if (
            !is_null($optionObject) && !empty($optionObject->config)
            && get_class($optionObject->config) !== ProductModifierConfig::class
        ) {
            $this->config = new ProductModifierConfig($optionObject->config);
        }

        if (!is_null($optionObject) && isset($optionObject->config)) {
            unset($optionObject->config);
        }

        if (!is_null($optionObject) && isset($optionObject->option_values)) {
            $this->option_values = array_map(function ($v) {
                return new ProductModifierValue($v);
            }, $optionObject->option_values);
            unset($optionObject->option_values);
        }

        parent::__construct($optionObject);
    }

    public static function build(
        string $type,
        bool $required,
        string $display_name,
        ?ProductModifierConfig $config = null
    ): ProductModifier {
        $obj = new \stdClass();
        $obj->type = $type;
        $obj->required = $required;
        $obj->display_name = $display_name;
        $obj->config = $config;

        return new ProductModifier($obj);
    }

    public function addOptionValue(ProductModifierValue $value)
    {
        $this->option_values[] = $value;
    }

    public function addOptionValues(array $values)
    {
        foreach ($values as $value) {
            $this->addOptionValue($value);
        }
    }

    public function getConfig(): ?ProductModifierConfig
    {
        return $this->config ?? null;
    }
}
