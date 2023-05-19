<?php

namespace BigCommerce\Tests\Api\Webhooks;

use BigCommerce\Tests\BigCommerceApiTest;

class WebhooksApiTest extends BigCommerceApiTest
{
    public function testCanGetWebhook()
    {
        $this->setReturnData('webhooks__get.json');
        $webhook = $this->getApi()->webhook(18048287)->get()->getWebhook();

        $this->assertEquals('https://665b65a6.ngrok.io/webhooks', $webhook->destination);
        $this->assertEquals('string', $webhook->headers['custom']);
    }

    public function testCanGetWebhooks()
    {
        $this->setReturnData('webhooks__get_all.json');
        $webhooks = $this->getApi()->webhooks()->getAll()->getWebhooks();
        $this->assertEquals('store/order/*', $webhooks[0]->scope);
    }
}
