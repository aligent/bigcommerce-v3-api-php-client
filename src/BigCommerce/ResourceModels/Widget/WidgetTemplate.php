<?php

namespace BigCommerce\ApiV3\ResourceModels\Widget;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class WidgetTemplate extends ResourceModel
{
    public string $uuid;
    public string $template;
    public array $schema;
    public string $name;
    public string $kind;
    public ?string $icon_name;
    public string $date_created;
    public string $date_modified;
    public ?string $current_version_uuid;
}
