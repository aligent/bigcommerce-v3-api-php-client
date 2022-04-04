<?php

namespace BigCommerce\ApiV2\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class OrderProductOption extends ResourceModel
{
    public int $id;
    public int $option_id;
    public int $order_product_id;
    public int $product_option_id;
    public string $display_name;
    public string $display_value;
    public string $value;
    public string $type;
    public string $name;
    public string $display_style;
    public string $display_name_customer;
    public string $display_name_merchant;
    public string $display_value_customer;
    public string $display_value_merchant;
}
