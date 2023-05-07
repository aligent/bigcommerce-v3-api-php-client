<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class WeightAdjuster extends ResourceModel
{
    public const ADJUSTER_RELATIVE = 'relative';
    public const ADJUSTER_FIXED    = 'fixed';

    public string $adjuster;
    public float $adjuster_value;
    
    protected function beforeBuildObject(): void
    {
        if (!is_null($this->optionObject)) {
            if(is_null($this->optionObject->adjuster)){
                $this->optionObject->adjuster = self::ADJUSTER_FIXED;
            }
        }
    }
}
