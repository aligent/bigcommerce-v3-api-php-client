<?php

namespace BigCommerce\Tests\Api\Themes;

use BigCommerce\ApiV3\Api\Themes\ThemeActionsApi;
use BigCommerce\Tests\BigCommerceApiTest;

class ThemeActionsApiTest extends BigCommerceApiTest
{
    public function testCanDownloadTheme()
    {
        $this->setReturnData('themes__upload.json');
        $this->assertEquals(
            'ceea1917b1518f5ae491da6ad8a56336',
            $this->getApi()->theme('abcdefg')->actions()->download(ThemeActionsApi::LAST_CREATED)->getJobId()
        );
    }

    public function testCanActivateTheme()
    {
        $this->setReturnData(self::EMPTY_RESPONSE, 200);

        $this->assertTrue($this->getApi()->themes()->actions()->activate('abc', ThemeActionsApi::ORIGINAL));
    }
}
