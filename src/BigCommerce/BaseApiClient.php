<?php

namespace BigCommerce\ApiV3;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

abstract class BaseApiClient
{
    public const DEFAULT_HANDLER      = 'handler';
    public const DEFAULT_BASE_URI     = 'base_uri';
    public const DEFAULT_HEADERS      = 'headers';

    private const HEADERS__AUTH_CLIENT  = 'X-Auth-Client';
    private const HEADERS__AUTH_TOKEN   = 'X-Auth-Token';
    private const HEADERS__CONTENT_TYPE = 'Content-Type';
    private const HEADERS__ACCEPT       = 'Accept';
    private const APPLICATION_JSON      = 'application/json';

    private string $storeHash;

    private string $clientId;

    private string $accessToken;

    private string $baseUri;

    private \GuzzleHttp\Client $client;

    private array $debugContainer = [];

    public function __construct(
        string $storeHash,
        string $clientId,
        string $accessToken,
        ?\GuzzleHttp\Client $client = null
    ) {
        $this->storeHash    = $storeHash;
        $this->clientId     = $clientId;
        $this->accessToken  = $accessToken;
        $this->setBaseUri(sprintf($this->defaultBaseUrl(), $this->storeHash));

        $this->client = $client ?? $this->buildDefaultHttpClient();
    }

    private function buildDefaultHttpClient(): \GuzzleHttp\Client
    {
        $history = Middleware::history($this->debugContainer);
        $stack   = HandlerStack::create();
        $stack->push($history);

        return new \GuzzleHttp\Client([
            self::DEFAULT_HANDLER  => $stack,
            self::DEFAULT_BASE_URI => $this->getBaseUri(),
            self::DEFAULT_HEADERS  => [
                self::HEADERS__AUTH_CLIENT  => $this->clientId,
                self::HEADERS__AUTH_TOKEN   => $this->accessToken,
                self::HEADERS__CONTENT_TYPE => self::APPLICATION_JSON,
                self::HEADERS__ACCEPT       => self::APPLICATION_JSON,
            ],
        ]);
    }

    public function getBaseUri(): string
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

    public function setRestClient(\GuzzleHttp\Client $client): void
    {
        $this->client = $client;
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

    abstract protected function defaultBaseUrl(): string;

    public function getDebugContainer(): array
    {
        return $this->debugContainer;
    }
}
