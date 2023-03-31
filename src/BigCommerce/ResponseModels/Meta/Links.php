<?php

namespace BigCommerce\ApiV3\ResponseModels\Meta;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Links extends ResourceModel
{
    public ?string $previous;
    public string $current;
    public ?string $next;
}
