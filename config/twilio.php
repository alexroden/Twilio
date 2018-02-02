<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Phone number
    |--------------------------------------------------------------------------
    |
    | This is the phone number that has been purchased through Twilio.
    |
    */
   'phone_number' => env('PHONE_NUMBER', null),

   /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | These details are provided by Twilio. You need to set these to login.
    |
    */
    'account_sid' => env('ACCOUNT_SID', null),
    'auth_token' => env('AUTH_TOKEN', null),
];