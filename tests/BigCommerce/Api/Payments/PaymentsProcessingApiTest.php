<?php

namespace BigCommerce\Tests\Api\Payments;

use BigCommerce\ApiV3\ResourceModels\Order\Order;
use BigCommerce\Tests\BigCommerceApiTest;

class PaymentsProcessingApiTest extends BigCommerceApiTest
{
    public function testCanCreatePaymentToken(): void
    {
        $this->setReturnData('payments__create_payment_access_token.json', 201);
        $order = new Order(1, false);

        $token = $this->getApi()->payments()->createToken($order)->getToken();
        $this->assertEquals('abcdefg', $token->id);
    }

    public function testCanGetPaymentMethodsForOrder(): void
    {
        $this->setReturnData('payments__get_accepted_payment_methods.json');
        $methods = $this->getApi()->payments()->paymentMethods(123)->getMethods();

        $this->assertCount(1, $methods);
        $this->assertEquals('stripe.card', $methods[0]->id);
    }
}
