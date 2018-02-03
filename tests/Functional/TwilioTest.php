<?php

namespace ABR\Tests\Twilio\Funcational;

use ABR\Tests\Twilio\FunctionalTestCase;

/**
 * This is the twilio test class.
 *
 * @author Alex Broom-Roden <br._alex@hotmail.co.uk>
 */
class TwilioTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function it_can_change_account_sid()
    {
        $this->twilio->getConfig()->setAccountSID('newAccountSID');

        $this->assertSame('newAccountSID', $this->twilio->getConfig()->getAccountSID());
    }

    /**
     * @test
     */
    public function it_can_change_auth_token()
    {
        $this->twilio->getConfig()->setAuthToken('newAuthToken');

        $this->assertSame('newAuthToken', $this->twilio->getConfig()->getAuthToken());
    }

    /**
     * @test
     */
    public function it_can_change_phone_number()
    {
        $this->twilio->getConfig()->setPhoneNumber('newPhoneNumber');

        $this->assertSame('newPhoneNumber', $this->twilio->getConfig()->getPhoneNumber());
    }
}