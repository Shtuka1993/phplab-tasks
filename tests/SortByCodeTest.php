<?php

use PHPUnit\Framework\TestCase;

class SortByCodeTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input1, $input2, $expected)
    {
        $this->assertEquals($expected, sortByCode($input1, $input2));
    }

    public function positiveDataProvider()
    {
        return [
                    [
                        [
                            "code" => "Cedar City Regional Airport"
                        ],
                        [
                            "code" => "Ogden-Hinckley Airport"
                        ],
                        -1
                    ],
                    [
                        [
                            "code" => "Provo Municipal Airport"
                        ],
                        [
                            "code" => "St. George Regional Airport"
                        ],
                        -1
                    ],
                    [
                        [
                            "code" => "Lynchburg Regional Airport"
                        ],
                        [
                            "code" => "Friday Harbor Airport"
                        ],
                        1
                    ],
                    [
                        [
                            "code" => "Tri-Cities Airport"
                        ],
                        [
                            "code" => "Pullman/Moscow Regional Airport"
                        ],
                        1
                    ],
                    [
                        [
                            "code" => "Test"
                        ],
                        [
                            "code" => "Test"
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

        sortByCode($input1, $input2);
    }

    public function negativeDataProvider() {
        return [
            [null, null, TypeError::class],
            [['array'], [], InvalidArgumentException::class],
            [$this, [], TypeError::class]

        ];
    }
}