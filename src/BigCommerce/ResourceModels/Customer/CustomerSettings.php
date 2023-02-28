<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerSettings\CustomerGroupSettings;
use BigCommerce\ApiV3\ResourceModels\Customer\CustomerSettings\PrivacySettings;
use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerSettings extends ResourceModel
{
    public PrivacySettings $privacy_settings;
    public CustomerGroupSettings $customer_group_settings;

    protected function beforeBuildObject(): void
    {
        $this->buildPropertyObject('privacy_settings', PrivacySettings::class);
        $this->buildPropertyObject('customer_group_settings', CustomerGroupSettings::class);

        parent::beforeBuildObject();
    }
}
