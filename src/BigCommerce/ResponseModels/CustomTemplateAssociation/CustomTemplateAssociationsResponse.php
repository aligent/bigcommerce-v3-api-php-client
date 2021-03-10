<?php

namespace BigCommerce\ApiV3\ResponseModels\CustomTemplateAssociation;

use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;
use BigCommerce\ApiV3\ResourceModels\CustomTemplateAssociation\CustomTemplateAssociation;

class CustomTemplateAssociationsResponse extends PaginatedBatchableResponse
{
    /**
     * @return CustomTemplateAssociation[]
     */
    public function getCustomTemplateAssociations(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return CustomTemplateAssociation::class;
    }
}
