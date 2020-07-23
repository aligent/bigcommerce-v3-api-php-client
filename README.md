# BigCommerce V3 Api Library

## Introduction
This is an (very) early development version of an easy-to-use API client for BigCommerce.

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

## Development

Running tests: `./vendor/bin/phpunit tests`

## Coverage

Catalog API

- Partial

## Still To Do



- Packagist / Versions
- Document apis that are still to be implemented
- Test coverage and build
- Documentation