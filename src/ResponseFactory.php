<?php

namespace Mjelamanov\Psr17Httplug;

use Http\Message\ResponseFactory as HttplugResponseFactory;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ResponseFactoryAbstract
 *
 * @package Mjelamanov\Psr17Httplug
 * @author Mirlan Jelamanov <mirlan.jelamanov@gmail.com>
 */
class ResponseFactory implements ResponseFactoryInterface
{
    /**
     * @var \Http\Message\ResponseFactory
     */
    protected $responseFactory;

    /**
     * ResponseFactoryAbstract constructor.
     *
     * @param \Http\Message\ResponseFactory $responseFactory
     */
    public function __construct(HttplugResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        return $this->responseFactory->createResponse($code, $reasonPhrase);
    }
}
