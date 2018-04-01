<?php

namespace Pushover\Tests\Unit;

use Carbon\Carbon;
use Pushover\PushoverMessage;
use Pushover\PushoverReceipt;
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

    public function testBasicReceipt()
    {
        $message = new PushoverMessage('MessageBody');

        $message
            ->sound('cashregister')
            ->url('http://example.com')
            ->urlTitle('ExampleSite')
            ->priority(1)
            ->device('main-device');

        $this->assertArraySubset([
                'sound' => 'cashregister',
                'url' => 'http://example.com',
                'url_title' => 'ExampleSite',
                'priority' => 1,
                'device' => 'main-device',
            ],
            $message->toArray());
    }
}
