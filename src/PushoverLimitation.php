<?php

namespace Pushover;

use Pushover\Api\ApiService;
use Pushover\Responses\LimitsResponse;

class PushoverLimitation
{
    /**
     * @var ApiService
     */
    private $api;

    /**
     * Endpoint for retrieving limitations
     *
     * @var string
     */
    private $endpoint = '/1/apps/limits.json';

    /**
     * PushoverLimitation constructor.
     */
    public function __construct()
    {
        $this->api = new ApiService();
    }

    /**
     * @return LimitsResponse
     */
    public function get()
    {
        $response = $this->api->get($this->endpoint);

        return new LimitsResponse($response);
    }
}
