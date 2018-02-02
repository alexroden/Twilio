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
 * This is the twilio exception class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class TwilioException extends Exception implements TwilioExceptionInterface
{
    /**
     * Create a new twilio exception instance.
     *
     * @param string         $message
     * @param [int           $code
     * @param Exception|null $previous
     *
     * @return void
     */
    public function __construct($message, $code, Exception $previous = null)
    {
        parent::__construct(sprintf('[%d] %s', $code, $message), $code, $previous);
    }
}
