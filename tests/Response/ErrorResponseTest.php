<?php declare(strict_types=1);

namespace Symfona\Specification\Api\Tests\Response;

use PHPUnit\Framework\TestCase;
use Symfona\Specification\Api\Response\ErrorResponse;

final class ErrorResponseTest extends TestCase
{
    /**
     * @param string $message
     * @param array  $parameters
     *
     * @dataProvider dataProvider
     */
    public function testErrorResponse(string $message, array $parameters): void
    {
        $response = new ErrorResponse($message, $parameters);

        $this->assertSame($message, $response->message);
        $this->assertSame($parameters, $response->parameters);
    }

    public function dataProvider(): \Generator
    {
        yield ['message' => 'error.service.bad_gateway', 'parameters' => []];
        yield ['message' => 'error.service.unavailable', 'parameters' => ['service' => 'MySQL']];
    }
}
