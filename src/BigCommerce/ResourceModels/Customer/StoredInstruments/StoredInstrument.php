<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class StoredInstrument extends ResourceModel
{
    public const TYPE__CARD = 'stored_card';
    public const TYPE__PAYPAL = 'stored_paypal_account';
    public const TYPE__BANK_ACCOUNT = 'stored_bank_account';

    public string $type;
    public string $token;
    public bool $is_default;
}
