<?php

namespace Mjelamanov\Psr17Httplug;

use Http\Message\StreamFactory as HttplugStreamFactory;
use Http\Message\StreamFactory\GuzzleStreamFactory;
use Interop\Http\Factory\StreamFactoryTestCase;

/**
 * Class StreamFactoryTest.
 *
 * @author Mirlan Jelamanov <mirlan.jelamanov@gmail.com>
 */
class StreamFactoryTest extends StreamFactoryTestCase
{
    /**
     * {@inheritdoc}
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
