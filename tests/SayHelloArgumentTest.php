<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($input));
    }

    public function positiveDataProvider()
    {
        return [
            ['dolphin', 'Hello dolphin'],
            ['alaska', 'Hello alaska'],
            ['europe', 'Hello europe'],
            ['php', 'Hello php'],
            ['the', 'Hello the'],
            [1, 'Hello 1'],
            [2, 'Hello 2'],
            [true, 'Hello 1'],
            [false, 'Hello ']
        ];
    }
}