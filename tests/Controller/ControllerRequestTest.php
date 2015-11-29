<?php

use ComicVine\Api\Controllers\ControllerRequest;

/**
 * Class ControllerRequestTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class ControllerRequestTest extends TestCase
{
    /**
     * Path to ControllerQuery class.
     *
     * @var string
     */
    protected $classQuery = '\ComicVine\Api\Controllers\ControllerQuery';

    /** @test */
    public function characters()
    {
        $req = new ControllerRequest();
        $res = $req->getCharacters();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function chats()
    {
        $req = new ControllerRequest();
        $res = $req->getChats();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function concepts()
    {
        $req = new ControllerRequest();
        $res = $req->getConcepts();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function episodes()
    {
        $req = new ControllerRequest();
        $res = $req->getEpisodes();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function issues()
    {
        $req = new ControllerRequest();
        $res = $req->getIssues();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function locations()
    {
        $req = new ControllerRequest();
        $res = $req->getLocations();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function movies() {
        $req = new ControllerRequest();
        $res = $req->getMovies();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function objects()
    {
        $req = new ControllerRequest();
        $res = $req->getObjects();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function origins()
    {
        $req = new ControllerRequest();
        $res = $req->getOrigins();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function people()
    {
        $req = new ControllerRequest();
        $res = $req->getPeople();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function powers()
    {
        $req = new ControllerRequest();
        $res = $req->getPowers();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function promos()
    {
        $req = new ControllerRequest();
        $res = $req->getPromos();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function publishers()
    {
        $req = new ControllerRequest();
        $res = $req->getPublishers();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function seriesList()
    {
        $req = new ControllerRequest();
        $res = $req->getSeriesList();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    public function search()
    {
        // @todo Waiting for implementation
    }

    /** @test */
    public function storyArcs()
    {
        $req = new ControllerRequest();
        $res = $req->getStoryArcs();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function teams()
    {
        $req = new ControllerRequest();
        $res = $req->getTeams();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function types()
    {
        $req = new ControllerRequest();
        $res = $req->getTypes();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    public function videos()
    {
        // @todo Waiting for implementation
    }

    /** @test */
    public function videoTypes()
    {
        $req = new ControllerRequest();
        $res = $req->getVideoTypes();

        $this->assertInstanceOf($this->classQuery, $res);
    }

    /** @test */
    public function volumes()
    {
        $req = new ControllerRequest();
        $res = $req->getVolumes();

        $this->assertInstanceOf($this->classQuery, $res);
    }

}