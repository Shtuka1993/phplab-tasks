<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function positiveDataProvider()
    {
        return [
                [[[
                    "name" => "Cedar City Regional Airport"
                ],
                [
                    "name" => "Ogden-Hinckley Airport"
                ],
                [
                    "name" => "Provo Municipal Airport"
                ],
                [
                    "name" => "St. George Regional Airport"
                ],
                [
                    "name" => "Lynchburg Regional Airport"
                ],
                [
                    "name" => "Friday Harbor Airport"
                ],
                [
                    "name" => "Tri-Cities Airport"
                ],
                [
                    "name" => "Pullman/Moscow Regional Airport"
                ]], ['C','F', 'L', 'O', 'P', 'S', 'T']],
            [[[
                "name" => "Test"
                ],
                [
                    "name" => "Test"
                ],
                [
                    "name" => "Test"
                ],
                [
                    "name" => "Test"
                ],
                [
                    "name" => "Test"
                ],
                [
                    "name" => "Test"
                ],
                [
                    "name" => "Test"
                ],
                [
                    "name" => "Test"
                ]], ['T']]
        ];
    }
}