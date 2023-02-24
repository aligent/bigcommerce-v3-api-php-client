<?php

namespace BigCommerce\ApiV3\ResourceModels\SystemLog;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class SystemLog extends ResourceModel
{
    public int $id;
    public string $type;
    public string $module;
    public string $severity;
    public string $summary;
    public string $message;
    public string $date_created;
}
