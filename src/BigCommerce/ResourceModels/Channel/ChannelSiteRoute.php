<?php

namespace BigCommerce\ApiV3\ResourceModels\Channel;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ChannelSiteRoute extends ResourceModel
{
    public int $id;
    public string $type;

    /**
     * For a given type, which resources should match this route? e.g For a route with the type: “product” and matching:
     * “5” this route would be used for the product with the ID of 5.
     *
     * Depending on the type of resource, this may be an ID (matching a specific item), or a “*” wildcard matching all
     * items of that type.
     *
     */
    public string $matching;

    /**
     * The route template that will be used to generate the URL for the requested resource.
     *
     * Supports several tokens:
     *
     * {id} The ID of the requested item
     * {slug} The slug for the requested item (if available). Note: the slug value may contain / slash
     * {language} The language string that the client is using
     *
     */
    public string $route;
}
