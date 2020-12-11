<?php

namespace BigCommerce\ApiV3\Api\PriceLists;

use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResourceModels\PriceList\PriceListRecord;
use BigCommerce\ApiV3\ResponseModels\PriceList\PriceListRecordResponse;
use BigCommerce\ApiV3\ResponseModels\PriceList\PriceListRecordsResponse;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class PriceListRecordsApi extends V3ApiBase
{
    private const PRICE_LIST_RECORDS_ENDPOINT = 'pricelists/%d/records';
    private const PRICE_LIST_RECORDS_BY_VARIANT_ENDPOINT = self::PRICE_LIST_RECORDS_ENDPOINT . '/%d';
    private const PRICE_LIST_RECORD_BY_CURRENCY_CODE_ENDPOINT = self::PRICE_LIST_RECORDS_BY_VARIANT_ENDPOINT . '/%s';

    private function recordsUrl()
    {
        return sprintf(self::PRICE_LIST_RECORDS_ENDPOINT, $this->getParentResourceId());
    }

    private function recordsByVariantUrl(int $variantId)
    {
        return sprintf(self::PRICE_LIST_RECORDS_BY_VARIANT_ENDPOINT, $this->getParentResourceId(), $variantId);
    }

    private function recordsByCurrencyCodeUrl(int $variantId, string $currencyCode)
    {
        return sprintf(
            self::PRICE_LIST_RECORD_BY_CURRENCY_CODE_ENDPOINT,
            $this->getParentResourceId(),
            $variantId,
            $currencyCode
        );
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): PriceListRecordsResponse
    {
        $response = $this->getClient()->getRestClient()->get($this->recordsUrl());

        return new PriceListRecordsResponse($response);
    }

    public function upsert(array $records): ResponseInterface
    {
        return $this->getClient()->getRestClient()->put(
            $this->recordsUrl(),
            [
                RequestOptions::JSON => $records,
            ]
        );
    }

    public function delete(array $ids): ResponseInterface
    {
        return $this->getClient()->getRestClient()->delete(
            $this->recordsUrl(),
            [
                RequestOptions::QUERY => [
                    'variant_id:in'  => implode(',', $ids),
                ]
            ]
        );
    }

    public function getAllByVariant(int $variantId): PriceListRecordsResponse
    {
        $response = $this->getClient()->getRestClient()->get($this->recordsByVariantUrl($variantId));

        return new PriceListRecordsResponse($response);
    }

    public function getByCurrencyCode(int $variantId, string $currencyCode): PriceListRecordResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            $this->recordsByCurrencyCodeUrl($variantId, $currencyCode)
        );

        return new PriceListRecordResponse($response);
    }

    public function setByCurrencyCode(int $variantId, string $currencyCode, PriceListRecord $record): ResponseInterface
    {
        return $this->getClient()->getRestClient()->put(
            $this->recordsByCurrencyCodeUrl($variantId, $currencyCode),
            [
                RequestOptions::JSON => $record,
            ]
        );
    }

    public function deleteByCurrencyCode(int $variantId, string $currencyCode): ResponseInterface
    {
        return $this->getClient()->getRestClient()->delete(
            $this->recordsByCurrencyCodeUrl($variantId, $currencyCode)
        );
    }
}
