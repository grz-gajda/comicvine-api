<?php

namespace ComicVine\Api\Controllers;

use ComicVine\Exceptions\EmptyControllerRequestUrl;

/**
 * Abstract base for ControllerRequest. Here
 * methods from ControllerRequest are assigned
 * and finally method call new controller.
 *
 * Class ControllerRequestAbstract
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
abstract class ControllerRequestAbstract
{

    /**
     * Filters for GET request.
     *
     * @var array
     */
    protected $enabledFilters
        = [
            'field_list' => true,
            'limit'      => false,
            'offset'     => false,
            'sort'       => false,
            'filter'     => false,
        ];

    /**
     * Part of URL.
     *
     * @var string
     */
    protected $url = "";

    /**
     * Set parameters which can be added to URL.
     *
     * @param bool|false $limit  The number of results to display per page.
     * @param bool|false $offset Return results starting with the object at the offset specified.
     * @param bool|false $sort   The result set can be sorted by the marked fields in the Fields section below.
     * @param bool|false $filter The result can be filtered by the marked fields in the Fields section below.
     *
     * @return $this
     */
    protected function setFilters($limit = false, $offset = false, $sort = false, $filter = false)
    {
        $this->enabledFilters = [
            'field_list' => true,
            'limit'      => $limit,
            'offset'     => $offset,
            'sort'       => $sort,
            'filter'     => $filter,
        ];

        return $this;
    }

    /**
     * Add url for this type of request.
     *
     * @param string $url Part of URL.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    protected function setUrl($url)
    {
        if (empty($url) === true) {
            throw new EmptyControllerRequestUrl("URL parameter for request cannot be empty.");
        }

        $this->url = $url;

        return $this->getController();
    }

    /**
     * Return new controller for making query.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     */
    protected function getController()
    {
        return new ControllerQuery($this->enabledFilters, $this->url);
    }

}