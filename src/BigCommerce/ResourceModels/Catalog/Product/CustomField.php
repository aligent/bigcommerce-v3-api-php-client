<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomField extends ResourceModel
{
    public int $id;
    public string $name;
    public string $value;

    public const MAX_LENGTH_NAME = 250;
    public const MAX_LENGTH_VALUE = 250;

    public static function build(string $name, string $value): CustomField
    {
        $field = new CustomField();
        $field->setName($name);
        $field->setValue($value);

        return $field;
    }

    public function setValue(string $value): void
    {
        $this->value = substr($value, 0, self::MAX_LENGTH_VALUE);
    }

    public function setName(string $name): void
    {
        $this->name = substr($name, 0, self::MAX_LENGTH_NAME);
    }
}
