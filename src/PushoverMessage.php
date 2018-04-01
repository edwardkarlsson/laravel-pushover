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
    private $priority;
    private $expire;
    private $retry;
    private $sound;

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
     * @param string $title
     *
     * @return $this
     */
    public function title(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function message(string $message)
    {
        $this->message = $message;

        return $this;
    }

    public function sound($sound)
    {
        $this->sound = $sound;

        return $this;
    }

    public function priority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    public function retry(int $interval)
    {
        $this->retry = $interval;

        return $this;
    }

    public function expire(int $duration)
    {
        $this->expire = $duration;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
            'sound' => $this->sound,
            'priority' => $this->priority,
            'retry' => $this->retry,
            'expire' => $this->expire,
        ];
    }

    /**
     * @param string|null $time
     *
     * @return PushoverResponse
     */
    public function send(string $time = null)
    {
        $endpoint = '/1/messages.json';

        $response = $this->api->call($endpoint, $this->toArray());

        return (new PushoverResponse())->make($response);
    }
}
