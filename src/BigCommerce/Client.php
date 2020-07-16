<?php


namespace BigCommerce\ApiV3;


use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class Client
{

    private string $storeHash;

    private string $clientId;

    private string $accessToken;

    private string $baseUri;

    private \GuzzleHttp\Client $client;

    private array $debugContainer = [];

    public function __construct(string $storeHash, string $clientId, string $accessToken)
    {
        $this->storeHash    = $storeHash;
        $this->clientId     = $clientId;
        $this->accessToken  = $accessToken;
        $this->setBaseUri("https://api.bigcommerce.com/stores/$this->storeHash/v3/");

        $this->client = $this->buildHttpClient();
    }

    private function buildHttpClient() : \GuzzleHttp\Client
    {
        $history = Middleware::history($this->debugContainer);
        $stack   = HandlerStack::create();
        $stack->push($history);

        return new \GuzzleHttp\Client([
            'handler' => $stack,
            'base_uri' => $this->getBaseUri(),
            'headers' => [
                'X-Auth-Client' => $this->clientId,
                'X-Auth-Token'  => $this->accessToken,
            ],
        ]);
    }

    public function getBaseUri() : string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public function getRestClient(): \GuzzleHttp\Client
    {
        return $this->client;
    }

    public function printDebug()
    {
        foreach ($this->debugContainer as $transaction) {
            print_r(json_decode($transaction['request']->getBody()));
        }
    }

    public function printDebugLastRequest()
    {
        print_r(json_decode(array_pop($this->debugContainer)['request']->getBody()));
    }

    public function catalog() : Catalog
    {
        return new Catalog($this);
    }
}
