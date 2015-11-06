# ComicVine API

__Author__: Grzegorz Gajda _<grz.gajda@outlook.com>_

### Basic usage

First, we need to create instance of `RegisterKey` object to verify our key. We can use `ComicVine` static class to make that object.

```php
$apiKey = ComicVine::makeApiKey('YOUR_KEY');
```

Next, we need register key and connection to `ComicVine` class. By default, method `register` use built-in `CURLConnection` class to make connections. Then, you haven't to write second argument.

```php
ComicVine::register($instanceOfRegisterKey, $instanceOfConnection = null)`
```.

After registering, we can creating query to ComicVine API. But by default, response will be in XML format. We can change response format by creating instance of `ResponseFormat` class.

```php
$responseFormat = ComicVine::createFormat('json');
```

and then using query (we want to find url to Batman:

```php
$response = ComicVine::getCharacters()
    ->setFormat($responseFormat)
    ->setFilters(['name' => 'Batman']
    ->setLimit(1)
    ->setFieldList(['api_detail_url'])
    ->getResponse();
```

Now, variable `$response` keep our JSON response from ComicVine API.

### Extending

Looking on current state of package, you can write your own `Connection` class (must implement `interface Connection`) and `ResponseFormat` (must implement `interface ResponseFormat`). 

### License

The package is open-sourced software licensed under the MIT license