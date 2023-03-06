<?php

namespace BigCommerce\ApiV3;

use BigCommerce\ApiV3\Api\Carts\CartsApi;
use BigCommerce\ApiV3\Api\Catalog\CatalogApi;
use BigCommerce\ApiV3\Api\Channels\ChannelsApi;
use BigCommerce\ApiV3\Api\Orders\OrdersApi;
use BigCommerce\ApiV3\Api\Customers\CustomersApi;
use BigCommerce\ApiV3\Api\Pages\PagesApi;
use BigCommerce\ApiV3\Api\Payments\PaymentsProcessingApi;
use BigCommerce\ApiV3\Api\PriceLists\PriceListsApi;
use BigCommerce\ApiV3\Api\Redirects\RedirectsApi;
use BigCommerce\ApiV3\Api\Scripts\ScriptsApi;
use BigCommerce\ApiV3\Api\Sites\SitesApi;
use BigCommerce\ApiV3\Api\StoreLogs\StoreLogsApi;
use BigCommerce\ApiV3\Api\Themes\ThemesApi;
use BigCommerce\ApiV3\Api\Widgets\WidgetsApi;
use BigCommerce\ApiV3\Api\CustomTemplateAssociations\CustomTemplateAssociationsApi;
use BigCommerce\ApiV3\Api\Wishlists\WishlistsApi;

/**
 * The parent API class
 *
 * ## Usage Examples
 *
 * Trivial example of updating a product name:
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $product = $api->catalog()->product(123)->get()->getProduct();
 * $product->name = 'Updated product name';
 * try {
 *     $api->catalog()->product($product->id)->update($product);
 * } catch (\Psr\Http\Client\ClientExceptionInterface $exception) {
 *     echo "Unable to update product: {$exception->getMessage()}";
 * }
 * ```
 *
 * Fetching all visible products (all pages of products):
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $productsResponse = $api->catalog()->products()->getAllPages(['is_visible' => true]);
 *
 * echo "Found {$productsResponse->getPagination()->total} products";
 *
 * $products = $productsResponse->getProducts();
 * ```
 *
 * Example of updating a product variant
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $productVariant = $api->catalog()->product(123)->variant(456)->get()->getProductVariant();
 * $productVariant->price = '12';
 *
 * try {
 *     $api->catalog()->product($productVariant->product_id)->variant($productVariant->id)->update($productVariant);
 * } catch (\Psr\Http\Client\ClientExceptionInterface $exception) {
 *     echo "Unable to update product variant: {$exception->getMessage()}";
 * }
 * ```
 *
 * Example of creating a product variant
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $productVariant = new \BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariant();
 * $productVariant->product_id = 123;
 * $productVariant->sku = "SKU-123";
 * //...
 *
 * try {
 *     $api->catalog()->product($productVariant->product_id)->variants()->create($productVariant);
 * } catch (\Psr\Http\Client\ClientExceptionInterface $exception) {
 *     echo "Unable to create product variant: {$exception->getMessage()}";
 * }
 * ```
 *
 */
class Client extends BaseApiClient
{
    public const API_URI = 'https://api.bigcommerce.com/stores/%s/v3/';

    public function catalog(): CatalogApi
    {
        return new CatalogApi($this);
    }

    public function customer(int $customerId): CustomersApi
    {
        return new CustomersApi($this, $customerId);
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

    public function wishlist(int $id): WishlistsApi
    {
        return new WishlistsApi($this, $id);
    }

    public function wishlists(): WishlistsApi
    {
        return new WishlistsApi($this);
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

    public function page(int $id): PagesApi
    {
        return new PagesApi($this, $id);
    }

    public function pages(): PagesApi
    {
        return new PagesApi($this);
    }

    public function redirects(): RedirectsApi
    {
        return new RedirectsApi($this);
    }

    public function sites(): SitesApi
    {
        return new SitesApi($this);
    }

    public function site(int $id): SitesApi
    {
        return new SitesApi($this, $id);
    }

    public function storeLogs(): StoreLogsApi
    {
        return new StoreLogsApi($this);
    }

    protected function defaultBaseUrl(): string
    {
        return self::API_URI;
    }
}
