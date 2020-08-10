<?php

use PHPUnit\Framework\TestCase;

class SortByStateTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input1, $input2, $expected)
    {
        $this->assertEquals($expected, sortByState($input1, $input2));
    }

    public function positiveDataProvider()
    {
        return [
                    [
                        [
                            "state" => "Cedar City Regional Airport"
                        ],
                        [
                            "state" => "Ogden-Hinckley Airport"
                        ],
                        -1
                    ],
                    [
                        [
                            "state" => "Provo Municipal Airport"
                        ],
                        [
                            "state" => "St. George Regional Airport"
                        ],
                        -1
                    ],
                    [
                        [
                            "state" => "Lynchburg Regional Airport"
                        ],
                        [
                            "state" => "Friday Harbor Airport"
                        ],
                        1
                    ],
                    [
                        [
                            "state" => "Tri-Cities Airport"
                        ],
                        [
                            "state" => "Pullman/Moscow Regional Airport"
                        ],
                        1
                    ],
            [
                [
                    "state" => "Test"
                ],
                [
                    "state" => "Test"
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

        sortByState($input1, $input2);
    }

    public function negativeDataProvider() {
        return [
            [null, null, TypeError::class],
            [['array'], [], InvalidArgumentException::class],
            [$this, [], TypeError::class]

        ];
    }
}