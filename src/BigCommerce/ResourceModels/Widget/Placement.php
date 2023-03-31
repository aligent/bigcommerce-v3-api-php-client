<?php

namespace BigCommerce\ApiV3\ResourceModels\Widget;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class Placement extends ResourceModel
{
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_ACTIVE   = 'active';

    public ?string $widget_uuid;
    public string $entity_id;
    public string $template_file;
    public string $status;
    public int $sort_order;
    public string $region;
    public ?Widget $widget;
    public string $date_created;
    public string $date_modified;
    public string $uuid;

    public function __construct(?stdClass $optionObject = null)
    {
        if (isset($optionObject->widget)) {
            $this->widget = new Widget($optionObject->widget);
            unset($optionObject->widget);
        }
        parent::__construct($optionObject);
    }
}
