<?php

namespace BitPay;

abstract class Request
{
    /**
     * Bitpay API version used
     *
     * @var string
     */
    const API_VERSION = "0.3.1";

	const HOST_TEST = "https://test.bitpay.com/api/";
	const HOST_LIVE = "https://bitpay.com/api/";

    /**
     * Amount of time (in seconds) to wait for the BitPay server to respond
     * before timing out. Default 30 seconds.
     *
     * @var int
     */
    protected $timeout = 30;

    /**
     * Response object used by request object
     *
     * @var object
     */
    protected $response;

    /**
     * Host to make request to
     *
     * @var string
     */
    protected $host;

    /**
     * Create a new instance
     *
     */
    public function __construct($test)
    {
        $this->setHost($test);
    }

    /**
     * Set the host that the request will be sent too
     *
     */
    public function setHost($test)
    {
        if($test) {
	        $this->host = self::HOST_TEST;
        } else {
	        $this->host = self::HOST_LIVE;
        }
    }

    /**
     * Set the timeout for the request
     *
     * @param int $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = (int) $timeout;
    }

    /**
     * Get the response object associated with the request
     *
     * @return object
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * GET request method to be implemented by classes that extend the Request class
     *
     * @abstract
     * @return mixed
     */
    abstract public function get($url, $apiKey = null);

    /**
     * POST request method to be implemented by classes that extend the Request class
     *
     * @abstract
     * @return mixed
     */
    abstract public function post($url, $data = null, $apiKey = null);
}
