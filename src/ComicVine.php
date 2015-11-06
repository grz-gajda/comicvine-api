<?php

namespace ComicVine;

use ComicVine\Api\Connection\Connection;
use ComicVine\Api\Connection\CURLConnection;
use ComicVine\Api\Controllers\ControllerRequest;
use ComicVine\Api\RegisterKey;

/**
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
     * @var ComicVine\Api\RegisterKey
     */
    private static $key;

    /**
     * @var ComicVine\Api\Connection\CURLConnection
     */
    private static $conn;

    /**
     * Register a key to make connection.
     *
     * @param \ComicVine\Api\RegisterKey           $key
     * @param \ComicVine\Api\Connection\Connection $conn
     */
    public static function register(RegisterKey $key, Connection $conn = null)
    {
        self::$key  = $key->getKey();
        self::$conn = ($conn === null) ? new CURLConnection() : $conn;
    }

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
     * @return \ComicVine\ComicVine\Api\Connection\CURLConnection
     */
    public static function getConnection()
    {
        return self::$conn;
    }

}