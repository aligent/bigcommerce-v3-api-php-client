<?php

namespace BigCommerce\ApiV3\Api\Pages;

use BigCommerce\ApiV3\Api\Generic\BatchCreateResource;
use BigCommerce\ApiV3\Api\Generic\ResourceWithBatchUpdateApi;
use BigCommerce\ApiV3\ResourceModels\Page\Page;
use BigCommerce\ApiV3\ResponseModels\Page\PageResponse;
use BigCommerce\ApiV3\ResponseModels\Page\PagesResponse;
use GuzzleHttp\RequestOptions;

/**
 *  Includes the multiple and single page requests for pages
 */
class PagesApi extends ResourceWithBatchUpdateApi
{
    use BatchCreateResource;

    protected function maxBatchSize(): int
    {
        return 100;
    }

    private const PAGE_ENDPOINT = 'content/pages/%d';
    private const PAGES_ENDPOINT = 'content/pages';
    private const RESOURCE_NAME = 'pages';

    public function batchUpdate(array $resources): PagesResponse
    {
        return PagesResponse::buildFromMultipleResponses($this->batchCreateResource($resources));
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::PAGES_ENDPOINT;
    }

    protected function singleResourceEndpoint(): string
    {
        return self::PAGE_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): PageResponse
    {
        return new PageResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): PagesResponse
    {
        return new PagesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function batchCreate(array $resources): PagesResponse
    {
        return PagesResponse::buildFromMultipleResponses($this->batchCreateResource($resources));
    }

    public function create(Page $page): PageResponse
    {
        return new PageResponse($this->createResource($page));
    }

    public function update(Page $page): PageResponse
    {
        return new PageResponse($this->updateResource($page));
    }

    public function batchDelete(array $ids = []): bool
    {
        $response = $this->getClient()->getRestClient()->delete(
            $this->multipleResourceUrl(),
            [
                RequestOptions::QUERY => [
                    'id:in' => implode(',', $ids)
                ]
            ]
        );

        return $response->getStatusCode() === 204;
    }
}
