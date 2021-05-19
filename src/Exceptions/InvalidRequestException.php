<?php

namespace Accu\Postmen\Exceptions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class InvalidRequestException extends PostmenException
{
    public const META_CODE_EXEMPTIONS = [
        4713,
    ];

    /** @var RequestInterface */
    private $request;

    /** @var ResponseInterface */
    private $response;

    public function __construct(
        string $message,
        RequestInterface $request = null,
        ResponseInterface $response = null,
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest(): ?RequestInterface
    {
        return $this->request;
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }

    public static function handle(
        \stdClass $json,
        RequestInterface $request = null,
        ResponseInterface $response = null
    ) {
        if ($json->meta && in_array((int) $json->meta->code, self::META_CODE_EXEMPTIONS)) {
            return;
        }

        throw new self(
            $json->meta->message ?? "Encountered error code: {$json->meta->code}.",
            $request,
            $response,
            $json->meta->code
        );
    }
}
