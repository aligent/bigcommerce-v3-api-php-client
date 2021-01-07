<?php

namespace BigCommerce\ApiV3\Api\PriceLists;

use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResourceModels\PriceList\PriceListAssignment;
use BigCommerce\ApiV3\ResponseModels\PriceList\PriceListAssignmentsResponse;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class PriceListAssignmentsApi extends V3ApiBase
{
    public const FILTER_ID                = 'id';
    public const FILTER_PRICE_LIST_ID     = 'price_list_id';
    public const FILTER_CUSTOMER_GROUP_ID = 'customer_group_id';
    public const FILTER_CHANNEL_ID        = 'channel_id';

    private const PRICELISTS_ASSIGNMENTS_ENDPOINT = 'pricelists/assignments';

    public function getAll(array $filters = []): PriceListAssignmentsResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            self::PRICELISTS_ASSIGNMENTS_ENDPOINT,
            [
                RequestOptions::QUERY => $filters
            ]
        );

        return new PriceListAssignmentsResponse($response);
    }

    public function create(PriceListAssignment $assignment): ResponseInterface
    {
        return $this->getClient()->getRestClient()->post(
            self::PRICELISTS_ASSIGNMENTS_ENDPOINT,
            [
                RequestOptions::JSON => $assignment,
            ]
        );
    }

    public function deleteAll(array $filters): ResponseInterface
    {
        return $this->getClient()->getRestClient()->delete(
            self::PRICELISTS_ASSIGNMENTS_ENDPOINT,
            [
                RequestOptions::QUERY => $filters
            ]
        );
    }
}
