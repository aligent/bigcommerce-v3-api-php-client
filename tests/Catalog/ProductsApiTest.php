<?php


use BigCommerce\ApiV3\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;
use PHPUnit\Framework\TestCase;

final class ProductsApiTest extends TestCase
{
    private const API_STORE_HASH    = 'HASH';
    private const API_CLIENT_ID     = 'ID';
    private const API_ACCESS_TOKEN  = "TOKEN";

    private Client $api;

    protected function setUp(): void
    {
        $this->api = new Client(
            self::API_STORE_HASH,
            self::API_CLIENT_ID,
            self::API_ACCESS_TOKEN
        );
    }

    public function testProductIdIsSet(): void
    {
        $expectedProductId = 1;
        $productsApi = $this->api->catalog()->product($expectedProductId);
        $this->assertEquals($expectedProductId, $productsApi->getResourceId());
    }

    public function testProductIdNotSet(): void
    {
        $productsApi = $this->api->catalog()->products();
        $this->assertNull($productsApi->getResourceId());
    }

    public function testCanGetProducts(): void
    {
        $this->setReturnData('catalog__products__get_all.json');

        $productsResponse = $this->api->catalog()->products()->getAll();
        $this->assertEquals(2, $productsResponse->getPagination()->total);
    }

    private function setReturnData(string $filename, int $statusCode = 200, array $headers = []): void
    {
        $mock = new MockHandler([
            new Response($statusCode, $headers, file_get_contents(__DIR__.'/responses/'.$filename)),
        ]);

        $client = new \GuzzleHttp\Client(['handler' => HandlerStack::create($mock)]);

        $this->api->setRestClient($client);
    }
}
