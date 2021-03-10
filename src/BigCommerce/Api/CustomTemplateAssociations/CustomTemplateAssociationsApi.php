<?php

namespace BigCommerce\ApiV3\Api\CustomTemplateAssociations;

use BigCommerce\ApiV3\Api\Generic\BatchUpdateResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResourceModels\CustomTemplateAssociation\CustomTemplateAssociation;
use BigCommerce\ApiV3\ResponseModels\CustomTemplateAssociation\CustomTemplateAssociationsResponse;
use GuzzleHttp\RequestOptions;

class CustomTemplateAssociationsApi extends V3ApiBase
{
    use GetAllResources;
    use BatchUpdateResource;

    private const TEMPLATES_ENDPOINT = '/storefront/custom-template-associations';

    public const FILTER_CHANNEL_ID   = 'channel_id';
    public const FILTER_ENTITY_ID_IN = 'entity_id:in';
    public const FILTER_TYPE         = 'type';
    public const FILTER_IS_VALID     = 'is_valid';

    public const DELETE_QUERY_ID_IN         = 'id:in';
    public const DELETE_QUERY_ENTITY_ID_IN  = 'entity_id:in';
    public const DELETE_QUERY_CHANNEL_ID    = 'channel_id';
    public const DELETE_QUERY_TYPE          = 'type';

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

    public function delete(array $query): void
    {
        $this->getClient()->getRestClient()->delete(
            $this->multipleResourceUrl(),
            [
                RequestOptions::QUERY => $query
            ]
        );
    }

    public function deleteByIds(array $ids): void
    {
        $this->delete([
            self::DELETE_QUERY_ID_IN => $ids
        ]);
    }

    public function deleteByChannelId(int $channelId): void
    {
        $this->delete([
            self::DELETE_QUERY_CHANNEL_ID => $channelId
        ]);
    }

    public function deleteByEntityIds(string $type, array $ids): void
    {
        $this->delete([
            self::DELETE_QUERY_ENTITY_ID_IN => $ids,
            self::DELETE_QUERY_TYPE         => $type,
        ]);
    }
}
