<?php declare(strict_types=1);

namespace Symfona\Api\Specification\Tests\Response;

use PHPUnit\Framework\TestCase;
use Symfona\Api\Specification\Response\PaginationResponse;

final class PaginationResponseTest extends TestCase
{
    /**
     * @param int   $count
     * @param array $items
     *
     * @dataProvider dataProvider
     */
    public function testPaginationResponse(int $count, array $items): void
    {
        $response = new PaginationResponse($count, $items);

        $this->assertSame($count, $response->count);
        $this->assertSame($items, $response->items);
    }

    public function dataProvider(): \Generator
    {
        yield ['count' => 0, 'items' => []];
        yield ['count' => 100500, 'items' => [1, 2, 3]];
        yield ['count' => 2, 'items' => [['name' => 'one'], 'name' => 'two']];
    }
}
