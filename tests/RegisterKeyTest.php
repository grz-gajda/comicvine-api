<?php

use ComicVine\Api\RegisterKey;
use ComicVine\Exceptions\InvalidApiKeyException;
use ComicVine\Exceptions\InvalidFormatRegisterKey;

/**
 * Class RegisterKeyTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class RegisterKeyTest extends PHPUnit_Framework_TestCase
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
     * Test creating new RegisterKey object with valid key.
     *
     * @test
     */
    public function validKey()
    {
        try {
            $key = new RegisterKey($this->randStr40);
            $this->assertEquals($this->randStr40, $key->getKey());
        } catch (InvalidApiKeyException $e) {

        }
    }

    /**
     * Test creating new RegisterKey object with too short key.
     *
     * @test
     */
    public function invalidKeyLength()
    {
        try {
            $key = new RegisterKey($this->randStr39);
            $key->getKey();
        } catch (InvalidApiKeyException $e) {
            $this->assertEquals(
                "Length of API key is not valid: ".strlen($this->randStr39)." instead of 40",
                $e->getMessage()
            );
        }
    }

    /**
     * Test creating new RegisterKey object with wrong variable type.
     *
     * @test
     */
    public function invalidKeyFormat()
    {
        $apikey = new StdClass();

        try {
            $key = new RegisterKey($apikey);
            $key->getKey();
        } catch (InvalidFormatRegisterKey $e) {
            $this->assertEquals(
                "Format of API key is not valid. Use string instead of ".gettype($apikey),
                $e->getMessage()
            );
        }
    }

}
