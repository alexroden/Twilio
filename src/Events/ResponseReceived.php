<?php

/*
 * This file is part of Laravel Twilio.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ABR\Twilio\Events;

/**
 * This is the response received class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotemail.co.uk>
 */
class ResponseReceived
{
    /**
     * The response that was  sent.
     *
     * @var string
     */
    public $response;

    /**
     * The number of milliseconds it took to execute the response.
     *
     * @var float
     */
    public $time;

    /**
     * Creat a new event instance.
     *
     * @param string $response
     * @param float  $time
     *
     * @return void
     */
    public function __construct($response, $time)
    {
        $this->response = $response;
        $this->time = $time;
    }
}
