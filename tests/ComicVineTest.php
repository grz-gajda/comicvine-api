<?php

use ComicVine\ComicVine;

/**
 * Class ComicVineTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class ComicVineTest extends TestCase
{
    /**
     * Fake api key, random string with 40 chars.
     *
     * @var string
     */
    protected $randStr40 = "WcEAlZoaLy7WfFPuUypoAbWQoG7SRiBk8FsMCNxm";

    /**
     * Retrieve key from ComicVine wrapper class.
     *
     * @test
     */
    public function retrieveKey()
    {
        $key = ComicVine::makeApiKey($this->randStr40);

        $this->assertInstanceOf(
            '\ComicVine\Api\RegisterKey',
            $key
        );

        ComicVine::register($key);

        $this->assertAttributeNotEmpty('key', ComicVine::class);
        $this->assertAttributeInternalType('string', 'key', ComicVine::class);

        $this->assertEquals(
            $this->randStr40,
            ComicVine::getKey()
        );
    }

    /**
     * Retrieve connection from ComicVine wrapper class.
     *
     * @test
     */
    public function retrieveConnection()
    {
        $key = ComicVine::makeApiKey($this->randStr40);

        ComicVine::register($key);

        $this->assertAttributeNotEmpty('conn', ComicVine::class);

        $this->assertInstanceOf(
            '\ComicVine\Api\Connection\Connection',
            ComicVine::getConnection()
        );

        $this->assertEquals(
            new \ComicVine\Api\Connection\GuzzleConnection(),
            ComicVine::getConnection()
        );
    }

    /**
     * Create a wrong format using ComicVine class.
     *
     * @test
     */
    public function createWrongDefault()
    {
        $this->assertInstanceOf(
            '\ComicVine\Api\Response\Type\ResponseFormat',
            ComicVine::createFormat()
        );

        $this->assertInstanceOf(
            '\ComicVine\Api\Response\Type\ResponseFormat',
            ComicVine::createFormat('lorem ipsum')
        );

        $this->assertInstanceOf(
            '\ComicVine\Api\Response\Type\ResponseFormat',
            ComicVine::createFormat(13)
        );
    }

}