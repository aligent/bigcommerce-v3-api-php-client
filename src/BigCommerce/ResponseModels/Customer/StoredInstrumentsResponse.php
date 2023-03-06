<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments\StoredBankAccount;
use BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments\StoredCard;
use BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments\StoredInstrument;
use BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments\StoredInstrumentFactory;
use BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments\StoredPaypalAccount;
use Psr\Http\Message\ResponseInterface;

class StoredInstrumentsResponse
{
    /**
     * @var StoredInstrument[]
     */
    private array $storedInstruments;
    public function __construct(ResponseInterface $response)
    {
        $rawData = json_decode($response->getBody());
        $this->addInstruments($rawData);
    }

    private function addInstruments(array $rawData)
    {
        $instrumentFactory = new StoredInstrumentFactory();
        $this->storedInstruments = array_map(fn($instrument) => $instrumentFactory->build($instrument), $rawData);
    }

    /**
     * @return StoredCard[]|StoredBankAccount[]|StoredPaypalAccount[]
     */
    public function getStoredInstruments(): array
    {
        return $this->storedInstruments;
    }
}
