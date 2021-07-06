<?php

namespace BigCommerce\ApiV2\ResourceModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class OrderProduct extends ResourceModel
{
    public string $name;
    public ?string $upc;
    public ?string $sku;
    public string $quantity;
    public string $price_inc_tax;
    public string $price_ex_tax;

    public static function build(string $name, string $quantity, string $price_inc_tax, string $price_ex_tax): self
    {
        $product = new OrderProduct();
        $product->name = $name;
        $product->quantity = $quantity;
        $product->price_ex_tax = $price_ex_tax;
        $product->price_inc_tax = $price_inc_tax;

        return $product;
    }
}
