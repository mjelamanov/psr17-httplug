<?php

namespace Mjelamanov\Psr17Httplug;

use Http\Message\StreamFactory as HttplugStreamFactory;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Class StreamFactory
 *
 * @package Mjelamanov\Psr17Httplug
 * @author Mirlan Jelamanov <mirlan.jelamanov@gmail.com>
 */
class StreamFactory implements StreamFactoryInterface
{
    /**
     * @var \Http\Message\StreamFactory
     */
    protected $streamFactory;

    /**
     * StreamFactory constructor.
     *
     * @param \Http\Message\StreamFactory $streamFactory
     */
    public function __construct(HttplugStreamFactory $streamFactory)
    {
        $this->streamFactory = $streamFactory;
    }

    /**
     * @inheritDoc
     */
    public function createStream(string $content = ''): StreamInterface
    {
        return $this->streamFactory->createStream($content);
    }

    /**
     * @inheritDoc
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        return $this->createStreamFromResource(fopen($filename, $mode));
    }

    /**
     * @inheritDoc
     */
    public function createStreamFromResource($resource): StreamInterface
    {
        return $this->streamFactory->createStream($resource);
    }
}
