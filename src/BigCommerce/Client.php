<?php

namespace BigCommerce\ApiV3;

use BigCommerce\ApiV3\Api\Carts\CartsApi;
use BigCommerce\ApiV3\Api\Catalog\CatalogApi;
use BigCommerce\ApiV3\Api\Channels\ChannelsApi;
use BigCommerce\ApiV3\Api\Orders\OrdersApi;
use BigCommerce\ApiV3\Api\Customers\CustomersApi;
use BigCommerce\ApiV3\Api\Payments\PaymentsProcessingApi;
use BigCommerce\ApiV3\Api\PriceLists\PriceListsApi;
use BigCommerce\ApiV3\Api\Redirects\RedirectsApi;
use BigCommerce\ApiV3\Api\Scripts\ScriptsApi;
use BigCommerce\ApiV3\Api\Themes\ThemesApi;
use BigCommerce\ApiV3\Api\Widgets\WidgetsApi;
use BigCommerce\ApiV3\Api\CustomTemplateAssociations\CustomTemplateAssociationsApi;

class Client extends BaseApiClient
{
    public function catalog(): CatalogApi
    {
        return new CatalogApi($this);
    }

    public function customers(): CustomersApi
    {
        return new CustomersApi($this);
    }

    public function priceLists(): PriceListsApi
    {
        return new PriceListsApi($this);
    }

    public function priceList(int $priceListId): PriceListsApi
    {
        return new PriceListsApi($this, $priceListId);
    }

    public function themes(): ThemesApi
    {
        return new ThemesApi($this);
    }

    public function theme(string $uuid): ThemesApi
    {
        $api = $this->themes();
        $api->setUuid($uuid);
        return $api;
    }

    public function carts(): CartsApi
    {
        return new CartsApi($this);
    }

    public function cart(string $uuid): CartsApi
    {
        $api = $this->carts();
        $api->setUuid($uuid);
        return $api;
    }

    public function order(int $orderId): OrdersApi
    {
        return new OrdersApi($this, $orderId);
    }

    public function payments(): PaymentsProcessingApi
    {
        return new PaymentsProcessingApi($this);
    }

    public function script(string $uuid): ScriptsApi
    {
        $api = $this->scripts();
        $api->setUuid($uuid);
        return $api;
    }

    public function scripts(): ScriptsApi
    {
        return new ScriptsApi($this);
    }

    public function widgets(): WidgetsApi
    {
        return new WidgetsApi($this);
    }

    public function content(): WidgetsApi
    {
        return $this->widgets();
    }

    public function customTemplateAssociations(): CustomTemplateAssociationsApi
    {
        return new CustomTemplateAssociationsApi($this);
    }

    public function channel(int $id): ChannelsApi
    {
        return new ChannelsApi($this, $id);
    }

    public function channels(): ChannelsApi
    {
        return new ChannelsApi($this);
    }

    public function redirects(): RedirectsApi
    {
        return new RedirectsApi($this);
    }
}
