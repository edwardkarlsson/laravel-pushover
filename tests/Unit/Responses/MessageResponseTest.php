<?php

namespace Pushover\Tests\Unit\Responses;

use Carbon\Carbon;
use Pushover\PushoverReceipt;
use Pushover\Responses\LimitsResponse;
use Pushover\Responses\MessageResponse;
use Pushover\Tests\PushoverTestCase;

class MessageResponseTest extends PushoverTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->useFaker();
    }

    public function testCanBuildLimitResponse()
    {
        $payload = (object) [
            'status' => 1,
            'request' => '5d8941f7-30a6-36be-ae2d-604073294d37'
        ];

        $messageResponse = new MessageResponse($payload);

        $this->assertTrue($messageResponse->success());
        $this->assertEquals('5d8941f7-30a6-36be-ae2d-604073294d37', $messageResponse->request());
    }

    public function testCanBuildLimitResponseWithReceipt()
    {
        $payload = (object) [
            'status' => 1,
            'request' => '5d8941f7-30a6-36be-ae2d-604073294d37',
            'receipt' => 'r4c49nxfo3zs8qkemk35tabtztdvgh'
        ];

        $messageResponse = new MessageResponse($payload);

        $this->assertTrue($messageResponse->success());
        $this->assertEquals('5d8941f7-30a6-36be-ae2d-604073294d37', $messageResponse->request());
        $this->assertInstanceOf(PushoverReceipt::class, $messageResponse->receipt());
    }
}
