# ComicVine API

[![Code Climate](https://codeclimate.com/github/grz-gajda/comicvine-api/badges/gpa.svg)](https://codeclimate.com/github/grz-gajda/comicvine-api)
[![Build Status](https://travis-ci.org/grz-gajda/comicvine-api.svg)](https://travis-ci.org/grz-gajda/comicvine-api)

__Author__: Grzegorz Gajda _<grz.gajda@outlook.com>_

### Basic usage

First, we need to create instance of `RegisterKey` object to verify our key. We can use `ComicVine` static class to make that object.

```php
$apiKey = ComicVine::makeApiKey('YOUR_KEY');
```

Next, we need register key and connection to `ComicVine` class. By default, method `register` use built-in `CURLConnection` class to make connections. Then, you haven't to write second argument.

```php
ComicVine::register($instanceOfRegisterKey, $instanceOfConnection = null)
```

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

### Requests

List of implemented resources:

| URL          | method        | implemented? |
|--------------|---------------|--------------|
| /character   | none          | false        |
| /characters  | getCharacters | true         |
| /chat        | none          | false        |
| /chats       | getChats      | true         |
| /concept     | none          | false        |
| /concepts    | getConcepts   | true         |
| /episode     | none          | false        |
| /episodes    | getEpisodes   | true         |
| /issue       | none          | false        |
| /issues      | getIssues     | true         |
| /location    | none          | false        |
| /locations   | getLocations  | true         |
| /movie       | none          | false        |
| /movies      | getMovies     | true         |
| /object      | none          | false        |
| /objects     | getObjects    | true         |
| /origin      | none          | false        |
| /origins     | getOrigins    | true         |
| /person      | none          | false        |
| /people      | getPeople     | true         |
| /power       | none          | false        |
| /powers      | getPowers     | true         |
| /promo       | none          | false        |
| /promos      | getPromos     | true         |
| /publisher   | none          | false        |
| /publishers  | getPublishers | true         |
| /series      | none          | false        |
| /series_list | getSeriesList | true         |
| /search      | getSearch     | false        |
| /story_arc   | none          | false        |
| /story_arcs  | getStoryArcs  | true         |
| /team        | none          | false        |
| /teams       | getTeams      | true         |
| /video       | none          | false        |
| /videos      | getVideos     | false        |
| /video_type  | none          | false        |
| /video_types | getVideoTypes | true         |
| /volume      | none          | false        |
| /volumes     | getVolumes    | true         |

Calling each one of `get` method creating a new instance of `ControllerQuery` class. `ControllerQuery` class allows us to:

```php
/*
 * Argument for setFieldList is array containing
 * only names of fields which we want.
 */
$response->setFieldList(['api_detail_url', 'aliases'])
/*
 * Set filters to find resource you want. It needs key => value
 * schema and allows for many filters.
 */
    ->setFilters(['name' => 'Batman', 'aliases' => 'Fatherless'])
/*
 * Allows to sort response. Key is name of field, value is asc or desc
 * only.
 */
    ->setSort(['date_added' => 'asc'])
/*
 * Set how much elements do you want to get. Maximum limit is 100
 * (API restrictions).
 */
    ->setLimit(100)
/*
 * From which position we would want to start getting elements.
 */
    ->setOffset(50)
/*
 * After setting request query (set methods), times to get
 * response. Get response return XML object or JSON string.
 */
    ->getResponse() 
```

### Extending

Looking on current state of package, you can write your own `Connection` class (must implement `interface Connection`) and `ResponseFormat` (must implement `interface ResponseFormat`). 

### License

The package is open-sourced software licensed under the MIT license