<?php

namespace BigCommerce\ApiV3\ResponseModels\StoreLogs;

use BigCommerce\ApiV3\ResourceModels\SystemLog\SystemLog;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class SystemLogsResponse extends PaginatedResponse
{
    /**
     * @return SystemLog[]
     */
    public function getSystemLogs(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return SystemLog::class;
    }
}
