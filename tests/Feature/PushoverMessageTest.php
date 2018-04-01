<?php

namespace Pushover\Tests\Feature;

use Carbon\Carbon;
use Pushover\PushoverLimitation;
use Pushover\PushoverMessage;
use Pushover\Responses\LimitsResponse;
use Pushover\Responses\MessageResponse;
use Pushover\Tests\PushoverTestCase;

class PushoverMessageTest extends PushoverTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->useFaker();
    }

    public function testResponseTypes()
    {
        $message = new PushoverMessage($this->faker->sentence);

        $messageResponse = $message->send();

        $this->assertInstanceOf(MessageResponse::class, $messageResponse);
        $this->assertTrue($messageResponse->success());
    }
}
