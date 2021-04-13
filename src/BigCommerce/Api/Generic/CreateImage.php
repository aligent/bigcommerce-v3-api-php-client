<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;
use GuzzleHttp\RequestOptions;

trait CreateImage
{
    abstract public function getClient(): Client;
    abstract protected function multipleResourceUrl(): string;

    /**
     * Add an image to a resource
     *
     * @param string $filename Any path that can be opened using fopen
     * @return string The url to the stored image
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function create(string $filename): string
    {
        $response = $this->getClient()->getRestClient()->post(
            $this->multipleResourceUrl(),
            [
                RequestOptions::MULTIPART => [
                    ['name' => 'image_file', 'contents'  => fopen($filename, 'r')]
                ]
            ]
        );

        return json_decode($response->getBody())->data->image_url;
    }
}
