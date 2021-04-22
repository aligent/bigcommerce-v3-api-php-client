<?php

namespace BigCommerce\ApiV3\ResponseModels\Redirect;

use BigCommerce\ApiV3\ResourceModels\Redirect\Redirect;
use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;

class RedirectsResponse extends PaginatedBatchableResponse
{
    /**
     * @return Redirect[]
     */
    public function getRedirects(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Redirect::class;
    }
}
