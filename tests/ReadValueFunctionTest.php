<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use function SimpleMehanizm\Array\Functions\readValue;

class ReadValueFunctionTest extends TestCase
{
    #[DataProvider('provideInputArrays')]
    function testReturnEarlyIfPathIsEmpty(mixed $expected, array $input, string|null $path = null)
    {
        $this->assertEquals($expected, readValue($input, $path));
    }

    public static function provideInputArrays(): array
    {
        return [
            'depth of 0' => [
                // expected, input (array), path
                ['first-value'], ['first-value'], null
            ],
            'depth of 1' => [
                // expected, input (array), path
                ['ipsum'], ['lorem' => ['ipsum']], 'lorem'
            ],
            'key values with depth of 3, match integers' => [
                3, ['key' => ['another' => ['value' => 3]]], 'key.another.value'
            ],
            'key values with depth of 4, match floats' => [
                13.37, ['key' => ['another' => ['value' => ['float' => 13.37]]]], 'key.another.value.float'
            ],
            'key values with depth of 5, match strings' => [
                'ipsum', ['key' => ['another' => ['value' => ['strings' => ['lorem' => 'ipsum']]]]], 'key.another.value.strings.lorem'
            ],
            'key values with depth of 2, match array value' => [
                ['expected' => ['array' => 'value']], ['key' => ['value' => ['expected' => ['array' => 'value']]]], 'key.value'
            ]
        ];
    }
}