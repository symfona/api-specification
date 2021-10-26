<?php declare(strict_types=1);

namespace Symfona\Specification\Api\Response\Validation;

use Symfona\Specification\Api\Response\ErrorResponse;

final class Error
{
    /**
     * @var ErrorResponse[]
     */
    public readonly array $errors;

    public function __construct(public readonly string $path, ErrorResponse ...$errors)
    {
        $this->errors = $errors;
    }
}
