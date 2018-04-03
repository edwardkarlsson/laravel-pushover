<?php

namespace Pushover\Tests\Feature;

use Carbon\Carbon;
use Pushover\PushoverLimitation;
use Pushover\Responses\LimitsResponse;
use Pushover\Tests\PushoverTestCase;

class PushoverLimitationTest extends PushoverTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->useFaker();
    }

    public function testLimitations()
    {
        $limitation = new PushoverLimitation();

        $limitsResponse = $limitation->get();

        $this->assertInstanceOf(LimitsResponse::class, $limitsResponse);
        $this->assertInternalType('integer', $limitsResponse->limit());
        $this->assertInternalType('integer', $limitsResponse->remaining());
        $this->assertInstanceOf(Carbon::class, $limitsResponse->reset());
    }
}
