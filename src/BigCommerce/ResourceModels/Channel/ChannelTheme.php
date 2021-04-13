<?php

namespace BigCommerce\ApiV3\ResourceModels\Channel;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ChannelTheme extends ResourceModel
{
    public string $active_theme_uuid;
    public string $active_theme_configuration_uuid;
    public string $active_theme_version_uuid;
    public string $saved_theme_configuration_uuid;
    public string $active_theme_display_version;
    public string $active_theme_documentation_url;
    public bool $active_theme_is_private;
    public bool $active_theme_is_purchased;
    public object $active_theme_partner;
    public bool $active_theme_style_editable;
    public string $active_theme_name;
    public string $active_theme_type;
    public ?object $active_theme_upgrade;
    public bool $active_theme_update_available;
    public object $active_theme_screenshot;
    public int $active_theme_variation_count;
    public string $active_theme_variation_name;
}
