<?php
namespace BigCommerce\ApiV3\Api\CustomTemplateAssociations;

use BigCommerce\ApiV3\Api\Generic\BatchUpdateResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResourceModels\CustomTemplateAssociation\CustomTemplateAssociation;
use BigCommerce\ApiV3\ResponseModels\CustomTemplateAssociation\CustomTemplateAssociationsResponse;

class CustomTemplateAssociationsApi extends V3ApiBase
{
    use GetAllResources;
    use BatchUpdateResource;

    private const TEMPLATES_ENDPOINT = '/storefront/custom-template-associations';

    public const FILTER_CHANNEL_ID   = 'channel_id';
    public const FILTER_ENTITY_ID_IN = 'entity_id:in';
    public const FILTER_TYPE         = 'type';
    public const FILTER_IS_VALID     = 'is_valid';

    protected function maxBatchSize(): int
    {
        return 100;
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CustomTemplateAssociationsResponse
    {
        return new CustomTemplateAssociationsResponse($this->getAllResources($filters, $page, $limit));
    }

    /**
     * @param CustomTemplateAssociation[] $templateAssociations
     * @return CustomTemplateAssociationsResponse
     */
    public function batchUpdate(array $templateAssociations): CustomTemplateAssociationsResponse
    {
        return CustomTemplateAssociationsResponse::buildFromMultipleResponses(
            $this->batchUpdateResource($templateAssociations)
        );
    }

    public function multipleResourcesEndpoint(): string
    {
        return self::TEMPLATES_ENDPOINT;
    }

    public function multipleResourceUrl(): string
    {
        return $this->multipleResourcesEndpoint();
    }
}
