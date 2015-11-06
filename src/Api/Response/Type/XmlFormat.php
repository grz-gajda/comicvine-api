<?php

namespace ComicVine\Api\Response\Type;

/**
 * Select xml format for response.
 *
 * Class XmlFormat
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class XmlFormat implements ResponseFormat
{
    /**
     * Attachment to url request.
     *
     * @var array
     */
    protected $format = ['format' => 'json'];

    /**
     * Return XML format.
     *
     * @return array
     */
    public function get()
    {
        return $this->format;
    }

}