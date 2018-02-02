<?php

namespace ABR\Twilio\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the twilio facade.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class Twilio extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'twilio';
    }
}