<?php

namespace BigCommerce\ApiV3\ResourceModels;

use JsonSerializable;
use stdClass;

abstract class ResourceModel implements JsonSerializable
{
    private ?stdClass $optionObject;

    public function __construct(?stdClass $optionObject = null)
    {
        $this->optionObject = $optionObject;

        $this->beforeBuildObject();

        if (!is_null($this->optionObject)) {
            foreach ($this->optionObject as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function jsonSerialize(): array
    {
        $data = [];
        foreach ($this as $key => $value) {
            if (isset($this->$key) && $key !== 'optionObject') {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    protected function buildObjectArray(string $property, string $className): void
    {
        if (!is_null($this->optionObject) && isset($this->optionObject->$property)) {
            $this->$property = array_map(function ($m) use ($className) {
                return new $className($m);
            }, $this->optionObject->$property);

            unset($this->optionObject->$property);
        }
    }

    protected function buildPropertyObject(string $property, string $className): void
    {
        if (!is_null($this->optionObject) && isset($this->optionObject->$property)) {
            $this->$property = new $className($this->optionObject->$property);

            unset($this->optionObject->$property);
        }
    }

    /**
     * Override this function to implement custom build functionality
     */
    protected function beforeBuildObject(): void
    {
    }
}
