<?php

namespace Pushover;

use Pushover\Api\ApiService;
use Pushover\Responses\ReceiptCancelRetriesResponse;
use Pushover\Responses\ReceiptResponse;

class PushoverReceipt
{
    /**
     * @var ApiService
     */
    private $api;

    /**
     * @var string
     */
    private $receiptToken;

    /**
     * PushoverReceipt constructor.
     *
     * @param string $receiptToken
     */
    public function __construct(string $receiptToken)
    {
        $this->receiptToken = $receiptToken;
        $this->api = new ApiService();
    }

    /**
     * Retrieves the message receipt info.
     *
     * @return ReceiptResponse
     */
    public function retrieveInfo()
    {
        $endpoint = '/1/receipts/' . $this->receiptToken . '.json';
        $response = $this->api->get($endpoint);

        return new ReceiptResponse($response);
    }

    /**
     * @return ReceiptCancelRetriesResponse
     */
    public function cancel()
    {
        $endpoint = '/1/receipts/' . $this->receiptToken . '/cancel.json';

        return new ReceiptCancelRetriesResponse($this->api->post($endpoint));
    }
}
