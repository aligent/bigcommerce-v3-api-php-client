<?php

namespace BigCommerce\ApiV3\ResourceModels\Theme;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class ThemeJob extends ResourceModel
{
    public const STATUS__QUEUED     = 'QUEUED';
    public const STATUS__WORKING    = 'WORKING';
    public const STATUS__COMPLETED  = 'COMPLETED';
    public const STATUS__FAILED     = 'FAILED';

    public string $id;
    public string $time;
    public string $status;
    public float $percent_complete;
    public JobResult $result;
    /**
     * @var JobWarning[]
     */
    public array $warnings;
    /**
     * @var JobError[]
     */
    public array $errors;

    public function __construct(?stdClass $optionObject = null)
    {
        $this->result = new JobResult($optionObject->result);
        unset($optionObject->result);
        parent::__construct($optionObject);
    }

    public function getThemeId(): string
    {
        return $this->result->theme_id;
    }
}
