<?php

namespace ComicVine\Api\Connection;

use ComicVine\Exceptions\InvalidUrl;
use ComicVine\Exceptions\EmptyResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Extending Connection contract. Make connection
 * to ComicVine using cURL.
 *
 * Class CURLConnection
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class CURLConnection implements Connection
{
    /**
     * @var resource cURL resource
     */
    protected $curl;

    /**
     * @var mixed cURL response
     */
    protected $response;

    /**
     * @var string Default user agent.
     */
    protected $userAgent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)";

    /**
     * Make cURL instance and set default values.
     *
     * @param int    $timeout   Duration of connection.
     * @param string $userAgent User agent (default is Mozilla)
     *
     * @return $this
     */
    public function makeConnection($timeout = 30, $userAgent = "")
    {
        if ($userAgent === "") {
            $userAgent = $this->userAgent;
        }

        // Init cURL
        $this->curl = curl_init();
        // cURL settings
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($this->curl, CURLOPT_USERAGENT, $userAgent);

        return $this;
    }

    /**
     * Make an URL for connection.
     *
     * @param string $url Url address for request.
     *
     * @return $this
     * @throws \ComicVine\Exceptions\InvalidUrl
     */
    public function setConnection($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidUrl("Passed wrong URL");
        }

        // set cURL url address
        curl_setopt($this->curl, CURLOPT_URL, $url);
        // exec the request
        $this->response = curl_exec($this->curl);

        return $this;
    }

    /**
     * Get status code of cURL request.
     *
     * @return mixed cURL status code
     */
    public function getHttpStatus()
    {
        return curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
    }

    /**
     * Return response from cURL request.
     *
     * @return mixed Response of request
     * @throws \ComicVine\Exceptions\EmptyResponse
     */
    public function getResult()
    {
        if (empty($this->response) === true) {
            throw new EmptyResponse("Request has not been executed.");
        }

        return $this->response;
    }
}