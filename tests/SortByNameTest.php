<?php

use PHPUnit\Framework\TestCase;

class SortByNameTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input1, $input2, $expected)
    {
        $this->assertEquals($expected, sortByName($input1, $input2));
    }

    public function positiveDataProvider()
    {
        return [
                    [
                        [
                            "name" => "Cedar City Regional Airport"
                        ],
                        [
                            "name" => "Ogden-Hinckley Airport"
                        ],
                        -1
                    ],
                    [
                        [
                            "name" => "Provo Municipal Airport"
                        ],
                        [
                            "name" => "St. George Regional Airport"
                        ],
                        -1
                    ],
                    [
                        [
                            "name" => "Lynchburg Regional Airport"
                        ],
                        [
                            "name" => "Friday Harbor Airport"
                        ],
                        1
                    ],
                    [
                        [
                            "name" => "Tri-Cities Airport"
                        ],
                        [
                            "name" => "Pullman/Moscow Regional Airport"
                        ],
                        1
                    ],
            [
                [
                    "name" => "Test"
                ],
                [
                    "name" => "Test"
                ],
                0
            ]
            ];
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($input1, $input2, $expected) {
        $this->expectException($expected);

        sortByName($input1, $input2);
    }

    public function negativeDataProvider() {
        return [
            [null, null, TypeError::class],
            [['array'], [], InvalidArgumentException::class],
            [$this, [], TypeError::class]

        ];
    }
}