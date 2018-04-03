<?php

namespace Pushover\Tests\Feature;

use Pushover\PushoverMessage;
use Pushover\Responses\ReceiptCancelRetriesResponse;
use Pushover\Responses\ReceiptResponse;
use Pushover\Tests\PushoverTestCase;

class PushoverReceiptTest extends PushoverTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->useFaker();
    }

    public function testRetrieveInfoAboutReceipt()
    {
        $message = new PushoverMessage($this->faker->sentence, $this->faker->word);

        $messageResponse = $message
            ->priority(2)
            ->retry(30)
            ->expire(120)
            ->send();

        $receiptResponse = $messageResponse->receipt()->retrieveInfo();

        $this->assertInstanceOf(ReceiptResponse::class, $receiptResponse);

    }

    public function testCancelRetries()
    {
        $message = new PushoverMessage($this->faker->sentence, $this->faker->word);

        $messageResponse = $message
            ->priority(2)
            ->retry(30)
            ->expire(120)
            ->send();

        $response = $messageResponse->receipt()->cancel();

        $this->assertInstanceOf(ReceiptCancelRetriesResponse::class, $response);
        $this->assertTrue($response->success());
    }
}
