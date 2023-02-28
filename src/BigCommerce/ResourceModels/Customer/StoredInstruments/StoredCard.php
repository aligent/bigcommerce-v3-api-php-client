<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments;

class StoredCard extends StoredInstrument
{
    public string $brand;
    public string $expiry_month;
    public string $expiry_year;

    public string $issuer_identification_number;
    public string $last_4;
    public CardBillingAddress $billing_address;

    protected function beforeBuildObject(): void
    {
        $this->buildPropertyObject('billing_address', CardBillingAddress::class);
        parent::beforeBuildObject();
    }
}
