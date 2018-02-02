<?php

/*
 * This file is part of Laravel Twilio.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ABR\Twilio;

/**
 * This is the config class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class Config implements ConfigInterface
{
    /**
     * The account SID.
     *
     * @var string
     */
    protected $accountSID;

    /**
     * The authentication token.
     *
     * @var string
     */
    protected $authToken;

    /**
     * The purchased phone number.
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Create a new config instance.
     *
     * @param string $accountSID
     * @param string $authToken
     * @param string $phoneNumber
     *
     * @return void
     */
    public function __construct($accountSID, $authToken, $phoneNumber)
    {
        $this->setAccountSID($accountSID ?: getenv('ACCOUNT_SID'));
        $this->setAuthToken($authToken ?: getenv('AUTH_TOKEN'));
        $this->setPhoneNumber($phoneNumber ?: getenv('PHONE_NUMBER'));

        if (!$this->accountSID) {
            throw new RunTimeException('The Twilio API account SID is not defined!');
        }

        if (!$this->authToken) {
            throw new RunTimeException('The Twilio API auth token is not defined!');
        }
    }

    /**
     * Returns the account SID.
     *
     * @return string
     */
    public function getAccountSID()
    {
        return $this->accountSID;
    }

    /**
     * Sets the account SID.
     *
     * @return $this
     */
    public function setAccountSID(string $accountSID)
    {
        $this->accountSID = $accountSID;

        return $this;
    }

    /**
     * Returns the Authentication token.
     *
     * @return string
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * Sets the Authentication token.
     *
     * @return string
     */
    public function setAuthToken(string $authToken)
    {
        $this->authToken = $authToken;

        return $this;
    }

    /**
     * Returns the purchased phone number.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets the phone number.
     *
     * @return string
     */
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}
