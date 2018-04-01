<?php

namespace Pushover\Responses;

abstract class PushoverResponse
{
    /**
     * @var integer
     */
    protected $status;

    /**
     * @var string
     */
    protected $request;

    /**
     * PushoverResponse constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        $this->status = $response->status;
        $this->request = $response->request;
    }

    /**
     * @return bool
     */
    public function success()
    {
        return boolval($this->status);
    }

    /**
     * @return string
     */
    public function request()
    {
        return $this->request;
    }
}
