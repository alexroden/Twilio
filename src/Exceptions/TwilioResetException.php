<?php

/*
 * This file is part of Laravel Twilio.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ABR\Twilio\Exceptions;

use Exception;

/**
 * This is the twilio reset exception class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class TwilioResetException extends TwilioException implements TwilioExceptionInterface
{
    public function __construct($message, $code, Exception $previous = null)
    {
        parent::__construct('The twilio rest returned an unporcessable response.', $code, $previous);
    }
}
