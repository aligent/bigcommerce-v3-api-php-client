### New Features

- Implement the [Cart API](https://developer.bigcommerce.com/api-reference/store-management/carts/cart/createacart).
- Implement the [Cart Items API](https://developer.bigcommerce.com/api-reference/store-management/carts/cart-items/addcartlineitem)
- Implement the [Cart Redirect URLS API](https://developer.bigcommerce.com/api-reference/store-management/carts/cart-redirect-urls/createcartredirecturl)
- Allow the use of [parameters in ProductsApi::Get](https://developer.bigcommerce.com/api-reference/store-management/catalog/products/getproductbyid).

Here's an example using PHP 8:

```php
$product = $api->catalog()->product(123)->get(include_fields: ['description', 'sku'])->getProduct();
```

### Bug Fix

Fix issue with ProductVariant::sku_id not being nullable #47 (thanks @Yorgv)


