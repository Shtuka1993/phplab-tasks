<?php

use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, sayHello($input));
    }

    public function positiveDataProvider()
    {
        return [
            ['', 'Hello'],
        ];
    }
}