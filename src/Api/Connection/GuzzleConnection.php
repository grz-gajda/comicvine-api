<?php

namespace ComicVine\Api\Connection;

use GuzzleHttp\Client;

/**
 * Extending Connection contract. Make connection
 * to ComicVine using GuzzleHttp package.
 *
 * Class GuzzleConnection
 *
 * @package ComicVine\Api\Connection
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class GuzzleConnection implements Connection
{

    /**
     * GuzzleHttp Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * Promise for GET request.
     *
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * Make instance for new Guzzle Client.
     *
     * @param int    $timeout   Timeout for request.
     * @param string $userAgent Header for user agent.
     *
     * @return $this
     */
    public function makeConnection($timeout = 30, $userAgent = "")
    {
        $this->guzzle = new Client([
            'timeout' => $timeout,
        ]);

        return $this;
    }

    /**
     * Make GET request.
     *
     * @param string $url Request URL.
     *
     * @return $this
     */
    public function setConnection($url)
    {
        $this->response = $this->guzzle->request('GET', $url);

        return $this;
    }

    /**
     * Return response from request.
     *
     * @return mixed
     */
    public function getResult()
    {
        return $this->response->getBody();
    }

    /**
     * Return status code of request.
     *
     * @return mixed
     */
    public function getHttpStatus()
    {
        return $this->response->getStatusCode();
    }

}