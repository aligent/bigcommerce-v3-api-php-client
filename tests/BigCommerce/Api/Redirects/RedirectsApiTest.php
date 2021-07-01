<?php

namespace BigCommerce\Tests\Api\Redirects;

use BigCommerce\ApiV3\ResourceModels\Redirect\Redirect;
use BigCommerce\ApiV3\ResourceModels\Redirect\RedirectTo;
use BigCommerce\Tests\BigCommerceApiTest;
use GuzzleHttp\Exception\RequestException;

class RedirectsApiTest extends BigCommerceApiTest
{
    public function testCanUpsertRedirects()
    {
        $this->setReturnData('storefront__redirects.json', 201);
        $redirect = new Redirect();
        $redirect->from_path = '/old-url';
        $redirect->site_id = 0;
        $redirect->toProduct(1);

        $this->assertEquals(RedirectTo::TYPE__PRODUCT, $redirect->to->type);
        $this->assertEquals(1, $redirect->to->entity_id);

        $this->getApi()->redirects()->upsert([$redirect]);
        $this->assertEquals('storefront/redirects', $this->getLastRequestPath());
    }

    public function testCanGetRedirects()
    {
        $this->setReturnData('storefront__redirects.json', 200);

        $redirects = $this->getApi()->redirects()->getAll()->getRedirects();
        $this->assertEquals('/old-url', $redirects[0]->from_path);
        $this->assertInstanceOf(RedirectTo::class, $redirects[0]->to);
    }

    public function testCanDeleteRedirects()
    {
        $this->setReturnData('blank.json', 204);
        $this->getApi()->redirects()->delete([1, 2, 3]);
        $this->assertEquals('storefront/redirects', $this->getLastRequestPath());
    }

    public function testRetryOnError()
    {
        $this->setReturnData('blank.json', 503, [], 3);
        $redirect = new Redirect();
        $redirect->from_path = '/old-url';
        $redirect->site_id = 0;
        $redirect->toProduct(1);

        //https://httpbin.org/status/502
        $redirectsApi = $this->getApi()->redirects();
        $redirectsApi->setMaxRetries(2);
        try {
            $redirectsApi->upsert([$redirect]);
            $this->assertFalse(true, 'Exception not raised');
        } catch (RequestException $e) {
            $this->assertCount(3, $this->getRequestHistory());
        }
    }
}
