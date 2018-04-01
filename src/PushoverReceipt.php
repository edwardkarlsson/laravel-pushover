<?php

namespace Pushover;

use Pushover\Api\ApiService;
use Pushover\Responses\LimitsResponse;
use Pushover\Responses\ReceiptResponse;

class PushoverReceipt
{
    private $api;
    private $receiptToken;

    public function __construct(string $receiptToken)
    {
        $this->receiptToken = $receiptToken;
        $this->api = new ApiService();
    }

    public function get()
    {
        sleep(2);
        $endpoint = '/1/receipts/' . $this->receiptToken . '.json';

        $response = $this->api->get($endpoint);

        return new ReceiptResponse($response);
    }

    public function cancel()
    {
        sleep(2);
        $endpoint = '/1/receipts/' . $this->receiptToken . '/cancel.json';

        return $this->api->post($endpoint);
    }
}
