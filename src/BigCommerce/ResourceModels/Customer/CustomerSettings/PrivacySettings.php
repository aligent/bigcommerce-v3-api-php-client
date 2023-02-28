<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer\CustomerSettings;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class PrivacySettings extends ResourceModel
{
    /**
     * Determines if a customer requires consent for tracking privacy.
     */
    public ?bool $ask_shopper_for_tracking_consent;

    /**
     * The URL for a website's privacy policy.
     * Example: https://bigcommmerce.com/policy
     */
    public ?string $policy_url;

    public ?bool $ask_shopper_for_tracking_consent_on_checkout;
}
