<?php

namespace BigCommerce\ApiV3\ResourceModels\Site;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Site extends ResourceModel
{
    public const SSL_STATUS_DEDICATED = 'dedicated';
    public const SSL_STATUS_SHARED    = 'shared';

    public int $id;
    public string $url;
    public int $channel_id;
    public string $created_at;
    public string $updated_at;
    public string $ssl_status;
    /**
     * @var SiteUrl[]
     */
    public array $urls;
    public bool $is_checkout_url_customized;

    protected function beforeBuildObject(): void
    {
        $this->buildObjectArray('urls', SiteUrl::class);
    }
}
