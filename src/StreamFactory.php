<?php

namespace Mjelamanov\Psr17Httplug;

use Http\Message\StreamFactory as HttplugStreamFactory;
use InvalidArgumentException;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

/**
 * Class StreamFactory.
 *
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
     * {@inheritdoc}
     */
    public function createStream(string $content = ''): StreamInterface
    {
        return $this->streamFactory->createStream($content);
    }

    /**
     * {@inheritdoc}
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        $resource = @fopen($filename, $mode);
        $errors = error_get_last();
        error_clear_last();

        if ($errors) {
            if (strpos($errors['message'], 'mode') !== false) {
                throw new InvalidArgumentException("Invalid mode {$mode} given");
            }

            throw new RuntimeException("File {$filename} does not exist");
        }

        return $this->createStreamFromResource($resource);
    }

    /**
     * {@inheritdoc}
     */
    public function createStreamFromResource($resource): StreamInterface
    {
        return $this->streamFactory->createStream($resource);
    }
}
