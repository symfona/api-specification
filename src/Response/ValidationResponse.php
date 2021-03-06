<?php declare(strict_types=1);

namespace Symfona\Api\Specification\Response;

use Symfona\Api\Specification\Response\Validation\Error;

final class ValidationResponse
{
    /**
     * @var Error[]
     */
    public readonly array $errors;

    public function __construct(Error ...$errors)
    {
        $this->errors = $errors;
    }
}
