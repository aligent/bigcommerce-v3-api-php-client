<?php

namespace BigCommerce\Tests\Api\Sites;

use BigCommerce\ApiV3\ResourceModels\Site\SiteRoute;
use BigCommerce\Tests\BigCommerceApiTest;

class SiteRoutesApiTest extends BigCommerceApiTest
{
    public function testCanGetRoutes()
    {
        $this->setReturnData('site__routes__get_all.json');
        $routes = $this->getApi()->site(1)->routes()->getAll()->getRoutes();
        $this->assertCount(2, $routes);
        $this->assertEquals(SiteRoute::TYPE_PRODUCT, $routes[0]->type);
    }

    public function testCanGetRoute()
    {
        $this->setReturnData('site__route__60474753_get.json');
        $route = $this->getApi()->site(1)->route(60474753)->get()->getSiteRoute();
        $this->assertEquals('/my-amazing-product', $route->route);
    }

    public function testCanCreateRoute()
    {
        $this->setReturnData('blank.json');
        $route = new SiteRoute();
        $route->route = '/checkout';
        $route->type = SiteRoute::TYPE_CHECKOUT;
        $route->matching = '*';

        $response = $this->getApi()->site(1)->routes()->create($route);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
