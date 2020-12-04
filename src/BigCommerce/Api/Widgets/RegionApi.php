<?php

namespace BigCommerce\ApiV3\Api\Widgets;

use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Widget\RegionsResponse;
use GuzzleHttp\RequestOptions;

class RegionApi extends V3ApiBase
{
    private string $templateFile;

    private const REGIONS_ENDPOINT = 'content/regions';
    private const QUERY_PARAM_TEMPLATE_FILE = 'template_file';

    public function getTemplateFile(): string
    {
        return $this->templateFile;
    }

    public function setTemplateFile(string $templateFile): void
    {
        $this->templateFile = $templateFile;
    }

    public function get(): RegionsResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            self::REGIONS_ENDPOINT,
            [
                RequestOptions::QUERY => [
                    self::QUERY_PARAM_TEMPLATE_FILE => $this->getTemplateFile()
                ]
            ]
        );

        return new RegionsResponse($response);
    }
}
