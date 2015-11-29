<?php

use ComicVine\ComicVine;
use ComicVine\Api\RegisterKey;
use ComicVine\Exceptions\InvalidApiKeyException;
use ComicVine\Exceptions\InvalidFormatRegisterKey;

/**
 * Class RegisterKeyTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class RegisterKeyTest extends TestCase
{
    /**
     * Fake api key, random string with 40 chars.
     *
     * @var string
     */
    protected $randStr40 = "WcEAlZoaLy7WfFPuUypoAbWQoG7SRiBk8FsMCNxm";

    /**
     * Fake api key, random string with 39 chars.
     *
     * @var string
     */
    protected $randStr39 = "WcEAlZoaLy7WfFPuUypoAbWQoG7SRiBk8FsMCNx";

    /**
     * Test creating new RegisterKey object with valid key, testing
     * string type.
     *
     * @test
     */
    public function validKey()
    {
        $key = new RegisterKey($this->randStr40);
        $this->assertEquals($this->randStr40, $key->getKey());
        $this->assertInternalType("string", $key->getKey());

    }

    /**
     * Test creating new RegisterKey object with valid key, testing
     * length parameter.
     *
     * @test
     */
    public function validKeyLength()
    {
        $key = new RegisterKey($this->randStr40);
        $this->assertEquals(40, $key->getLength());
        $this->assertInternalType("int", $key->getLength());
    }

    /**
     * Test creating new RegisterKey object with too short key.
     *
     * @test
     * @expectedException \ComicVine\Exceptions\InvalidApiKeyException
     */
    public function invalidKeyLength()
    {
        $key = new RegisterKey($this->randStr39);
        $key->getKey();
    }

    /**
     * Test creating new RegisterKey object with wrong variable type.
     *
     * @test
     * @expectedException \ComicVine\Exceptions\InvalidFormatRegisterKey
     */
    public function invalidKeyFormat()
    {
        $apikey = new StdClass();
        $key = new RegisterKey($apikey);
        $key->getKey();
    }

    /**
     * Test creating new RegisterKey object using static ComicVine method.
     *
     * @test
     */
    public function staticMakeKey()
    {
        $keyStatic = ComicVine::makeApiKey($this->randStr40);

        $this->assertInstanceOf('\ComicVine\Api\RegisterKey', $keyStatic);
    }

}
