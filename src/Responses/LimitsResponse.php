<?php

namespace Pushover\Responses;

use Carbon\Carbon;

class LimitsResponse extends PushoverResponse
{
    /**
     * @var integer
     */
    protected $limit;

    /**
     * @var integer
     */
    protected $remaining;

    /**
     * @var integer
     */
    protected $reset;

    public function __construct($response)
    {
        parent::__construct($response);

        $this->limit = $response->limit;
        $this->remaining = $response->remaining;
        $this->reset = $response->reset;
    }

    /**
     * @return int
     */
    public function limit()
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function remaining()
    {
        return $this->remaining;
    }

    /**
     * @return Carbon
     */
    public function reset()
    {
        return Carbon::createFromTimestamp($this->reset);
    }
}
