<?php

namespace BigCommerce\ApiV3\ResourceModels;

use JsonSerializable;
use stdClass;

abstract class ResourceModel implements JsonSerializable
{
    public function __construct(?stdClass $optionObject = null)
    {
        if (!is_null($optionObject)) {
            foreach ($optionObject as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function jsonSerialize(): array
    {
        $data = [];
        foreach ($this as $key => $value) {
            if (isset($this->$key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
