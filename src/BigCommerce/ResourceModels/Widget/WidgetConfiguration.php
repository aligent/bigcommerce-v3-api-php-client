<?php

namespace BigCommerce\ApiV3\ResourceModels\Widget;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class WidgetConfiguration extends ResourceModel
{
    /**
     * @var WidgetConfigurationImage[]
     */
    public array $images;
    public object $_; // phpcs:ignore PSR2.Classes.PropertyDeclaration.Underscore
}
