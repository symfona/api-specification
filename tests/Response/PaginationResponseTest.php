<?php declare(strict_types=1);

namespace Symfona\Api\Specification\Tests\Response;

use PHPUnit\Framework\TestCase;
use Symfona\Api\Specification\Response\PaginationResponse;

final class PaginationResponseTest extends TestCase
{
    /**
     * @param array $items
     * @param int   $count
     *
     * @dataProvider dataProvider
     */
    public function testPaginationResponse(array $items, int $count): void
    {
        $response = new PaginationResponse($items, $count);

        $this->assertSame($items, $response->items);
        $this->assertSame($count, $response->count);
    }

    public function dataProvider(): \Generator
    {
        yield ['items' => [], 'count' => 0];
        yield ['items' => [1, 2, 3], 'count' => 100500];
        yield ['items' => [['name' => 'one'], 'name' => 'two'], 'count' => 2];
    }
}
