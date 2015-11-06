<?php

namespace ComicVine\Api\Response\Type;

/**
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
     * @return array
     */
    public function get()
    {
        return $this->format;
    }

}