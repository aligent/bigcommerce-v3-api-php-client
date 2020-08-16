<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class ComplexRule extends ResourceModel
{
    public int $id;
    public int $product_id;
    public int $sort_order;
    public bool $enabled;
    public bool $stop;
    public PriceAdjuster $price_adjuster;
    public WeightAdjuster $weight_adjuster;
    public bool $purchasing_disabled;
    public string $purchasing_disabled_message;
    public bool $purchasing_hidden;
    public string $image_url;
    /**
     * @var ComplexRuleConditions[]
     */
    public array $conditions;

    public function __construct(?stdClass $optionObject = null)
    {
        if (!is_null($optionObject)) {
            $this->price_adjuster = new PriceAdjuster($optionObject->price_adjuster);
            unset($optionObject->price_adjuster);

            $this->weight_adjuster = new WeightAdjuster($optionObject->weight_adjuster);
            unset($optionObject->weight_adjuster);

            $this->conditions = array_map(function ($c) {
                return new ComplexRuleConditions($c);
            }, $optionObject->conditions);
            unset($optionObject->conditions);
        }

        parent::__construct($optionObject);
    }
}
