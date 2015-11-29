<?php

use ComicVine\Api\Validation;

/**
 * Class ControllerQueryTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class ValidationTest extends TestCase
{

    protected $filters
        = [
            'limit'  => true,
            'offset' => true,
            'filter' => true,
            'sort'   => true,
        ];

    /**
     * Test for validation limit GET parameter.
     *
     * @test
     */
    public function limitValidation()
    {
        $valid = new Validation($this->filters);

        $this->assertTrue($valid->validation('limit', 99));
        $this->assertTrue($valid->validation('limit', 86));
        $this->assertTrue($valid->validation('limit', 32));

        $this->assertFalse($valid->validation('limit', 113));
        $this->assertFalse($valid->validation('limit', -32));
        $this->assertFalse($valid->validation('limit', 32.34));
        $this->assertFalse($valid->validation('limit', 'string'));
    }

    /**
     * Test for validation offset GET parameter.
     *
     * @test
     */
    public function offsetValidation()
    {
        $valid = new Validation($this->filters);

        $this->assertTrue($valid->validation('offset', 1));
        $this->assertTrue($valid->validation('offset', 32));
        $this->assertTrue($valid->validation('offset', 123));

        $this->assertFalse($valid->validation('offset', -1));
        $this->assertFalse($valid->validation('offset', 3.14));
        $this->assertFalse($valid->validation('offset', 'string'));
    }

    /**
     * Test for validation filter GET parameter.
     *
     * @test
     */
    public function filterValidation()
    {
        $valid = new Validation($this->filters);

        $this->assertTrue($valid->validation('filter', ['name' => 'asc']));
        $this->assertTrue($valid->validation('filter', ['issue' => 456]));
        $this->assertTrue($valid->validation('filter', ['name' => 'Spider-Man', 'issue' => 456]));

        $this->assertFalse($valid->validation('filter', 'Spider-Man'));
        $this->assertFalse($valid->validation('filter', ['name' => ['name' => 'Spider-Man']]));
        $this->assertFalse($valid->validation('filter', ['asc']));
        $this->assertFalse($valid->validation('filter', new StdClass()));
        $this->assertFalse($valid->validation('filter', ['name' => new StdClass()]));
    }

    /**
     * Test for validation sort GET parameter.
     *
     * @test
     */
    public function sortValidation()
    {
        $valid = new Validation($this->filters);

        $this->assertTrue($valid->validation('sort', ['created' => 'asc']));
        $this->assertTrue($valid->validation('sort', ['deleted' => 'desc']));

        $this->assertFalse($valid->validation('sort', ['created' => 13]));
        $this->assertFalse($valid->validation('sort', [19 => 21]));
        $this->assertFalse($valid->validation('sort', 13));
        $this->assertFalse($valid->validation('sort', date('d-m-Y')));
    }

    /**
     * Test for validation field_list GET parameter.
     *
     * @test
     */
    public function fieldListValidation()
    {
        $valid = new Validation($this->filters);

        $this->assertTrue($valid->validation('field_list', ['name', 'aliases']));
        $this->assertTrue($valid->validation('field_list', ['name']));

        $this->assertFalse($valid->validation('field_list', ['name' => 'Batman']));
        $this->assertFalse($valid->validation('field_list', 'Batman'));
        $this->assertFalse($valid->validation('field_list', 72));
        $this->assertFalse($valid->validation('field_list', [13]));
    }

    /**
     * Test validation if not specified validation type.
     *
     * @test
     */
    public function emptyValidation()
    {
        $valid = new Validation($this->filters);

        $this->assertFalse($valid->validation('', 13));
        $this->assertFalse($valid->validation('', 'Batman'));
    }

    /**
     * Test validation when specified validation type
     * is disabled.
     *
     * @test
     */
    public function disabledValidation()
    {
        $valid = new Validation();

        $this->assertFalse($valid->validation('limit', 99));
        $this->assertFalse($valid->validation('offset', 32));
        $this->assertFalse($valid->validation('filter', ['name' => 'asc']));
        $this->assertFalse($valid->validation('sort', ['created' => 'asc']));
    }

}
