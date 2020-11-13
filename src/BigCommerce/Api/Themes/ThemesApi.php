<?php

namespace BigCommerce\ApiV3\Api\Themes;

use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\ResponseModels\Theme\JobIdentifierResponse;
use BigCommerce\ApiV3\ResponseModels\Theme\ThemeResponse;
use BigCommerce\ApiV3\ResponseModels\Theme\ThemesResponse;
use GuzzleHttp\RequestOptions;

class ThemesApi extends UuidResourceApi
{
    use GetResource;
    use GetAllResources;
    use DeleteResource;

    private const THEMES_ENDPOINT = 'themes';
    private const THEME_ENDPOINT  = 'themes/%s';

    public function getAll(): ThemesResponse
    {
        return new ThemesResponse($this->getAllResources());
    }

    public function upload(string $filename): JobIdentifierResponse
    {
        $response = $this->getClient()->getRestClient()->post(
            $this->multipleResourceUrl(),
            [
                RequestOptions::MULTIPART => [
                    ['name' => 'file', 'contents'  => fopen($filename, 'r')]
                ]
            ]
        );

        return new JobIdentifierResponse($response);
    }

    public function get(): ThemeResponse
    {
        return new ThemeResponse($this->getResource());
    }

    public function multipleResourceUrl(): string
    {
        return self::THEMES_ENDPOINT;
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::THEME_ENDPOINT, $this->getUuid());
    }

    public function job(string $jobId): ThemeJobsApi
    {
        $api = new ThemeJobsApi($this->getClient());
        $api->setUuid($jobId);

        return $api;
    }

    public function actions(): ThemeActionsApi
    {
        $api = new ThemeActionsApi($this->getClient());
        $api->setUuid($this->getUuid());

        return $api;
    }
}
