<?php

namespace Pushover\Tests\Unit;

use Pushover\PushoverMessage;
use Pushover\Tests\PushoverTestCase;

class PushoverServiceTest extends PushoverTestCase
{
    public function testBasicTest()
    {
        $message = new PushoverMessage('Testing', 'This is the first message!');

        dd($message->send());
    }
}
