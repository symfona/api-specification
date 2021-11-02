<?php declare(strict_types=1);

namespace Symfona\Api\Specification\Response;

final class PaginationResponse
{
    public function __construct(public readonly int $count, public readonly array $items)
    {
    }
}
