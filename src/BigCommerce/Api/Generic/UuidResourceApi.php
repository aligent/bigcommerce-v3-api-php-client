<?php

namespace BigCommerce\ApiV3\Api\Generic;

abstract class UuidResourceApi extends V3ApiBase
{
    private string $uuid = '';

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }
}
