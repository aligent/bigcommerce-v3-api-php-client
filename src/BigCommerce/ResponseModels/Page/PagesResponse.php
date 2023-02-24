<?php

namespace BigCommerce\ApiV3\ResponseModels\Page;

use BigCommerce\ApiV3\ResourceModels\Page\Page;
use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;

class PagesResponse extends PaginatedBatchableResponse
{
    /**
     * @return Page[]
     */
    public function getPages(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Page::class;
    }
}
