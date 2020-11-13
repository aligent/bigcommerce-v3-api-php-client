<?php

namespace BigCommerce\Tests\Api\Scripts;

use BigCommerce\ApiV3\ResourceModels\Script\Script;
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

    public function testCanCreateScript(): void
    {
        $this->setReturnData('scripts__create.json');
        $json = [
            "uuid" => "311a146b-8322-4b6e-905f-6c9a6037514b",
            "name" => "jQuery",
            "description" => "The Write Less, Do More, JavaScript Library.",
            "html" => "",
            "src" => "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js",
            "auto_uninstall" => true,
            "load_method" => "default",
            "location" => "head",
            "visibility" => "storefront",
            "kind" => "src",
            "date_created" => "2018-09-17T16:39:43.472Z",
            "date_modified" => "2018-09-17T16:39:43.472Z",
            "api_client_id" => "2d63fbe890f4ac83794d69f361e055"
        ];
        $script = new Script((object)$json);

        $storedScript = $this->getApi()->scripts()->create($script)->getScript();
        $this->assertEquals($script->uuid, $storedScript->uuid);
    }
}
