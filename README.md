# BigCommerce V3 Api Library

[![Latest Release](https://img.shields.io/github/v/release/aligent/bigcommerce-v3-api-php-client?sort=semver)](https://github.com/aligent/bigcommerce-v3-api-php-client/releases)
[![Packagist Latest](https://img.shields.io/packagist/v/aligent/bigcommerce-api-client)](https://packagist.org/packages/aligent/bigcommerce-api-client)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/aligent/bigcommerce-api-client/dev-main)
[![License](https://img.shields.io/github/license/aligent/bigcommerce-v3-api-php-client)](https://github.com/aligent/bigcommerce-v3-api-php-client/blob/main/LICENSE.md)
[![Build Status](https://img.shields.io/github/actions/workflow/status/aligent/bigcommerce-v3-api-php-client/php.yml?branch=main)](https://github.com/aligent/bigcommerce-v3-api-php-client/actions/workflows/php.yml)
[![Documentation](https://img.shields.io/badge/docs-generated-success)](https://aligent.github.io/bigcommerce-v3-api-php-client/)
## Introduction

This is an easy-to-use API client for [BigCommerce](https://developer.bigcommerce.com/api-reference).

## Installation

Install [aligent/bigcommerce-api-client ](https://packagist.org/packages/aligent/bigcommerce-api-client) 
from packagist using [composer](https://getcomposer.org/): `composer require aligent/bigcommerce-api-client`.

## Usage Examples

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

Example of updating a product variant

```php
$api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);

$productVariant = $api->catalog()->product(123)->variant(456)->get()->getProductVariant();
$productVariant->price = '12';

try {
    $api->catalog()->product($productVariant->product_id)->variant($productVariant->id)->update($productVariant);
} catch (\Psr\Http\Client\ClientExceptionInterface $exception) {
    echo "Unable to update product variant: {$exception->getMessage()}";
}
```

Example of creating a product variant

```php
$api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);

$productVariant = new \BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariant();
$productVariant->product_id = 123;
$productVariant->sku = "SKU-123";
//...

try {
    $api->catalog()->product($productVariant->product_id)->variants()->create($productVariant);
} catch (\Psr\Http\Client\ClientExceptionInterface $exception) {
    echo "Unable to create product variant: {$exception->getMessage()}";
}
```

### API Design

There are three components to the library:

- [BigCommerce/Api](./src/BigCommerce/Api) - which represent the API endpoints and tries to mimic the layout of the 
  documentation.
  
- [BigCommerce/ResourceModels](./src/BigCommerce/ResourceModels) - which represent the resources that are sent to and 
  received from the API, for example a `Product` or an `Order`.
  
- [BigCommerce/ResponseModels](./src/BigCommerce/ResponseModels) - which represent the responses from the BigCommerce 
  API.
  
For additional documentation, see the [code documentation](https://aligent.github.io/bigcommerce-v3-api-php-client/).
  
#### API Classes

To interact with the API, always start with the [BigCommerce\ApiV3\Client](./src/BigCommerce/Client.php) class. All APIs
can be accessed in two ways: with and without an ID.

If you are querying about a specific resource instance (e.g. Product 5), then you would use singular endpoint (
`->catalog()->product(5)`), otherwise you would use the plural endpoint (i.e. `->catalog()->products()`). 

For example, suppose we want to find all the metafields for a brand with and id of `123`. Our query is for a _specific_
brand, but any metafield, so the call would look like:

```php
$api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);

$metafieldsResponse = $api->catalog()->brand(123)->metafields()->getAll();
$metafields = $metafieldsResponse->getMetafields();
```

Suppose we now want to delete metafield `456` on brand `123`. Now our query is for a _specific_ brand and a _specific_ 
metafield.

```php
$api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);

$api->catalog()->brand(123)->metafield(456)->delete();
```

#### Resource Model Classes

The resource models represent the resources we provided to the API and the responses we receive.

To create a new resource, simply instantiate a new object of the correct resource model and then send it to the create
endpoint. For example, if we want to create a new brand:

```php
$api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);

$brand = new BigCommerce\ApiV3\ResourceModels\Catalog\Brand\Brand();
$brand->name = "My Brand";
$brand->meta_description = "My wonderful brand";

$api->catalog()->brands()->create($brand);
```

#### Response Model Classes

Responses from the API all use similar response classes for consistency. There are two types generally: singular responses, 
and plural responses. Singular responses will have a single method in the format `get<resource>()`,
for example (`ProductResponse::getProduct()`). Plural responses will have two methods, a `getPagination()`
 and `get<resources>()` (e.g. `ProductsResponse::getProducts()`).

Note that the API request is sent when the action is called and the response
is returned.

```php
$api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);

// Singular Responses
$category = $api->catalog()->category(456)->get()->getCategory();
$brand    = $api->catalog()->brand(123)->get()->getBrand(); 

// Plural Responses
$categoryResponse = $api->catalog()->categories()->getAll(limit: 10);
$totalCategories  = $categoryResponse->getPagination()->total;
$categories       = $categoryResponse->getCategories();

$brands = $api->catalog()->brands()->getAll()->getBrands();
```

## Development

- Running tests: `composer run-script test`
- Checking PHP style rules: `composer run-script check-style`
- Auto fix code style rules: `composer run-script fix-style`

If you do not have composer installed, you can use the docker version: `docker run --rm -it -v $PWD:/app composer run-script check-style`

### Writing Tests

All tests are located in the _tests_ folder in the namespace `BigCommerce\Tests`. The namespace should match the class
being tested after this, e.g. `BigCommerce\Tests\Api\Carts` for testing `BigCommerce\ApiV3\Api\Carts\CartsApi`.

Responses can be mocked using the  `BigCommerceApiTest::setReturnData()` function then you can inspect the request that
was made with `BigCommerceApiTest::getLastRequest()`. Response JSON files are stored in _tests/BigCommerce/responses_.

## Full Documentation

If you would like to have full class documentation, run 
`docker run --rm -v /path/to/vendor/aligent/bigcommerce-api:/data phpdoc/phpdoc:3 run -d /data/src -t /data/docs --defaultpackagename BigCommerce --visibility public`
