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
