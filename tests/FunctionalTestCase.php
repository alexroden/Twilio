<?php

namespace ABR\Tests\Twilio;

use ABR\Twilio\Twilio;
use PHPUnit_Framework_TestCase;

/**
 * This is the functional test class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class FunctionalTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * The Twilio API instance.
     *
     * @var \ABR\Twilio\Twilio
     */
    protected $twilio;

    /**
     * Setup an instance of the functional test case.
     *
     * @return void
     */
    public function setUp()
    {
        $this->twilio = new Twilio();
    }

    /**
     * @test
     */
    public function it_can_create_a_new_instance_using_the_make_method()
    {
        $twilio = Twilio::make('accountSID', 'authToken', '0712345678');

        $this->assertEquals(getenv('ACCOUNT_SID'), $twilio->getConfig()->getAccountSID());

        $this->assertEquals(getenv('AUTH_TOKEN'), $twilio->getConfig()->getAuthToken());

        $this->assertEquals(getenv('PHONE_NUMBER'), $twilio->getConfig()->getPhoneNumber());
    }

    /**
     * @test
     */
    public function it_can_create_a_new_instance_using_environment_variables()
    {
        $twilio = new Twilio();

        $this->assertEquals(getenv('ACCOUNT_SID'), $twilio->getConfig()->getAccountSID());

        $this->assertEquals(getenv('AUTH_TOKEN'), $twilio->getConfig()->getAuthToken());

        $this->assertEquals(getenv('PHONE_NUMBER'), $twilio->getConfig()->getPhoneNumber());
    }
}