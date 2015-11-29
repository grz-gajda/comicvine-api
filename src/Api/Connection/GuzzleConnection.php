<?php

namespace ComicVine\Api\Connection;

use GuzzleHttp\Client;
use ComicVine\Exceptions\InvalidUrl;
use ComicVine\Exceptions\EmptyResponse;
use Psr\Http\Message\ResponseInterface;

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
     * @throws \ComicVine\Exceptions\InvalidUrl
     */
    public function setConnection($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidUrl("Passed wrong URL");
        }

        $this->response = $this->guzzle->request('GET', $url);

        return $this;
    }

    /**
     * Return response from request.
     *
     * @return mixed
     * @throws \ComicVine\Exceptions\EmptyResponse
     */
    public function getResult()
    {
        $this->isNotEmptyResponse();

        return $this->response->getBody();
    }

    /**
     * Return status code of request.
     *
     * @return mixed
     * @throws \ComicVine\Exceptions\EmptyResponse
     */
    public function getHttpStatus()
    {
        $this->isNotEmptyResponse();

        return $this->response->getStatusCode();
    }

    /**
     * Check is response attribute is not empty.
     *
     * @throws \ComicVine\Exceptions\EmptyResponse
     */
    protected function isNotEmptyResponse()
    {
        if (empty($this->response) === true) {
            throw new EmptyResponse("Request has not been executed.");
        }
    }

}