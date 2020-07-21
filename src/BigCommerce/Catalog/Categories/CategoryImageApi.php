<?php
namespace BigCommerce\ApiV3\Catalog\Categories;

use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use GuzzleHttp\RequestOptions;
use UnexpectedValueException;

class CategoryImageApi extends ResourceApi
{
    const RESOURCE_NAME = 'image';
    const CATEGORY_IMAGE_ENDPOINT = 'catalog/categories/%d/image';

    protected function singleResourceEndpoint(): string
    {
        return self::CATEGORY_IMAGE_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        throw new UnexpectedValueException(__CLASS__ . 'does not support multiple resource endpoints');
    }

    protected function resourceName(): string
    {
        self::RESOURCE_NAME;
    }

    public function create(string $filename): string
    {
        $response = $this->getClient()->getRestClient()->post(
            $this->singleResourceEndpoint(),
            [
                RequestOptions::MULTIPART => [
                    ['name' => 'image_file', 'contents'  => fopen($filename, 'r')]
                ]
            ]
        );

        return json_decode($response->getBody())->data->image_url;
    }

    public function get(): SingleResourceResponse
    {
        throw new UnexpectedValueException('There is no endpoint for fetching a category\'s image');
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse
    {
        throw new UnexpectedValueException('There is no endpoint for fetching all category images');
    }
}
