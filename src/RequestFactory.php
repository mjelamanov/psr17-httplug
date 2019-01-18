<?php

namespace Mjelamanov\Psr17Httplug;

use Http\Message\RequestFactory as HttplugRequestFactory;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class RequestFactoryAbstract.
 *
 * @author Mirlan Jelamanov <mirlan.jelamanov@gmail.com>
 */
class RequestFactory implements RequestFactoryInterface
{
    /**
     * @var \Http\Message\RequestFactory
     */
    protected $requestFactory;

    /**
     * RequestFactoryAbstract constructor.
     *
     * @param \Http\Message\RequestFactory $requestFactory
     */
    public function __construct(HttplugRequestFactory $requestFactory)
    {
        $this->requestFactory = $requestFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function createRequest(string $method, $uri): RequestInterface
    {
        return $this->requestFactory->createRequest($method, $uri);
    }
}
