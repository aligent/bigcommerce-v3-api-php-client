<?php

namespace BigCommerce\ApiV3\ResourceModels\Channel;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class ChannelSite extends ResourceModel
{
    public int $id;
    public string $url;
    public int $channel_id;
    public string $created_at;
    public string $updated_at;

    /**
     * @var ChannelSiteRoute[]
     */
    public ?array $routes;

    public function __construct(?stdClass $optionObject = null)
    {
        if (isset($optionObject->routes)) {
            foreach ($optionObject->routes as $route) {
                $this->routes[] = new ChannelSiteRoute($route);
            }

            unset($optionObject->routes);
        }

        parent::__construct($optionObject);
    }
}
