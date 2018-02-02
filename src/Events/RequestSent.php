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
 * This is the request sent class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotemail.co.uk>
 */
class RequestSent
{
    /**
     * The API method that sent the request.
     *
     * @var string
     */
    public $method;

    /**
     * The request that was  sent.
     *
     * @var string
     */
    public $request;

    /**
     * The number of milliseconds it took to execute the request.
     *
     * @var float
     */
    public $time;

    /**
     * Creat a new event instance.
     *
     * @param string $method
     * @param string $request
     * @param float  $time
     *
     * @return void
     */
    public function __construct($method, $request, $time)
    {
        $this->method = $method;
        $this->request = $request;
        $this->time = $time;
    }
}
