<?php

/**
 * Class TestCase
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class TestCase extends PHPUnit_Framework_TestCase
{

    /**
     * Assert that a class has a method
     *
     * @param object|string $class  Name of the class
     * @param string        $method Name of the searched method
     *
     * @throws ReflectionException if $class don't exist
     * @throws PHPUnit_Framework_ExpectationFailedException if a method isn't found
     */
    public function assertMethodExist($class, $method)
    {
        $oReflectionClass = new ReflectionClass($class);
        assertThat("method exist", true, $oReflectionClass->hasMethod($method));
    }

}