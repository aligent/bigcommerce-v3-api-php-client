<?php

namespace BigCommerce\ApiV3\ResourceModels\Theme;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class JobError extends ResourceModel
{
    public string $error;
    public string $message;
}
