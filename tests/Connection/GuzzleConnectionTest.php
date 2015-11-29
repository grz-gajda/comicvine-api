<?php

use ComicVine\Api\Connection\GuzzleConnection;

/**
 * Class GuzzleConnectionTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class GuzzleConnectionTest extends TestCase
{

    /**
     * GuzzleConnection is proper instance of Connection.
     *
     * @test
     */
    public function newInstance()
    {
        $guzzle = new GuzzleConnection();

        $this->assertInstanceOf('\ComicVine\Api\Connection\Connection', $guzzle);
        $this->assertInstanceOf('\ComicVine\Api\Connection\GuzzleConnection', $guzzle);

        $this->assertMethodExist($guzzle, 'makeConnection');
        $this->assertMethodExist($guzzle, 'setConnection');
        $this->assertMethodExist($guzzle, 'getResult');
        $this->assertMethodExist($guzzle, 'getHttpStatus');
    }

    /**
     * GuzzleConnection make a proper connection to PHP.net
     *
     * @test
     */
    public function validUrl()
    {
        $guzzle = new GuzzleConnection();
        $guzzle->makeConnection()
            ->setConnection('http://php.net/');

        $this->assertInstanceOf('\ComicVine\Api\Connection\GuzzleConnection', $guzzle);
    }

    /**
     * Make a proper Guzzle connection.
     *
     * @test
     */
    public function validResponse()
    {
        $guzzle   = new GuzzleConnection();
        $response = $guzzle->makeConnection()
            ->setConnection('http://php.net/');

        $this->assertInstanceOf('\ComicVine\Api\Connection\GuzzleConnection', $response);
        $this->assertNotEmpty($response->getResult());
        $this->assertNotEmpty($response->getHttpStatus());
    }

    /**
     * GuzzleConnection cannot make a proper connection, invalid
     * URL given.
     *
     * @test
     * @expectedException \ComicVine\Exceptions\InvalidUrl
     */
    public function invalidUrl()
    {
        $guzzle = new GuzzleConnection();
        $guzzle->makeConnection()
            ->setConnection('');
    }

    /**
     * GuzzleConnection cannot return a response, request was
     * not executed.
     *
     * @test
     * @expectedException \ComicVine\Exceptions\EmptyResponse
     */
    public function emptyResponse()
    {
        $guzzle = new GuzzleConnection();

        $this->assertAttributeEmpty('response', $guzzle);

        $guzzle->getResult();
    }

    /**
     * GuzzleConnection cannot return a status code, request was
     * not executed.
     *
     * @test
     * @expectedException \ComicVine\Exceptions\EmptyResponse
     */
    public function emptyStatusCode()
    {
        $guzzle = new GuzzleConnection();

        $this->assertAttributeEmpty('response', $guzzle);

        $guzzle->getHttpStatus();
    }

}