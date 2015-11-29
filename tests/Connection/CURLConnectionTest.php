<?php

use ComicVine\Api\Connection\CURLConnection;

/**
 * Class CURLConnectionTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class CURLConnectionTest extends TestCase
{

    /**
     * CURLConnection is proper instance of Connection.
     *
     * @test
     */
    public function newInstance()
    {
        $curl = new CURLConnection();

        $this->assertInstanceOf('\ComicVine\Api\Connection\Connection', $curl);
        $this->assertInstanceOf('\ComicVine\Api\Connection\CURLConnection', $curl);

        $this->assertMethodExist($curl, 'makeConnection');
        $this->assertMethodExist($curl, 'setConnection');
        $this->assertMethodExist($curl, 'getResult');
        $this->assertMethodExist($curl, 'getHttpStatus');
    }

    /**
     * CURLConnection make a proper connection to PHP.net
     *
     * @test
     */
    public function validUrl()
    {
        $curl = new CURLConnection();
        $curl->makeConnection()
            ->setConnection('http://php.net/');

        $this->assertInstanceOf('\ComicVine\Api\Connection\CURLConnection', $curl);
    }

    /**
     * Make a proper cURL connection.
     *
     * @test
     */
    public function validResponse()
    {
        $curl = new CURLConnection();
        $response = $curl->makeConnection()
            ->setConnection('http://php.net/');

        $this->assertInstanceOf('\ComicVine\Api\Connection\CURLConnection', $response);
        $this->assertNotEmpty($response->getResult());
        $this->assertNotEmpty($response->getHttpStatus());
    }

    /**
     * CURLConnection cannot make a proper connection, invalid
     * URL given.
     *
     * @test
     * @expectedException \ComicVine\Exceptions\InvalidUrl
     */
    public function invalidUrl()
    {
        $curl = new CURLConnection();
        $curl->makeConnection()
            ->setConnection('');
    }

    /**
     * CURLConnection cannot return a response, request was
     * not executed.
     *
     * @test
     * @expectedException \ComicVine\Exceptions\EmptyResponse
     */
    public function emptyResponse()
    {
        $curl = new CURLConnection();

        $this->assertAttributeEmpty('response', $curl);

        $curl->getResult();
    }

}