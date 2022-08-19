<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testException(...$input): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->countArgumentsWrapper(...$input);
    }

    public function negativeDataProvider(): array
    {
        return [
            [[]],
            [NULL],
            [new stdClass()],
            [2022]
        ];
    }
}