<?php

namespace BigCommerce\ApiV3\ResourceModels\Theme;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Theme extends ResourceModel
{
    public string $uuid;
    /**
     * @var ThemeVariation[]
     */
    public array $variations;
    public string $name;
    public bool $is_private;
    public bool $is_active;
}
