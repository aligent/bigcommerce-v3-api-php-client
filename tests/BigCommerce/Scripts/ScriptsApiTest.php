<?php

namespace BigCommerce\Tests\Scripts;

use BigCommerce\Tests\BigCommerceApiTest;

class ScriptsApiTest extends BigCommerceApiTest
{
    public function testCanGetScript(): void
    {
        $this->setReturnData('scripts__get.json');
        $uuid = '311a146b-8322-4b6e-905f-6c9a6037514b';

        $script = $this->getApi()->script($uuid)->get()->getScript();
        $this->assertEquals('The Write Less, Do More, JavaScript Library.', $script->description);
    }

    public function testCanGetScripts(): void
    {
        $this->setReturnData('scripts__get_all.json');

        $scripts = $this->getApi()->scripts()->getAll()->getScripts();
        $this->assertEquals('Build responsive websites', $scripts[1]->description);
    }
}
