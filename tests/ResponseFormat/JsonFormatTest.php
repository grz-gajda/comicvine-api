<?php

use ComicVine\ComicVine;
use ComicVine\Api\Response\Type\JsonFormat;

/**
 * Class JsonFormatTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class JsonFormatTest extends TestCase
{
    /**
     * ResponseFormat attribute.
     *
     * @var array
     */
    protected $formatArray = ['format' => 'json'];

    /**
     * Create response format using ComicVine static
     * method. Created format is JSON.
     *
     * @test
     */
    public function createStaticJSON()
    {
        $this->assertInstanceOf(
            '\ComicVine\Api\Response\Type\JsonFormat',
            ComicVine::createFormat('json')
        );

        $this->assertInstanceOf(
            '\ComicVine\Api\Response\Type\ResponseFormat',
            ComicVine::createFormat('json')
        );
    }

    /**
     * Create response format using ComicVine static
     * method, both objects are the same.
     *
     * @test
     */
    public function createStaticJsonEquals()
    {
        $static = ComicVine::createFormat('json');
        $object = new JsonFormat();

        $this->assertEquals($object, $static);
    }

    /**
     * JsonFormat has attribute which is array type.
     *
     * @test
     */
    public function hasAttribute()
    {
        $format = new JsonFormat();

        $this->assertObjectHasAttribute('format', $format);
        $this->assertAttributeInternalType('array', 'format', $format);
        $this->assertMethodExist($format, 'get');

        $this->assertEquals($this->formatArray, $format->get());
    }

}