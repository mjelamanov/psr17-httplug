# PSR-17 adapter for httplug's message factory

[![Build Status](https://travis-ci.com/mjelamanov/psr17-httplug.svg?branch=master)](https://travis-ci.com/mjelamanov/psr17-httplug)
[![StyleCI](https://github.styleci.io/repos/165729612/shield?branch=master)](https://github.styleci.io/repos/165729612)

A PSR-17 adapter for [php-http/message-factory](https://github.com/php-http/message-factory)

This package provides all implementations of the PSR-18 except for ``` Psr\Http\Message\ServerRequestFactoryInterface ```
and ``` Psr\Http\Message\UploadedFileFactoryInterface ``` because the
[php-http/message-factory](https://github.com/php-http/message-factory) package do not have similar factories

## Requirements

PHP 7.0 or above.

## Installation

``` bash
$ composer require mjelamanov/psr17-httplug
```

## RequestFactory

``` php
use Mjelamanov\Psr17Httplug\RequestFactory;
use Http\Message\MessageFactory\GuzzleMessageFactory; // A php-http's request factory implementation

$requestFactory = new RequestFactory(new GuzzleMessageFactory());

$request = $requestFactory->createRequest('GET', 'http://example.com');
```

## StreamFactory

``` php
use Mjelamanov\Psr17Httplug\StreamFactory;
use Http\Message\StreamFactory\GuzzleStreamFactory; // A php-http's stream factory implementation

$streamFactory = new StreamFactory(new GuzzleStreamFactory());

// Create from string
$stream = $streamFactory->createStream(json_encode(['test' => true]));

// Create from resource
$stream = $streamFactory->createStreamFromResource(fopen('path/to/file', 'r'));

// Create from file
$stream = $streamFactory->createStreamFromFile('path/to/file', 'r');
```

## UriFactory

``` php
use Mjelamanov\Psr17Httplug\UriFactory;
use Http\Message\StreamFactory\GuzzleUriFactory; // A php-http's uri factory implementation

$uriFactory = new UriFactory(new GuzzleUriFactory());

$uri = $uriFactory->createUri('http://example.com');
```

## ResponseFactory

``` php
use Mjelamanov\Psr17Httplug\ResponseFactory;
use Http\Message\StreamFactory\GuzzleMessageFactory; // A php-http's response factory implementation

$responseFactory = new ResponseFactory(new GuzzleMessageFactory());

$response = $responseFactory->createResponse(200, 'OK');
```

## Test

```bash
composer test
```

## License

The MIT license. Read [LICENSE file](https://github.com/mjelamanov/psr17-httplug/blob/master/LICENSE).