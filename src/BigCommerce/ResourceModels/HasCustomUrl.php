<?php

namespace BigCommerce\ApiV3\ResourceModels;

use BigCommerce\Tests\Api\Catalog\CustomUrl;

trait HasCustomUrl
{
    public ?CustomUrl $custom_url;

    /**
     * Set the URL for a category, brand, or product.
     *
     * Just a shortcut to setting {url, is_customized: true}
     */
    public function setCustomUrl(string $url): void
    {
        $this->custom_url = new CustomUrl();
        $this->custom_url->url = $url;
        $this->custom_url->is_customized = true;
    }

    protected function buildCustomUrl(\stdClass $data): void
    {
        if (isset($data->custom_url)) {
            $this->custom_url = new CustomUrl($data->custom_url);
            unset($data->custom_url);
        }
    }
}
