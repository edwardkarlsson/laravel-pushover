# A Pushover.net API implementation for Laravel 5

A simple, yet very powerful, package that helps you get started with sending push notifications to your iOS or Android device through the [pushover.net](https://pushover.net/) service.

#### Content
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [License](#license)

#### Installation
To get the latest version of edwardkarlsson/laravel-pushover simply require it in your `composer.json` file.

```bash
composer require edwardkarlsson/laravel-pushover:dev-master
```

This package utilizes the autodiscovery features of Laravel so the installation will be a breeze.

#### Configuration
The only configuration you need to do is to add the following to your `.env` file

```js
PUSHOVER_TOKEN=[enter your token here]
PUSHOVER_USER=[place this your user key here]
```

#### Usage
To send a notification, simply add this to your code:
```php
$message = new PushoverMessage('My message');
$message->send();
```
