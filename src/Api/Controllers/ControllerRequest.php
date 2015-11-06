<?php

namespace ComicVine\Api\Controllers;

/**
 * Class ControllerRequest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class ControllerRequest extends ControllerRequestAbstract
{

    /**
     * Get all characters from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getCharacters()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/characters');
    }

    /**
     * Get all chats from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getChats()
    {
        return $this->setFilters()
            ->setUrl('/chats');
    }

    /**
     * Get all concepts from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getConcepts()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/concepts');
    }

    /**
     * Get all episodes from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getEpisodes()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/episodes');
    }

    /**
     * Get all issues from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getIssues()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/issus');
    }

    /**
     * Get all locations from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getLocations()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/locations');
    }

    /**
     * Get all movies from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getMovies()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/movies');
    }

    /**
     * Get all objects from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getObjects()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/objects');
    }

    /**
     * Get all origins from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getOrigins()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/origins');
    }

    /**
     * Get all people from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getPeople()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/people');
    }

    /**
     * Get all powers from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getPowers()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/powers');
    }

    /**
     * Get all promos from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getPromos()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/promos');
    }

    /**
     * Get all publishers from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getPublishers()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/publishers');
    }

    /**
     * Get all series from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getSeriesList()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/series_list');
    }

    /**
     * Get search result from ComicVine.
     *
     * @todo Waiting for implementation
     */
    public function getSearch()
    {
        // @todo Waiting for implementation
    }

    /**
     * Get all story arcs from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getStoryArcs()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/story_arcs');
    }

    /**
     * Get all teams from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getTeams()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/teams');
    }

    /**
     * Get all types from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getTypes()
    {
        return $this->setFilters(false, false, false, false)
            ->setUrl('/types');
    }

    /**
     * Get videos from ComicVine.
     *
     * @todo Waiting for implementation
     */
    public function getVideos()
    {
        // @todo Waiting for implementation
    }

    /**
     * Get all video types from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getVideoTypes()
    {
        return $this->setFilters(true, true, false, false)
            ->setUrl('/video_types');
    }

    /**
     * Get all volumes from ComicVine.
     *
     * @return \ComicVine\Api\Controllers\ControllerQuery
     * @throws \ComicVine\Exceptions\EmptyControllerRequestUrl
     */
    public function getVolumes()
    {
        return $this->setFilters(true, true, true, true)
            ->setUrl('/volumes');
    }

}