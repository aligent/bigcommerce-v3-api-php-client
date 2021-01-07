<?php

namespace BigCommerce\Tests\Api\Themes;

use BigCommerce\ApiV3\Api\Themes\ThemesApi;
use BigCommerce\Tests\BigCommerceApiTest;

class ThemesApiTest extends BigCommerceApiTest
{
    public function testCanGetThemeAPI()
    {
        $this->assertInstanceOf(ThemesApi::class, $this->getApi()->themes());
        $this->assertEquals('abcd', $this->getApi()->theme('abcd')->getUuid());
    }

    public function testCanUploadTheme()
    {
        $this->setReturnData('themes__upload.json');
        $this->assertEquals(
            'ceea1917b1518f5ae491da6ad8a56336',
            $this->getApi()->themes()->upload(__FILE__)->getJobId()
        );
    }

    public function testCanGetTheme()
    {
        $expectedUuid = 'e3d82ce0-9bae-0133-0de7-525400970412';
        $this->setReturnData('themes__get.json');

        $response = $this->getApi()->theme($expectedUuid)->get();
        $this->assertEquals($expectedUuid, $response->getTheme()->uuid);
        $this->assertCount(3, $response->getTheme()->variations);
        $this->assertEquals('Light', $response->getTheme()->variations[0]->name);
    }

    public function testCanGetThemes()
    {
        $this->setReturnData('themes__get_all.json');
        $response = $this->getApi()->themes()->getAll();

        $this->assertCount(3, $response->getThemes());
        $this->assertCount(3, $response->getThemes()[0]->variations);
    }
}
