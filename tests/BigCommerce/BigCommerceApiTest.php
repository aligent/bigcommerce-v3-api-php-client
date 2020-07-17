<?php
namespace BigCommerce\Tests;

use BigCommerce\ApiV3\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

abstract class BigCommerceApiTest extends TestCase
{
    private const API_STORE_HASH    = 'HASH';
    private const API_CLIENT_ID     = 'ID';
    private const API_ACCESS_TOKEN  = "TOKEN";

    private Client $api;

    public function getApi(): Client
    {
        return $this->api;
    }

    protected function setUp(): void
    {
        $this->api = new Client(
            self::API_STORE_HASH,
            self::API_CLIENT_ID,
            self::API_ACCESS_TOKEN
        );
    }

    protected function setReturnData(string $filename, int $statusCode = 200, array $headers = []): void
    {
        $mock = new MockHandler([
            new Response($statusCode, $headers, file_get_contents(__DIR__ . '/responses/' .$filename)),
        ]);

        $client = new \GuzzleHttp\Client(['handler' => HandlerStack::create($mock)]);

        $this->getApi()->setRestClient($client);
    }
}
