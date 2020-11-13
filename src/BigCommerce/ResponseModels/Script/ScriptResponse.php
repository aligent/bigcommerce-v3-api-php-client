<?php

namespace BigCommerce\ApiV3\ResponseModels\Script;

use BigCommerce\ApiV3\ResourceModels\Script\Script;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ScriptResponse extends SingleResourceResponse
{
    private Script $script;

    public function getScript(): Script
    {
        return $this->script;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->script = new Script($rawData);
    }
}
