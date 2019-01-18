<?php

namespace Mjelamanov\Psr17Httplug;

use Http\Message\MessageFactory\GuzzleMessageFactory;
use Http\Message\ResponseFactory as HttplugResponseFactory;
use Interop\Http\Factory\ResponseFactoryTestCase;

/**
 * Class ResponseFactoryTest.
 *
 * @author Mirlan Jelamanov <mirlan.jelamanov@gmail.com>
 */
class ResponseFactoryTest extends ResponseFactoryTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function createResponseFactory()
    {
        return new ResponseFactory($this->getHttplugResponseFactory());
    }

    /**
     * @return \Http\Message\ResponseFactory
     */
    protected function getHttplugResponseFactory(): HttplugResponseFactory
    {
        return new GuzzleMessageFactory();
    }
}
