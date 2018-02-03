<?php

namespace ABR\Tests\Twilio\Facades;

use ABR\Tests\Twilio\AbstractTestCase;
use GrahamCampbell\TestBenchCore\FacadeTrait;

/**
 * This is the twilio test class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class TwilioTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'twilio';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return 'ABR\Twilio\Facades\Twilio';
    }

    /**
     * Get the facade route.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return 'ABR\Twilio\Twilio';
    }
}