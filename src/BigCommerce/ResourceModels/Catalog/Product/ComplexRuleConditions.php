<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ComplexRuleConditions extends ResourceModel
{
    public int $rule_id;
    public int $modifier_id;
    public int $modifier_value_id;
    public array $variant_id;
    public int $combination_id;
}
