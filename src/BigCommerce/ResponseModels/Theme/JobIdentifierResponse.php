<?php

namespace BigCommerce\ApiV3\ResponseModels\Theme;

use Psr\Http\Message\ResponseInterface;

class JobIdentifierResponse
{
    private string $jobId;

    public function __construct(ResponseInterface $response)
    {
        $this->jobId = json_decode($response->getBody())->job_id;
    }

    public function getJobId(): string
    {
        return $this->jobId;
    }
}
