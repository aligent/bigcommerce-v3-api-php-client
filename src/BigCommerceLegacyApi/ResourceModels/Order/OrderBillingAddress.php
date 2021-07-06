<?php

namespace BigCommerce\ApiV2\ResourceModels\Order;

class OrderBillingAddress extends OrderAddress
{
    public array $form_fields;

    public static function sameAsShipping(OrderShippingAddress $address): self
    {
        return new OrderBillingAddress((object)$address);
    }
}
