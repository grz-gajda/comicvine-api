<?php

use ComicVine\ComicVine;
use ComicVine\Api\Response\Type\XmlFormat;

/**
 * Class XmlFormatTest
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class XmlFormatTest extends TestCase
{
    /**
     * ResponseFormat attribute.
     *
     * @var array
     */
    protected $formatArray = ['format' => 'xml'];

    /**
     * Create response format using ComicVine static
     * method. Created format is XML.
     *
     * @test
     */
    public function createStaticXML()
    {
        $this->assertInstanceOf(
            '\ComicVine\Api\Response\Type\XmlFormat',
            ComicVine::createFormat('xml')
        );

        $this->assertInstanceOf(
            '\ComicVine\Api\Response\Type\ResponseFormat',
            ComicVine::createFormat('xml')
        );
    }

    /**
     * Create response format using ComicVine static
     * method, both objects are the same.
     *
     * @test
     */
    public function createStaticXmlEquals()
    {
        $static = ComicVine::createFormat('xml');
        $object = new XmlFormat();

        $this->assertEquals($object, $static);
    }

    /**
     * JsonFormat has attribute which is array type.
     *
     * @test
     */
    public function hasAttribute()
    {
        $format = new XmlFormat();

        $this->assertObjectHasAttribute('format', $format);
        $this->assertAttributeInternalType('array', 'format', $format);
        $this->assertMethodExist($format, 'get');

        $this->assertEquals($this->formatArray, $format->get());
    }

}