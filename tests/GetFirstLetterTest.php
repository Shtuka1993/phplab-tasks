<?php

use PHPUnit\Framework\TestCase;

class GetFirstLetterTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getFirstLetter($input));
    }

    public function positiveDataProvider()
    {
        return [
                    [
                        [
                            "name" => "Cedar City Regional Airport"
                        ],
                        'C'
                    ],
                    [
                        [
                            "name" => "Ogden-Hinckley Airport"
                        ],
                        'O'
                    ],
                    [
                        [
                            "name" => "Provo Municipal Airport"
                        ],
                        'P'
                    ],
                    [
                        [
                            "name" => "St. George Regional Airport"
                        ],
                        'S'
                    ],
                    [
                        [
                            "name" => "Lynchburg Regional Airport"
                        ],
                        'L'
                    ],
                    [
                        [
                            "name" => "Friday Harbor Airport"
                        ],
                        'F'
                    ],
                    [
                        [
                            "name" => "Tri-Cities Airport"
                        ],
                        'T'
                    ],
                    [
                        [
                            "name" => "Pullman/Moscow Regional Airport"
                        ],
                        'P'
                    ],
                    [
                        [
                            "name" => 'test'
                        ],
                        't'
                    ]
        ];
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($input, $expected) {
        $this->expectException($expected);

        getFirstLetter($input);
    }

    public function negativeDataProvider() {
        return [
            [null, TypeError::class],
            [['array'], InvalidArgumentException::class],
            [$this, TypeError::class]

        ];
    }
}