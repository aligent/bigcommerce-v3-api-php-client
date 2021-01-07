<?php

namespace BigCommerce\ApiV3\Api\Themes;

use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\ResponseModels\Theme\JobIdentifierResponse;
use GuzzleHttp\RequestOptions;

class ThemeActionsApi extends UuidResourceApi
{
    private const THEME_ACTIONS_ENDPOINT = 'themes/actions/activate';
    private const THEME_ACTION_ENDPOINT  = 'themes/%s/actions/download';

    public const ORIGINAL       = 'original';
    public const LAST_CREATED   = 'last_created';
    public const LAST_ACTIVATED = 'last_activated';

    public function download($which): JobIdentifierResponse
    {
        $response = $this->getClient()->getRestClient()->post(
            sprintf(self::THEME_ACTION_ENDPOINT, $this->getUuid()),
            [
                RequestOptions::JSON => [
                    'which' => $which,
                ]
            ]
        );

        return new JobIdentifierResponse($response);
    }

    /**
     * @param string $variationId   The identifier for the variation to activate.
     * @param string $which         Which configuration to use.
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function activate(string $variationId, string $which): bool
    {
        $this->getClient()->getRestClient()->post(
            self::THEME_ACTIONS_ENDPOINT,
            [
                RequestOptions::JSON => [
                    'variation_id' => $variationId,
                    'which'        => $which,
                ]
            ]
        );

        return true;
    }
}
