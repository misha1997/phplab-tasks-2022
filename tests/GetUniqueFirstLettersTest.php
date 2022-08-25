<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    const PUTH = './src/web/';

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, $input);
    }

    public function positiveDataProvider(): array
    {
        require_once self::PUTH . 'functions.php';
        $airports = require_once(self::PUTH . 'airports.php');
        return [
            [
                getUniqueFirstLetters($airports), 
                ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'Y']
            ],
        ];
    }
}
