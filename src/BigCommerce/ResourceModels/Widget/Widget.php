<?php

namespace BigCommerce\ApiV3\ResourceModels\Widget;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class Widget extends ResourceModel
{
    public string $date_created;
    public string $date_modified;
    public string $description;
    public string $name;
    public string $uuid;
    public string $version_uuid;
    public WidgetConfiguration $widget_configuration;
    public WidgetTemplate $widget_template;

    public function __construct(?stdClass $optionObject = null)
    {
        if (isset($optionObject->widget_template)) {
            $this->widget_template = new WidgetTemplate($optionObject->widget_template);
            unset($optionObject->widget_template);
        }

        if (isset($optionObject->widget_configuration)) {
            $this->widget_configuration = new WidgetConfiguration($optionObject->widget_configuration);
            unset($optionObject->widget_configuration);
        }

        parent::__construct($optionObject);
    }
}
