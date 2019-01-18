<?php

namespace Mjelamanov\Psr17Httplug;

use Http\Message\UriFactory as HttplugUriFactory;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class UriFactory
 *
 * @package Mjelamanov\Psr17Httplug
 * @author Mirlan Jelamanov <mirlan.jelamanov@gmail.com>
 */
class UriFactory implements UriFactoryInterface
{
    /**
     * @var \Http\Message\UriFactory
     */
    protected $uriFactory;

    /**
     * UriFactory constructor.
     *
     * @param \Http\Message\UriFactory $uriFactory
     */
    public function __construct(HttplugUriFactory $uriFactory)
    {
        $this->uriFactory = $uriFactory;
    }

    /**
     * @inheritDoc
     */
    public function createUri(string $uri = ''): UriInterface
    {
        return $this->uriFactory->createUri($uri);
    }
}
