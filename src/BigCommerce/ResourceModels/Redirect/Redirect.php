<?php

namespace BigCommerce\ApiV3\ResourceModels\Redirect;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class Redirect extends ResourceModel
{
    public string $from_path;
    public int $site_id;
    public RedirectTo $to;

    public function __construct(?stdClass $optionObject = null)
    {
        if (isset($optionObject->to)) {
            $this->to = new RedirectTo($optionObject->to);
            unset($optionObject->to);
        }

        parent::__construct($optionObject);
    }
}
