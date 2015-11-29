<?php

namespace ComicVine;

use ComicVine\Api\Connection\Connection;
use ComicVine\Api\Connection\CURLConnection;
use ComicVine\Api\Connection\GuzzleConnection;
use ComicVine\Api\Controllers\ControllerRequest;
use ComicVine\Api\RegisterKey;
use ComicVine\Api\Response\Type\JsonFormat;
use ComicVine\Api\Response\Type\XmlFormat;

/**
 * Static wrapper for ComicVine package.
 *
 * Class ComicVine
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class ComicVine
{

    /**
     * RegisterKey object.
     *
     * @var RegisterKey
     */
    public static $key;

    /**
     * Connection object.
     *
     * @var CURLConnection
     */
    public static $conn;

    /**
     * Create instance of RegisterKey.
     *
     * @param $key
     *
     * @return \ComicVine\Api\RegisterKey
     */
    public static function makeApiKey($key)
    {
        return new RegisterKey($key);
    }

    /**
     * Register a key to make connection.
     *
     * @param \ComicVine\Api\RegisterKey           $key
     * @param \ComicVine\Api\Connection\Connection $conn
     */
    public static function register(RegisterKey $key, Connection $conn = null)
    {
        self::$key  = $key->getKey();
        self::$conn = ($conn === null) ? new GuzzleConnection() : $conn;
    }

    /**
     * Make a new controller to start defining request.
     *
     * @return \ComicVine\Api\Controllers\ControllerRequest
     */
    public static function make()
    {
        return new ControllerRequest();
    }

    /**
     * Get API KEY.
     *
     * @return string
     */
    public static function getKey()
    {
        return self::$key;
    }

    /**
     * Get Connection instance.
     *
     * @return CURLConnection
     */
    public static function getConnection()
    {
        return self::$conn;
    }

    /**
     * Simple factory for response format.
     *
     * @param string $formatType
     *
     * @return \ComicVine\Api\Response\Type\JsonFormat|\ComicVine\Api\Response\Type\XmlFormat
     */
    public static function createFormat($formatType = 'json')
    {
        switch ($formatType) {
            case 'json':
                return new JsonFormat();
            case 'xml':
                return new XmlFormat();
            default:
                return new JsonFormat();
        }
    }

}