# A Pushover.net API implementation for Laravel 5

A simple, yet very powerful, package that helps you get started with sending push notifications to your iOS or Android device through the [pushover.net](https://pushover.net/) service.

### Content
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [License](#license)

### Installation
To get the latest version of edwardkarlsson/laravel-pushover simply require it in your `composer.json` file.

```bash
composer require edwardkarlsson/laravel-pushover:dev-master
```

This package utilizes the autodiscovery features of Laravel so the installation will be a breeze.

### Configuration
The only configuration you need to do is to add the following to your `.env` file

```js
PUSHOVER_TOKEN=[enter your token here]
PUSHOVER_USER=[place this your user key here]
```

### Usage
#### Send message
To send a notification, simply add this to your code:
```php
$message = new PushoverMessage('My message');
$message->send();
```
You can optionally add a second parameter that will be attached as a title to the message
```php
$message = new PushoverMessage('My content', 'My title');
$message->send();
```
_Don't forget to import the class into your file: `use Pushover\PushoverMessage;`_

Advanced usage:
```php
$message = new PushoverMessage('My <b>message</b> content.', 'My title!');
        
$message->isHtml()
    ->sound('cashregister')
    ->url('http://example.com')
    ->urlTitle('ExampleSite')
    ->priority(1)
    ->device('my-main-device')
    ->send();
```

#### Get limits
To get your monthly limits, write the following:
```php
$limitation = new PushoverLimitation();

$limitsResponse = $limitation->get();

echo $limitsResponse->limit();
echo $limitsResponse->remaining();
echo $limitsResponse->reset();
```

#### Get receipt
When a message with priority `2` is sent, you can get a receipt to check on the acknowledgment of the message.

```php
$message = new PushoverMessage($this->faker->sentence, $this->faker->word);

$messageResponse = $message
    ->priority(2)
    ->retry(30)
    ->expire(120)
    ->send();

$receiptResponse = $messageResponse->receipt()->get();

// Available methods
$receiptResponse->acknowledged(); // returns boolean
$receiptResponse->acknowledgedAt(); // returns Carbon
$receiptResponse->acknowledgedBy(); // returns string
$receiptResponse->acknowledgedByDevice(); // returns string
$receiptResponse->lastDeliveredAt(); // returns Carbon
$receiptResponse->expired(); // returns boolean
$receiptResponse->expiresAt(); // returns Carbon
$receiptResponse->calledBack(); // returns boolean
$receiptResponse->calledBackAt(); // returns Carbon
```

#### License

Copyright (c) 2018 Edward Karlsson Licensed under the [MIT license](https://github.com/edwardkarlsson/laravel-pushover/blob/master/LICENSE).
