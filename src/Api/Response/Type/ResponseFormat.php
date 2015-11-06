<?php

namespace ComicVine\Api\Response\Type;

/**
 * Contract for new respones formats.
 *
 * Interface Format
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
interface ResponseFormat
{
    /**
     * Return specific format.
     *
     * @return array
     */
    public function get();
}