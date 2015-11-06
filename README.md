# ComicVine API parser

__Author__: Grzegorz Gajda <grz.gajda@outlook.com>

__License__: MIT

## What is it?

## How to use it?

```php

<?php
    /*
     * First, I register new API KEY, it is necessary element
     * for make a valid connection to ComicVine.
     */
    $key  = new \ComicVine\Api\RegisterKey('0cc832f7415a1d84de24c32e5d3a15568c17c421');
    
    /*
     * Now, I am passing a instance of RegisterKey to static method
     * `register`. Object is saved in static class variable. Now, I can use
     * key many times in whole page.
     *
     * Automatically is registered CURL connection. If we want to change CURL
     * to some other connection interface, we can pass it to second argument.
     */
    ComicVine::register($key);
    
    /*
     * Method `make` calling a new instance of object `ControllerRequest`
     * where each method calling a new instance of object `ControllerQuery`.
     *
     * Any method of `ControllerRequest` not require an argument.
     */
    $test = ComicVine::make()->getCharacters();
    
    /*
     * Object `ControllerQuery` allow us to make different query for our needs
     * like sort (only asc and desc), filters (name:Batman) or limit our query to
     * 1 element.
     */
    $next = $test->setLimit(50)
        ->setFormat(new JsonFormat())
        ->setFilters(['name' => 'Batman'])
        ->setFieldList(['api_detail_url'])
        ->setLimit(1)
        ->getResponse();
?>
```