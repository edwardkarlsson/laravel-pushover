<?php

namespace Pushover\Responses;

use Carbon\Carbon;

class ReceiptResponse extends PushoverResponse
{
    /**
     * @var integer
     */
    private $acknowledged;

    /**
     * @var integer
     */
    private $acknowledged_at;

    /**
     * @var string
     */
    private $acknowledged_by;

    /**
     * @var string
     */
    private $acknowledged_by_device;

    /**
     * @var integer
     */
    private $last_delivered_at;

    /**
     * @var integer
     */
    private $expired;

    /**
     * @var integer
     */
    private $expires_at;

    /**
     * @var integer
     */
    private $called_back;

    /**
     * @var integer
     */
    private $called_back_at;

    /**
     * ReceiptResponse constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response);

        $this->acknowledged = $response->acknowledged;
        $this->acknowledged_at = $response->acknowledged_at;
        $this->acknowledged_by = $response->acknowledged_by;
        $this->acknowledged_by_device = $response->acknowledged_by_device;
        $this->last_delivered_at = $response->last_delivered_at;
        $this->expired = $response->expired;
        $this->expires_at = $response->expires_at;
        $this->called_back = $response->called_back;
        $this->called_back_at = $response->called_back_at;
    }

    /**
     * @return bool
     */
    public function acknowledged()
    {
        return boolval($this->acknowledged);
    }

    /**
     * @return Carbon
     */
    public function acknowledgedAt()
    {
        return Carbon::createFromTimestamp($this->acknowledged_at);
    }

    /**
     * @return string
     */
    public function acknowledgedBy()
    {
        return $this->acknowledged_by;
    }

    /**
     * @return string
     */
    public function acknowledgedByDevice()
    {
        return $this->acknowledged_by_device;
    }

    /**
     * @return string
     */
    public function lastDeliveredAt()
    {
        return Carbon::createFromTimestamp($this->last_delivered_at);
    }

    /**
     * @return bool
     */
    public function expired()
    {
        return boolval($this->expired);
    }

    /**
     * @return Carbon
     */
    public function expiresAt()
    {
        return Carbon::createFromTimestamp($this->expires_at);
    }

    /**
     * @return bool
     */
    public function calledBack()
    {
        return boolval($this->called_back);
    }

    /**
     * @return Carbon
     */
    public function calledBackAt()
    {
        return Carbon::createFromTimestamp($this->called_back_at);
    }
}
