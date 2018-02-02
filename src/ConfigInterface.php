<?php

namespace ABR\Twilio;

/**
 * This is the config interface.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
interface ConfigInterface
{
    /**
     * Returns the account SID.
     *
     * @return string
     */
    public function getAccountSID();

    /**
     * Sets the account SID.
     *
     * @return $this
     */
    public function setAccountSID(string $accountSID);

    /**
     * Returns the Authentication token.
     *
     * @return string
     */
    public function getAuthToken();

    /**
     * Sets the Authentication token.
     *
     * @return $this
     */
    public function setAuthToken(string $authToken);

    /**
     * Returns the purchased phone number.
     *
     * @return string
     */
    public function getPhoneNumber();

    /**
     * Sets the phone number.
     *
     * @return string
     */
    public function setPhoneNumber(string $phoneNumber);
}