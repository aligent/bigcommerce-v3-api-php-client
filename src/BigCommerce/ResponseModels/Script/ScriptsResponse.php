<?php

namespace BigCommerce\ApiV3\ResponseModels\Script;

use BigCommerce\ApiV3\ResourceModels\Script\Script;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ScriptsResponse extends PaginatedResponse
{
    /**
     * @return Script[]
     */
    public function getScripts(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Script::class;
    }
}
