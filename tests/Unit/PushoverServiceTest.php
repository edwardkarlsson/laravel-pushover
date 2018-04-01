<?php

namespace Pushover\Tests\Unit;

use Pushover\PushoverMessage;
use Pushover\Tests\PushoverTestCase;

class PushoverServiceTest extends PushoverTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->useFaker();
    }

    public function testBasicTest()
    {
        $message = new PushoverMessage($this->faker->word, $this->faker->sentence);

        $message
            ->sound('persistent')
            ->priority(2)
            ->retry(30)
            ->expire(120);

        $response = $message->send();

        dd($response->receipt()->get());
    }
}
