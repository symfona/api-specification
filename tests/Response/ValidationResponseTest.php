<?php declare(strict_types=1);

namespace Symfona\Api\Specification\Tests\Response;

use PHPUnit\Framework\TestCase;
use Symfona\Api\Specification\Response\ErrorResponse;
use Symfona\Api\Specification\Response\Validation\Error;
use Symfona\Api\Specification\Response\ValidationResponse;

final class ValidationResponseTest extends TestCase
{
    /**
     * @param Error ...$errors
     *
     * @dataProvider dataProvider
     */
    public function testValidationResponse(Error ...$errors): void
    {
        $response = new ValidationResponse(...$errors);

        $this->assertObjectHasAttribute('errors', $response);
        $this->assertIsIterable($response->errors);
        $this->assertSame($errors, $response->errors);
    }

    public function dataProvider(): \Generator
    {
        yield [
            new Error('name',
                new ErrorResponse('validation.name.not_blank'),
            ),
            new Error('email',
                new ErrorResponse('validation.name.length', ['min' => 3]),
                new ErrorResponse('validation.name.exists'),
            ),
        ];
    }
}
