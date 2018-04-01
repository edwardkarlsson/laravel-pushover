<?php

namespace Pushover;

use Pushover\Api\ApiService;

class PushoverResponse
{
    private $status;
    private $request;

    /**
     * @var PushoverReceipt
     */
    private $receipt;
    private $api;

    public function __construct()
    {
        $this->api = new ApiService();
    }

    public function make($response)
    {
        $this->status = $response->status;
        $this->request = $response->request;

        if (property_exists($response, 'receipt')) {
            $this->receipt = new PushoverReceipt($response->receipt);
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function success()
    {
        return boolval($this->status);
    }

    public function receipt()
    {
        return $this->receipt;
    }

    public function get()
    {
        sleep(2);
        $endpoint = '/1/receipts/' . $this->request . '.json';

        return $this->api->get($endpoint);
    }
}
