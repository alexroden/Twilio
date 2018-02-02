<?php

/*
 * This file is part of Laravel Twilio.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
    'auth_token'  => env('AUTH_TOKEN', null),
];
