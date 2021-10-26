<?php declare(strict_types=1);

namespace Symfona\Specification\Api\Tests\Response;

use PHPUnit\Framework\TestCase;
use Symfona\Specification\Api\Response\ErrorResponse;
use Symfona\Specification\Api\Response\Validation\Error;
use Symfona\Specification\Api\Response\ValidationResponse;

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
