<?php

namespace Pushover;

use Pushover\Api\ApiService;

class PushoverMessage
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $message;

    /**
     * @var ApiService
     */
    private $api;

    /**
     * PushoverMessage constructor.
     *
     * @param string $title
     * @param string $message
     */
    public function __construct(string $title = null, string $message = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->api = new ApiService();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
        ];
    }

    public function send(string $time = null)
    {
        $endpoint = '/1/messages.json';
        return $this->api->call($endpoint, $this->toArray());
    }
}
