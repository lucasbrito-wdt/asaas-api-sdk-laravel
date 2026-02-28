<?php

namespace Asaas\Laravel\Exceptions;

use Illuminate\Http\Client\Response;

class ErrorResponseDtoException extends ApiError
{
    public function __construct(
        public readonly array $errorResponse,
        string $message,
        int $statusCode,
        ?Response $response = null,
    ) {
        parent::__construct($message, $statusCode, $response);
    }

    public static function fromResponse(Response $response): self
    {
        $body = $response->json() ?? [];
        $message = $body['errors'][0]['description'] ?? $response->body();
        return new self($body, $message, $response->status(), $response);
    }

    /** @return array<int, array{code?: string, description?: string}> */
    public function getErrors(): array
    {
        return $this->errorResponse['errors'] ?? [];
    }
}
