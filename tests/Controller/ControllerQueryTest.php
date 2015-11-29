<?php

use ComicVine\Api\Controllers\ControllerQuery;

/**
 * Class ControllerQueryTest
 *
 * @package                grzgajda/comicvine-api
 * @author                 Grzegorz Gajda <grz.gajda@outlook.com>
 *
 * @backupGlobals          disabled
 * @backupStaticAttributes disabled
 */
class ControllerQueryTest extends TestCase
{

    protected $disabledFilters
        = [
            'limit'  => false,
            'offset' => false,
            'sort'   => false,
            'filter' => false,
        ];

    protected $enabledFilters
        = [
            'limit'  => true,
            'offset' => true,
            'sort'   => true,
            'filter' => true,
        ];

    public function setUp()
    {
        parent::setUp();
        \ComicVine\ComicVine::$key = [];
    }

    /**
     * Try to add "field_list" query part to query
     * when all filters are disabled.
     *
     * @test
     */
    public function parseUrlUsingFieldListDisabled()
    {
        $query = new ControllerQuery($this->disabledFilters, '/test');
        $url   = $query->setFieldList(['field', 'another field'])
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?field_list=field,another+field',
            $url
        );
    }

    /**
     * Try to add "field_list" query part to query
     * when all filters are enabled.
     *
     * @test
     */
    public function parseUrlUsingFieldListEnabled()
    {
        $query = new ControllerQuery($this->enabledFilters, '/test');
        $url   = $query->setFieldList(['field', 'another field'])
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?field_list=field,another+field&limit=100&offset=0',
            $url
        );
    }

    /**
     * Try to add "limit" query part to query
     * when all filters are disabled.
     *
     * @test
     */
    public function parseUrlUsingLimitDisabled()
    {
        $query = new ControllerQuery($this->disabledFilters, '/test');
        $url   = $query->setLimit(50)
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?',
            $url
        );
    }

    /**
     * Try to add "limit" query part to query
     * when all filters are enabled.
     *
     * @test
     */
    public function parseUrlUsingLimitEnabled()
    {
        $query = new ControllerQuery($this->enabledFilters, '/test');
        $url   = $query->setLimit(39)
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?limit=39&offset=0',
            $url
        );
    }

    /**
     * Try to add "offset" query part to query
     * when all filters are disabled.
     *
     * @test
     */
    public function parseUrlUsingOffsetDisabled()
    {
        $query = new ControllerQuery($this->disabledFilters, '/test');
        $url   = $query->setOffset(50)
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?',
            $url
        );
    }

    /**
     * Try to add "offset" query part to query
     * when all filters are enabled.
     *
     * @test
     */
    public function parseUrlUsingOffsetEnabled()
    {
        $query = new ControllerQuery($this->enabledFilters, '/test');
        $url   = $query->setOffset(42)
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?limit=100&offset=42',
            $url
        );
    }

    /**
     * Try to add "sort" query part to query
     * when all filters are disabled.
     *
     * @test
     */
    public function parseUrlUsingSortDisabled()
    {
        $query = new ControllerQuery($this->disabledFilters, '/test');
        $url   = $query->setSorts(['field' => 'asc', 'another field' => 'desc'])
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?',
            $url
        );
    }

    /**
     * Try to add "sort" query part to query
     * when all filters are enabled.
     *
     * @test
     */
    public function parseUrlUsingSortEnabled()
    {
        $query = new ControllerQuery($this->enabledFilters, '/test');
        $url   = $query->setSorts(['field' => 'asc', 'another field' => 'desc'])
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?limit=100&offset=0&sort=field:asc,another+field:desc',
            $url
        );
    }

    /**
     * Try to add "filter" query part to query
     * when all filters are disabled.
     *
     * @test
     */
    public function parseUrlUsingFilterDisabled()
    {
        $query = new ControllerQuery($this->disabledFilters, '/test');
        $url   = $query->setFilters(['name' => 'Batman', 'alias' => 'Fatherless'])
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?',
            $url
        );
    }

    /**
     * Try to add "filter" query part to query
     * when all filters are enabled.
     *
     * @test
     */
    public function parseUrlUsingFilterEnabled()
    {
        $query = new ControllerQuery($this->enabledFilters, '/test');
        $url   = $query->setFilters(['name' => 'Batman', 'alias' => 'Fatherless'])
            ->build();

        $this->assertEquals(
            'http://www.comicvine.com/api/test/?limit=100&offset=0&filter=name:Batman,alias:Fatherless',
            $url
        );
    }

}