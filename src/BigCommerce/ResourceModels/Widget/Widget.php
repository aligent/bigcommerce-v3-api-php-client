<?php

namespace BigCommerce\ApiV3\ResourceModels\Widget;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Widget extends ResourceModel
{
    public string $date_created;
    public string $date_modified;
    public string $description;
    public string $name;
    public string $uuid;
    public string $version_uuid;
    public object $widget_configuration; // @todo Implement Widget Configuration
    public object $widget_template; // @todo Implement Widget Template
}
