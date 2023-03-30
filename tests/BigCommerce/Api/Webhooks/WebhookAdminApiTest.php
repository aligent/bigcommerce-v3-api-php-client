<?php

namespace BigCommerce\Tests\Api\Webhooks;

use BigCommerce\Tests\BigCommerceApiTest;

class WebhookAdminApiTest extends BigCommerceApiTest
{
    public function testCanGetAdminInfo()
    {
        $this->setReturnData('webhooks__admin__get.json');
        $info = $this->getApi()->webhooks()->admin()->get()->getAdminInfo();

        $this->assertEquals('https://httpstat.us/200', $info->hooks_list[1]->destination);
    }
}
