<?php

namespace BigCommerce\ApiV3\Themes;

use BigCommerce\ApiV3\Api\DeleteResource;
use BigCommerce\ApiV3\Api\GetAllResources;
use BigCommerce\ApiV3\Api\GetResource;
use BigCommerce\ApiV3\Api\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Theme\JobIdentifierResponse;
use BigCommerce\ApiV3\ResponseModels\Theme\ThemeResponse;
use BigCommerce\ApiV3\ResponseModels\Theme\ThemesResponse;
use GuzzleHttp\RequestOptions;

class ThemesApi extends V3ApiBase
{
    use GetResource;
    use GetAllResources;
    use DeleteResource;

    private const THEMES_ENDPOINT = 'themes';
    private const THEME_ENDPOINT  = 'themes/%s';

    private string $uuid;

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

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }
}
