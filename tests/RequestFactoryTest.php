<?php

namespace Mjelamanov\Psr17Httplug;

use Http\Message\MessageFactory\GuzzleMessageFactory;
use Http\Message\RequestFactory as HttplugRequestFactory;
use Http\Message\UriFactory as HttplugUriFactory;
use Http\Message\UriFactory\GuzzleUriFactory;
use Interop\Http\Factory\RequestFactoryTestCase;
use Psr\Http\Message\UriFactoryInterface;

/**
 * Class RequestFactoryTest.
 *
 * @author Mirlan Jelamanov <mirlan.jelamanov@gmail.com>
 */
class RequestFactoryTest extends RequestFactoryTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function createRequestFactory()
    {
        return new RequestFactory($this->getHttplugRequestFactory());
    }

    /**
     * {@inheritdoc}
     */
    protected function createUri($uri)
    {
        return $this->createUriFactory()->createUri($uri);
    }

    /**
     * @return \Psr\Http\Message\UriFactoryInterface
     */
    protected function createUriFactory(): UriFactoryInterface
    {
        return new UriFactory($this->getHttplugUriFactory());
    }

    /**
     * @return \Http\Message\RequestFactory
     */
    protected function getHttplugRequestFactory(): HttplugRequestFactory
    {
        return new GuzzleMessageFactory();
    }

    /**
     * @return \Http\Message\UriFactory
     */
    protected function getHttplugUriFactory(): HttplugUriFactory
    {
        return new GuzzleUriFactory();
    }
}
