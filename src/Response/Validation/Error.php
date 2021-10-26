<?php declare(strict_types=1);

namespace Symfona\Api\Specification\Response\Validation;

use Symfona\Api\Specification\Response\ErrorResponse;

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
