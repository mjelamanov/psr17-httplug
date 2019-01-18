<?php

namespace Mjelamanov\Psr17Httplug;

use Http\Message\StreamFactory as HttplugStreamFactory;
use Http\Message\StreamFactory\GuzzleStreamFactory;
use Interop\Http\Factory\StreamFactoryTestCase;

/**
 * Class StreamFactoryTest
 *
 * @package Mjelamanov\Psr17Httplug
 * @author Mirlan Jelamanov <mirlan.jelamanov@gmail.com>
 */
class StreamFactoryTest extends StreamFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function createStreamFactory()
    {
        return new StreamFactory($this->getHttplugStreamFactory());
    }

    /**
     * @return \Http\Message\StreamFactory
     */
    protected function getHttplugStreamFactory(): HttplugStreamFactory
    {
        return new GuzzleStreamFactory();
    }
}
