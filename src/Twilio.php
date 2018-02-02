<?php

namespace ABR\Twilio;

use ABR\Twilio\Events\RequestSent;
use ABR\Twilio\Events\ResponseReceived;
use ABR\Twilio\Exceptions\TwilioResetException;
use Closure;
use Illuminate\Contracts\Events\Dispatcher;
use Twilio\Exceptions\RestException;
use Twilio\Rest\Client as TwilioClient;

/**
 * This is the twilio class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class Twilio
{
    /**
     * All of the requests sent to Fusion.
     *
     * @var array
     */
    protected $requestLog = [];

    /**
     * All of the responses sent from Fusion.
     *
     * @var array
     */
    protected $responseLog = [];

    /**
     * Indicates whether requests are being logged.
     *
     * @var bool
     */
    protected $loggingRequests = false;

    /**
     * Indicates whether responses are being logged.
     *
     * @var bool
     */
    protected $loggingResponses = false;

    /**
     * The config.
     * 
     * @var \ABR\Twilio\ConfigInterface
     */
    protected $config;

    /**
     * Create a new instance.
     * 
     * @param string|null $accountSID
     * @param string|null $authToken
     *
     * @return void
     */
    public function __construct(string $accountSID = null, string $authToken = null)
    {
        $this->accountSID = new Config($accountSID, $authToken);
    }

    /**
     * Create a new Twilio API instance.
     *
     * @param string $accountSID
     * @param string $authToken
     *
     * @return \ABR\Twilio\Twilio
     */
    public static function make(string $accountSID = null, string $authToken = null)
    {
        return new static($accountSID, $authToken);
    }

    /**
     * Get the event dispatcher instance.
     * 
     * @return \Illuminate\Contracts\Events\Dispatcher
     */
    public function getEventDispatcher()
    {
        return app(Dispatcher::class);
    }

    /**
     * Get the request log.
     *
     * @return array
     */
    public function getRequestLog()
    {
        return $this->requestLog;
    }

    /**
     * Clear the request log.
     *
     * @return void
     */
    public function flushRequestLog()
    {
        $this->requestLog = [];
    }

    /**
     * Get the response log.
     *
     * @return array
     */
    public function getResponseLog()
    {
        return $this->responseLog;
    }

    /**
     * Clear the response log.
     *
     * @return void
     */
    public function flushResponseLog()
    {
        $this->responseLog = [];
    }

    /**
     * Enable the request log.
     *
     * @return void
     */
    public function enableRequestLog()
    {
        $this->loggingRequests = true;
    }

    /**
     * Disable the request log.
     *
     * @return void
     */
    public function disableRequestLog()
    {
        $this->loggingRequests = false;
    }

    /**
     * Determine whether we're logging requests.
     *
     * @return bool
     */
    public function loggingRequests()
    {
        return $this->loggingRequests;
    }

    /**
     * Enable the response log.
     *
     * @return void
     */
    public function enableResponseLog()
    {
        $this->loggingResponses = true;
    }

    /**
     * Disable the response log.
     *
     * @return void
     */
    public function disableResponseLog()
    {
        $this->loggingResponses = false;
    }

    /**
     * Determine whether we're logging responses.
     *
     * @return bool
     */
    public function loggingResponses()
    {
        return $this->loggingRequests;
    }

    /**
     * Register a twilio listener.
     * 
     * @param \Closure $callback
     * 
     * @return void
     */
    public function listen(Closure $callback)
    {
        if ($this->getEventDispatcher()) {
            $this->getEventDispatcher()->listen(RequestSent::class, $callback);
            $this->getEventDispatcher()->listen(ResponseReceived::class, $callback);
        }
    }

    /**
     * Log a request in the request log.
     *
     * @param string     $method
     * @param string     $request
     * @param float|null $time
     *
     * @return void
     */
    public function logRequest($method, $request, $time = null)
    {
        if ($this->getEventDispatcher()) {
            $this->getEventDispatcher()->fire(new RequestSent($method, $request, $time));
        }
        if ($this->loggingRequests) {
            $this->requestLog[] = compact('method', 'request', 'time');
        }
    }

    /**
     * Log a response in the response log.
     *
     * @param string     $response
     * @param float|null $time
     *
     * @return void
     */
    public function logResponse($response, $time = null)
    {
        if ($this->getEventDispatcher()) {
            $this->getEventDispatcher()->fire(new ResponseReceived($response, $time));
        }
        if ($this->loggingResponses) {
            $this->responseLog[] = compact('response', 'time');
        }
    }

    /**
     * Get the config respository instance.
     * 
     * @return \ABR\Twilio\ConfigInterface
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Send a request.
     * 
     * @return bool
     */
    public function send(array $data = [])
    {
        $phoneNumber = array_get($data, 'phone_number');
        $message = array_get($data, 'message');

        try {
            $client = $this->getClient();
        } catch (RestException $e) {
            throw new TwilioResetException($e->getMessage(), $e->getCode(), $e);
        }

        return $client->account->messages->create($phoneNumber, [
           'from' => $this->config->getPhoneNumber(), 
           'body' => $message,
         ]);
    }

    /**
     * Return a REST client instance.
     * 
     * @return \Twilio\Rest\Client
     */
    public function getClient()
    {
        return new TwilioClient(
            $this->config->getAccountSID(),
            $this->config->getAuthToken()
        );
    }
}
