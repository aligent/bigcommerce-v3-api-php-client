<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use UnexpectedValueException;

abstract class ResourceApiNoDelete extends V3ApiBase
{
    use GetAllResources;
    use GetResource;
    use UpdateResource;
    use CreateResource;

    abstract protected function singleResourceEndpoint(): string;
    abstract protected function multipleResourcesEndpoint(): string;
    abstract protected function resourceName(): string;

    protected function singleResourceUrl(): string
    {
        if (is_null($this->getResourceId())) {
            throw new UnexpectedValueException("A {$this->resourceName()} id must be to be set");
        }

        return sprintf(
            $this->singleResourceEndpoint(),
            $this->getParentResourceId() ?? $this->getResourceId(),
            $this->getResourceId()
        );
    }

    protected function multipleResourceUrl(): string
    {
        return sprintf($this->multipleResourcesEndpoint(), $this->getParentResourceId());
    }

    abstract public function get(): SingleResourceResponse;
    abstract public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse;
}
