<?php

namespace BigCommerce\Tests\Api\StoreLogs;

use BigCommerce\Tests\BigCommerceApiTest;

class StoreLogsApiTest extends BigCommerceApiTest
{
    public function testCanGetSystemLogs()
    {
        $this->setReturnData('storelogs__systemlogs__get.json');

        $logs = $this->getApi()->storeLogs()->get()->getSystemLogs();

        $this->assertEquals('2019-08-24T14:15:22Z', $logs[0]->date_created);
    }
}
