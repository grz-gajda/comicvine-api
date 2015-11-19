<?php

use ComicVine\ComicVine;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

/**
 * Class ControllerTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class ControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Get Batman from ComicVine using cURL
     *
     * @test
     */
    public function getBatman()
    {
        $expectedString = '{\"error\":\"OK\",\"limit\":1,\"offset\":0,\"number_of_page_results\":1,\"number_of_total_results\":15,\"status_code\":1,\"results\":[{\"api_detail_url\":\"http:\/\/www.comicvine.com\/api\/character\/4005-1699\/\"}],\"version\":\"1.0\"}';

        $key = Mockery::mock('ComicVine\Api\RegisterKey')
            ->shouldReceive(['getKey' => 'qwerty'])
            ->once()
            ->getMock();

        $conn = Mockery::mock('ComicVine\Api\Connection\CURLConnection')
            ->shouldReceive([
                'makeConnection' => Mockery::self(),
                'setConnection'  => Mockery::self(),
                'getResult'      => $expectedString,
            ])
            ->once()
            ->getMock();

        ComicVine::register($key, $conn);

        $responseFormat = ComicVine::createFormat('json');

        $result = ComicVine::make()->getCharacters()
            ->setFormat($responseFormat)
            ->setFilters(['name' => 'Batman'])
            ->setFieldList(['api_detail_url'])
            ->setLimit(1)
            ->getResponse();

        $this->assertEquals($expectedString, $result);
    }

    /**
     * Get Batman from ComicVine using Guzzle
     *
     * @test
     */
    public function getBatmanGuzzle()
    {
        $expectedString = '{\"error\":\"OK\",\"limit\":1,\"offset\":0,\"number_of_page_results\":1,\"number_of_total_results\":15,\"status_code\":1,\"results\":[{\"api_detail_url\":\"http:\/\/www.comicvine.com\/api\/character\/4005-1699\/\"}],\"version\":\"1.0\"}';

        $key = Mockery::mock('\ComicVine\Api\RegisterKey')
            ->shouldReceive(['getKey' => 'qwerty'])
            ->once()
            ->getMock();

        $conn = new MockHandler([
            new Response(200, [], $expectedString)
        ]);

        $handler = HandlerStack::create($conn);
        $client = new Client(['handler' => $handler]);

        $mockConn = Mockery::mock('\ComicVine\Api\Connection\GuzzleConnection')
            ->shouldReceive([
                'setConnection' => Mockery::self(),
                'makeConnection' => Mockery::self(),
                'getResult' => $client->request('GET', '/')->getBody()
            ])
            ->once()
            ->getMock();

        ComicVine::register($key, $mockConn);

        $responseFormat = ComicVine::createFormat('json');

        $result = ComicVine::make()->getCharacters()
            ->setFormat($responseFormat)
            ->setFilters(['name' => 'Batman'])
            ->setFieldList(['api_detail_url'])
            ->setLimit(1)
            ->getResponse();

        $this->assertEquals($expectedString, $result);
    }
}
