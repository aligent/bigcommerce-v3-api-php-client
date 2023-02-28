<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments;

class StoredInstrumentFactory
{
    private array $map = [
        StoredInstrument::TYPE__BANK_ACCOUNT => StoredBankAccount::class,
        StoredInstrument::TYPE__CARD         => StoredCard::class,
        StoredInstrument::TYPE__PAYPAL       => StoredPaypalAccount::class,
    ];

    public function build(object $storedInstrumentData): StoredInstrument
    {
        if (array_key_exists($storedInstrumentData->type, $this->map)) {
            return new $this->map[$storedInstrumentData->type]($storedInstrumentData);
        }

        throw new \UnexpectedValueException("Unrecognised stored instrument '{$storedInstrumentData->type}'");
    }
}
