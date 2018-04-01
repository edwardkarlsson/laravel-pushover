<?php

namespace Pushover;

use Illuminate\Contracts\Support\Arrayable;
use Pushover\Api\ApiService;
use Pushover\Responses\MessageResponse;

class PushoverMessage implements Arrayable
{
    protected $hidden = ['api'];

    /**
     * Endpoint for retrieving limitations
     *
     * @var string
     */
    private $endpoint = '/1/messages.json';


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
    private $callback;
    private $device;
    private $url;
    private $url_title;

    /**
     * PushoverMessage constructor.
     *
     * @param string $message
     * @param string $title
     */
    public function __construct(string $message, string $title = null)
    {
        $this->message = $message;
        $this->title = $title;
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

    public function sound($sound)
    {
        $this->sound = $sound;

        return $this;
    }

    public function url(string $url)
    {
        $this->url = $url;

        return $this;
    }

    public function urlTitle(string $urlTitle)
    {
        $this->url_title = $urlTitle;

        return $this;
    }

    public function device(string $device)
    {
        $this->device = $device;

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

    public function callback(string $callbackUrl)
    {
        $this->callback = $callbackUrl;

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
            'url' => $this->url,
            'url_title' => $this->url_title,
            'sound' => $this->sound,
            'priority' => $this->priority,
            'device' => $this->device,
            'retry' => $this->retry,
            'expire' => $this->expire,
            'callback' => $this->callback,
        ];
    }

    /**
     * @param string|null $time
     *
     * @return MessageResponse
     */
    public function send(string $time = null)
    {
        $response = $this->api->post($this->endpoint, $this->toArray());

        return new MessageResponse($response);
    }
}
