<?php

namespace ComicVine\Api\Connection;

/**
 * Interface Connection
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
interface Connection
{

    /**
     * Make connection instance and set default values.
     *
     * @param int    $timeout   Duration of connection.
     * @param string $userAgent User agent (default is Mozilla)
     *
     * @return $this
     */
    public function makeConnection($timeout = 30, $userAgent = "");

    /**
     * Set an URL for connection.
     *
     * @param string $url Url address for request.
     *
     * @return $this
     */
    public function setConnection($url);

    /**
     * Get status code of request.
     *
     * @return mixed Status code
     */
    public function getResult();

    /**
     * Return response from request.
     *
     * @return mixed Response of request
     */
    public function getHttpStatus();

}