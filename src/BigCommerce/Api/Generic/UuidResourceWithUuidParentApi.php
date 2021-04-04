<?php

namespace BigCommerce\ApiV3\Api\Generic;

abstract class UuidResourceWithUuidParentApi extends UuidResourceApi
{
    private string $parentUuid;

    public function getParentUuid(): string
    {
        return $this->parentUuid;
    }

    public function setParentUuid(string $parentUuid): void
    {
        $this->parentUuid = $parentUuid;
    }
}
