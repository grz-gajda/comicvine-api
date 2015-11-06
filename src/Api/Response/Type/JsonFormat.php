<?php

namespace ComicVine\Api\Response\Type;

/**
 * Class JsonFormat
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class JsonFormat implements ResponseFormat
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