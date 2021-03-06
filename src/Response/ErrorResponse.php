<?php declare(strict_types=1);

namespace Symfona\Api\Specification\Response;

final class ErrorResponse
{
    public function __construct(public readonly string $message, public readonly array $parameters = [])
    {
    }
}
