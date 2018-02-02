<?php

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