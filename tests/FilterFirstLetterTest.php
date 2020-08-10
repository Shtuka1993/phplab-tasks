<?php

use PHPUnit\Framework\TestCase;

class FilterFirstLetterTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, filterFirstLetter($input));
    }

    public function positiveDataProvider()
    {
        $_GET['filter_by_first_letter'] = 'P';
        return [
                    [
                        [
                            "name" => "Cedar City Regional Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "name" => "Ogden-Hinckley Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "name" => "Provo Municipal Airport"
                        ],
                        true
                    ],
                    [
                        [
                            "name" => "St. George Regional Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "name" => "Lynchburg Regional Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "name" => "Friday Harbor Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "name" => "Tri-Cities Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "name" => "Pullman/Moscow Regional Airport"
                        ],
                        true
                    ]
            ];
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($input, $expected) {
        $this->expectException($expected);

        filterFirstLetter($input);
    }

    public function negativeDataProvider() {
        return [
            [null, TypeError::class],
            [['array'], InvalidArgumentException::class],
            [$this, TypeError::class]

        ];
    }
}