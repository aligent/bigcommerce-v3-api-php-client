<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments;

class StoredBankAccount extends StoredInstrument
{
    public string $masked_account_number;
    public string $issuer;
}
