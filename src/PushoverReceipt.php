<?php

namespace Pushover;

use Pushover\Api\ApiService;

class PushoverReceipt
{
    private $status;
    private $request;
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

        return $this->api->get($endpoint);
    }
}
