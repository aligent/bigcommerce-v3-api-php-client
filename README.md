# BigCommerce V3 Api Library

![Latest Release](https://img.shields.io/github/v/release/aligent/bigcommerce-v3-api-php-client?sort=semver)
![Packagist Latest](https://img.shields.io/packagist/v/aligent/bigcommerce-api-client)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/aligent/bigcommerce-api-client/dev-main)
![Packagist PHP Version Support](https://img.shields.io/github/license/aligent/bigcommerce-v3-api-php-client)
![Packagist PHP Version Support](https://img.shields.io/github/workflow/status/aligent/bigcommerce-v3-api-php-client/Validate%20PHP%20dependancies%20and%20test)


## Introduction
This is an early development version of an easy-to-use API client for BigCommerce.

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

### Store Management

#### Customers 

- ☑️ Customers
- ☑️ Addresses
- ☑️ Attributes
- ☑️ Attribute Values
- ☑️ Form Field Values
- ☑️ Consent

#### Orders (V3)

- ☑️ Order Metafields
- ☑️ Transactions
- ☑️ Order Refunds

#### Payment Methods

- ☑️ Payment Access Token
- ☑️ Payment Methods

#### Scripts

- ☑️ Scripts

#### Subscribers

- ☑️ Subscribers

#### Themes

- ☑️ Themes
- ☑️ Theme Actions
- ☑️ Theme Jobs

#### Widgets

- ☐ Regions
- ☐ Widget Template
- ☐ Widget
- ☐ Placement

### Catalog

#### Catalog API

- ☑️ Brands
- ☑️ Category
- ☑️ Product
- ☑️ Summary
- ☑️ Variants

#### Price Lists

- ☑️ Price Lists
- ☑️ Assignments
- ☑️ Records 

## Still To Do

- Document apis that are still to be implemented
- Test coverage
- Documentation
