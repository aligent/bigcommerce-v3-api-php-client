<?php

namespace BigCommerce\ApiV3\ResourceModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Transaction extends ResourceModel
{
    public int $id;
    public int $order_id;
    public string $event;
    public string $method;
    public int $amount;
    public string $currency;
    public string $gateway;
    public string $gateway_transaction_id;
    public string $status;
    public bool $test;
    public bool $fraud_review;
    public ?int $reference_transaction_id;
    public string $date_created;
    public object $avs_result;
    public object $cvv_result;
    public object $credit_card;
    public object $gift_certificate;
    public object $store_credit;
    public object $offline;
    public object $custom;
    public string $payment_instrument_token;
    public string $payment_method_id;
}
