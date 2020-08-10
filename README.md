# BigCommerce V3 Api Library

## Introduction
This is an (very) early development version of an easy-to-use API client for BigCommerce.

## Installation

Install via _composer_: `composer require aligent/bigcommerce-api-client`.

## Usage

Trivial example of updating a product name:

```php
$api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);

$product = $api->catalog()->product(123)->get()->getProduct();
$product->name = 'Updated product name';
try {
    $api->catalog()->product($product->id)->update($product);
} catch (\Psr\Http\Client\ClientExceptionInterface $exception) {
    echo "Unable to update product: {$exception->getMessage()}";
}
```

Fetching all visible products (all pages of products):

```php
$api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);

$productsResponse = $api->catalog()->products()->getAllPages(['is_visible' => true]);

echo "Found {$productsResponse->getPagination()->total} products";

$products = $productsResponse->getProducts();
```

## Development

Running tests: `composer run-script test`

## Coverage

Catalog API

 - Brands
 - Category
 - Product (partial) 
 - Summary

## Still To Do

- Document apis that are still to be implemented
- Test coverage
- Documentation
