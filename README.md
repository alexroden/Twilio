# Laravel-Twilio
Twilio API wrapper for Laravel 5.

## Getting started
1. Create an account through https://www.twilio.com/
2. Purchase a phone number via Twilio.
3. Set the `ACCOUNT_SID`, `AUTH_TOKEN` and `PHONE_NUMBER` in the config.

### Instantiating 
```php
<?php

require 'vendor/autoload.php';

use ABR\Twilio\Twilio;

// Create a new instance of the Twilio class. 
$twilio = new Twilio();

```

### Sending a message
```php
// Pass parameters into send method.
$params = [
    'phone_number' => 07000000000,
    'message'      => 'Foo bar',
];

$twilio->send($params);
```
