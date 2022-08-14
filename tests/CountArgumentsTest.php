<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($expected, ...$input)
    {
        $this->assertEquals($expected, $this->functions->countArguments(...$input));
    }

    public function positiveDataProvider(): array
    {
        return [
            [
                [
                    'argument_count' => 0, 
                    'argument_values' => []
                ],
            ],
            [
                [
                    'argument_count' => 1, 
                    'argument_values' => ['test']
                ], 
                'test'
            ],
            [
                [
                    'argument_count' => 2, 
                    'argument_values' => ['test1', 'test2']
                ], 
                'test1', 'test2'
            ],
        ];
    }
}