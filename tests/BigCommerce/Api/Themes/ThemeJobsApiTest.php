<?php

namespace BigCommerce\Tests\Api\Themes;

use BigCommerce\ApiV3\ResourceModels\Theme\ThemeJob;
use BigCommerce\Tests\BigCommerceApiTest;

class ThemeJobsApiTest extends BigCommerceApiTest
{
    public function testCanGetThemeJob()
    {
        $this->setReturnData('themes__jobs__get.json');
        $expectedId = 'ceea1917b1518f5ae491da6ad8a56336';
        $expectedThemeId = 'ed1982d0-9d78-0136-33ba-0d84a0c6431b';

        $response = $this->getApi()->themes()->job($expectedId)->get();
        $this->assertEquals($expectedId, $response->getJob()->id);
        $this->assertEquals(ThemeJob::STATUS__COMPLETED, $response->getJob()->status);
        $this->assertEquals($expectedThemeId, $response->getJob()->getThemeId());
    }
}
