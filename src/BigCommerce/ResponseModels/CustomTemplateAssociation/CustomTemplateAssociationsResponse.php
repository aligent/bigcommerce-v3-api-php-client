<?php
namespace BigCommerce\ApiV3\ResponseModels\CustomTemplateAssociation;

use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResourceModels\CustomTemplateAssociation\CustomTemplateAssociation;

class CustomTemplateAssociationsResponse extends PaginatedResponse
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
