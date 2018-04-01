<?php

namespace Pushover\Tests\Unit\Responses;

use Carbon\Carbon;
use Pushover\Responses\LimitsResponse;
use Pushover\Tests\PushoverTestCase;

class LimitsResponseTest extends PushoverTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->useFaker();
    }

    public function testCanBuildLimitResponse()
    {
        $resetTime = Carbon::now()->addMonth()->startOfMonth();

        $payload = (object) [
            'status' => 1,
            'request' => '5d8941f7-30a6-36be-ae2d-604073294d37',
            'limit' => 7500,
            'remaining' => 6500,
            'reset' => $resetTime->timestamp
        ];

        $limitResponse = new LimitsResponse($payload);

        $this->assertTrue($limitResponse->success());
        $this->assertEquals($resetTime, $limitResponse->reset());
        $this->assertEquals('5d8941f7-30a6-36be-ae2d-604073294d37', $limitResponse->request());
        $this->assertEquals(7500, $limitResponse->limit());
        $this->assertEquals(6500, $limitResponse->remaining());
    }
}
