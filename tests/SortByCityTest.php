<?php

use PHPUnit\Framework\TestCase;

class SortByCityTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input1, $input2, $expected)
    {
        $this->assertEquals($expected, sortByCity($input1, $input2));
    }

    public function positiveDataProvider()
    {
        return [
                    [
                        [
                            "city" => "Cedar City Regional Airport"
                        ],
                        [
                            "city" => "Ogden-Hinckley Airport"
                        ],
                        -1
                    ],
                    [
                        [
                            "city" => "Provo Municipal Airport"
                        ],
                        [
                            "city" => "St. George Regional Airport"
                        ],
                        -1
                    ],
                    [
                        [
                            "city" => "Lynchburg Regional Airport"
                        ],
                        [
                            "city" => "Friday Harbor Airport"
                        ],
                        1
                    ],
                    [
                        [
                            "city" => "Tri-Cities Airport"
                        ],
                        [
                            "city" => "Pullman/Moscow Regional Airport"
                        ],
                        1
                    ],
            [
                [
                    "city" => "Test"
                ],
                [
                    "city" => "Test"
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

        sortByCity($input1, $input2);
    }

    public function negativeDataProvider() {
        return [
            [null, null, TypeError::class],
            [['array'], [], InvalidArgumentException::class],
            [$this, [], TypeError::class]

        ];
    }
}