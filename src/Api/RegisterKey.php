<?php

namespace ComicVine\Api;

use ComicVine\Exceptions\InvalidApiKeyException;
use ComicVine\Exceptions\InvalidFormatRegisterKey;

/**
 * Registering and validation for API key.
 *
 * Class RegisterKey
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class RegisterKey
{

    /**
     * @var string Key for ComicVine API.
     */
    private $key;

    /**
     * @var int Length of ComicVine API key.
     */
    private $keyLength = 40;

    /**
     * RegisterKey constructor.
     *
     * @param string $key Key for ComicVine API
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Return key.
     *
     * @return string ComicVine API key
     */
    public function getKey()
    {
        return $this->checkLength()
            ->key;
    }

    /**
     * Return length.
     *
     * @return int Length of ComicVine API key
     */
    public function getLength()
    {
        return $this->keyLength;
    }

    /**
     * Check if key length is equal to class variable.
     *
     * @return $this
     * @throws \ComicVine\Exceptions\InvalidApiKeyException
     * @throws \ComicVine\Exceptions\InvalidFormatRegisterKey
     */
    protected function checkLength()
    {
        if (is_string($this->key) === false) {
            throw new InvalidFormatRegisterKey(
                "Format of API key is not valid. Use string instead of ".gettype($this->key)
            );
        }

        if (strlen($this->key) === $this->keyLength) {
            return $this;
        }

        throw new InvalidApiKeyException(
            "Length of API key is not valid: ".strlen($this->key)." instead of $this->keyLength"
        );
    }

}