<?php declare(strict_types=1);

namespace Symfona\Api\Specification\Response;

final class PaginationResponse
{
    public function __construct(public readonly array $items, public readonly int $count)
    {
    }
}
