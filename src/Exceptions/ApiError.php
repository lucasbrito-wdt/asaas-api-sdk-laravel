<?php

namespace Asaas\Laravel\Exceptions;

use Illuminate\Http\Client\Response;
use RuntimeException;

class ApiError extends RuntimeException
{
    public function __construct(
        string $message,
        public readonly int $statusCode,
        public readonly ?Response $response = null,
    ) {
        parent::__construct($message);
    }

    public static function fromResponse(Response $response): self
    {
        $body = $response->json();
        $message = is_array($body) && isset($body['errors'][0]['description'])
            ? $body['errors'][0]['description']
            : $response->body();
        return new self($message, $response->status(), $response);
    }
}
