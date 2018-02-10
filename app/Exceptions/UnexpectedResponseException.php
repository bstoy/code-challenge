<?php

namespace App\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * To be thrown when a third party service returns an unexpected response.
 * Note that you should let Guzzle throw exceptions for unsuccessful HTTP status codes and only use an `UnexpectedResponseException` when this is not possible or a response has a successful HTTP status code, but still isn't what you expected.
 *
 * @package App\Exceptions
 */
class UnexpectedResponseException extends Exception
{
    protected $response;

    /**
     * UnexpectedResponseException constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        parent::__construct();
        $this->withResponse($response);
    }

    /**
     * Get response object.
     *
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * Get response as string.
     *
     * @return string
     */
    public function getResponseString(): string
    {
        return $this->formatResponseString($this->response);
    }

    /**
     * Set response object.
     * Note that this does not accept generic objects or arrays on purpose, to encourage consistent and clean error handling.
     *
     * @param ResponseInterface $response
     * @return $this
     */
    public function withResponse(ResponseInterface $response)
    {
        $this->response = $response;
        $this->message = 'Service returned unexpected response: ' . $this->formatResponseString($response);

        return $this;
    }

    /**
     * Get response as string.
     *
     * @param ResponseInterface $response
     * @return string
     */
    protected function formatResponseString(ResponseInterface $response): string
    {
        return (string) $response->getBody();
    }
}
