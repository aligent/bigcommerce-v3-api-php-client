<?php

namespace BigCommerce\ApiV3;

use BigCommerce\ApiV3\Api\Catalog\CatalogApi;
use BigCommerce\ApiV3\Api\Orders\OrdersApi;
use BigCommerce\ApiV3\Api\Customers\CustomersApi;
use BigCommerce\ApiV3\Api\Payments\PaymentsProcessingApi;
use BigCommerce\ApiV3\Api\PriceLists\PriceListsApi;
use BigCommerce\ApiV3\Api\Scripts\ScriptsApi;
use BigCommerce\ApiV3\Api\Themes\ThemesApi;
use BigCommerce\ApiV3\Api\Widgets\WidgetsApi;
use BigCommerce\ApiV3\Api\CustomTemplateAssociations\CustomTemplateAssociationsApi;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class Client
{
    public const DEFAULT_HANDLER      = 'handler';
    public const DEFAULT_BASE_URI     = 'base_uri';
    public const DEFAULT_HEADERS      = 'headers';
    public const HEADERS__AUTH_CLIENT = 'X-Auth-Client';
    public const HEADERS__AUTH_TOKEN  = 'X-Auth-Token';
    public const API_URI              = 'https://api.bigcommerce.com/stores/%s/v3/';

    private string $storeHash;

    private string $clientId;

    private string $accessToken;

    private string $baseUri;

    private \GuzzleHttp\Client $client;

    private array $debugContainer = [];

    public function __construct(
        string $storeHash,
        string $clientId,
        string $accessToken,
        ?\GuzzleHttp\Client $client = null
    ) {
        $this->storeHash    = $storeHash;
        $this->clientId     = $clientId;
        $this->accessToken  = $accessToken;
        $this->setBaseUri(sprintf(self::API_URI, $this->storeHash));

        $this->client = $client ?? $this->buildDefaultHttpClient();
    }

    private function buildDefaultHttpClient(): \GuzzleHttp\Client
    {
        $history = Middleware::history($this->debugContainer);
        $stack   = HandlerStack::create();
        $stack->push($history);

        return new \GuzzleHttp\Client([
            self::DEFAULT_HANDLER  => $stack,
            self::DEFAULT_BASE_URI => $this->getBaseUri(),
            self::DEFAULT_HEADERS  => [
                self::HEADERS__AUTH_CLIENT => $this->clientId,
                self::HEADERS__AUTH_TOKEN  => $this->accessToken,
            ],
        ]);
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public function getRestClient(): \GuzzleHttp\Client
    {
        return $this->client;
    }

    public function setRestClient(\GuzzleHttp\Client $client): void
    {
        $this->client = $client;
    }

    public function printDebug()
    {
        foreach ($this->debugContainer as $transaction) {
            print_r(json_decode($transaction['request']->getBody()));
        }
    }

    public function printDebugLastRequest()
    {
        print_r(json_decode(array_pop($this->debugContainer)['request']->getBody()));
    }

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
}
