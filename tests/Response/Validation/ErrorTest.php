<?php declare(strict_types=1);

namespace Symfona\Api\Specification\Tests\Response\Validation;

use PHPUnit\Framework\TestCase;
use Symfona\Api\Specification\Response\ErrorResponse;
use Symfona\Api\Specification\Response\Validation\Error;

final class ErrorTest extends TestCase
{
    /**
     * @param string        $path
     * @param ErrorResponse ...$errors
     *
     * @dataProvider dataProvider
     */
    public function testErrorResponse(string $path, ErrorResponse ...$errors): void
    {
        $error = new Error($path, ...$errors);

        $this->assertSame($path, $error->path);
        $this->assertSame($errors, $error->errors);
    }

    public function dataProvider(): \Generator
    {
        yield ['path' => 'name'];
        yield ['path' => 'entity.email', 'errors' => new ErrorResponse('validation.email', ['exists' => true])];
    }
}
