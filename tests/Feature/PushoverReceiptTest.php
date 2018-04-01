<?php

namespace Pushover\Tests\Feature;

use Carbon\Carbon;
use Pushover\PushoverLimitation;
use Pushover\PushoverMessage;
use Pushover\PushoverReceipt;
use Pushover\Responses\LimitsResponse;
use Pushover\Responses\MessageResponse;
use Pushover\Responses\ReceiptResponse;
use Pushover\Tests\PushoverTestCase;

class PushoverReceiptTest extends PushoverTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->useFaker();
    }

    public function testResponseTypes()
    {
        $message = new PushoverMessage($this->faker->sentence, $this->faker->word);

        $messageResponse = $message
            ->priority(2)
            ->retry(30)
            ->expire(120)
            ->send();

        $this->assertInstanceOf(PushoverReceipt::class, $messageResponse->receipt());

        $receiptResponse = $messageResponse->receipt()->get();

        $this->assertInstanceOf(ReceiptResponse::class, $receiptResponse);
    }
}
