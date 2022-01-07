<?php

namespace BigCommerce\ApiV3\Files;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class BigCommerceFilesClient
{
    private string $webdavPath;
    private string $webdavUsername;
    private string $webdavPassword;
    private ?Client $client;

    private const DEFAULT_HANDLER      = 'handler';
    private const DEFAULT_BASE_URI     = 'base_uri';
    private const DEFAULT_HEADERS      = 'headers';

    private const HEADERS__AUTH_CLIENT  = 'X-Auth-Client';
    private const HEADERS__AUTH_TOKEN   = 'X-Auth-Token';
    private const HEADERS__CONTENT_TYPE = 'Content-Type';
    private const HEADERS__ACCEPT       = 'Accept';
    private const APPLICATION_JSON      = 'application/json';

    private array $debugContainer = [];


    public function __construct(
        string $webdavPath,
        string $webdavUsername,
        string $webdavPassword,
        ?Client $client = null
    ) {
        $this->webdavPath = $webdavPath;
        $this->webdavUsername = $webdavUsername;
        $this->webdavPassword = $webdavPassword;
        $this->client = $client ?: $this->buildDefaultHttpClient();
    }

    private function buildDefaultHttpClient(): \GuzzleHttp\Client
    {
        $history = Middleware::history($this->debugContainer);
        $stack   = HandlerStack::create();
        $stack->push($history);

        return new \GuzzleHttp\Client([
            self::DEFAULT_HANDLER  => $stack,
            self::DEFAULT_BASE_URI => $this->webdavPath,
            'auth' => [$this->webdavUsername, $this->webdavPassword, 'digest'],
            'http_errors' => false,
            'version' => 1.1,
        ]);
    }

    public function exists(string $filename): bool
    {
        $response = $this->client->head($filename);

        return $response->getStatusCode() === 200;
    }

    public function get(string $filename): ?string
    {
        $response = $this->client->get($filename);

        if ($response->getStatusCode() === 200) {
            return (string)$response->getBody();
        } else {
            return null;
        }
    }

    public function put(string $localFilename, string $targetFilename): bool
    {
        $file = fopen($localFilename, 'r');

        if (!$file) return false;

        $response = $this->client->put($targetFilename,
            [
                'body' => $file
            ]);

        return $response->getStatusCode() === 201;
    }
}
