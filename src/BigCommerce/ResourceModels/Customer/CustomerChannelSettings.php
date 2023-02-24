<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerSettings\CustomerGroupSettings;
use BigCommerce\ApiV3\ResourceModels\Customer\CustomerSettings\PrivacySettings;
use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerChannelSettings extends ResourceModel
{
    public PrivacySettings $privacy_settings;
    public CustomerGroupSettings $customer_group_settings;

    /**
     * Determines if a channel allows global customer to login
     * Determines if customers created on this channel will get global access/login
     */
    public ?bool $allow_global_logins;

    protected function beforeBuildObject(): void
    {
        $this->buildPropertyObject('privacy_settings', PrivacySettings::class);
        $this->buildPropertyObject('customer_group_settings', CustomerGroupSettings::class);

        parent::beforeBuildObject();
    }
}
