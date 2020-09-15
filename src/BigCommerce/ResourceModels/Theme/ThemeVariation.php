<?php

namespace BigCommerce\ApiV3\ResourceModels\Theme;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ThemeVariation extends ResourceModel
{
    public string $uuid;
    public string $name;
    public string $description;
    public string $external_id;
}
