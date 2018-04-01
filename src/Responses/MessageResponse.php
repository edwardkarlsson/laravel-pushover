<?php

namespace Pushover\Responses;

use Pushover\Api\ApiService;
use Pushover\PushoverReceipt;

class MessageResponse extends PushoverResponse
{
    /**
     * @var null|PushoverReceipt
     */
    private $receipt;

    /**
     * @var ApiService
     */
    private $api;

    public function __construct($response)
    {
        parent::__construct($response);

        $this->api = new ApiService();

        $this->handleReceipt($response);
    }

    /**
     * @return null|PushoverReceipt
     */
    public function receipt()
    {
        return $this->receipt;
    }

    /**
     * @param $response
     */
    private function handleReceipt($response): void
    {
        if (property_exists($response, 'receipt')) {
            $this->receipt = new PushoverReceipt($response->receipt);
        }
    }
}
