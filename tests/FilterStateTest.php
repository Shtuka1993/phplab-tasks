<?php

use PHPUnit\Framework\TestCase;

class FilterStateTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, filterState($input));
    }

    public function positiveDataProvider()
    {
        $_GET['filter_by_state'] = 'Test';
        return [
                    [
                        [
                            "state" => "Cedar City Regional Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "state" => "Ogden-Hinckley Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "state" => "Test"
                        ],
                        true
                    ],
                    [
                        [
                            "state" => "St. George Regional Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "state" => "Lynchburg Regional Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "state" => "Friday Harbor Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "state" => "Tri-Cities Airport"
                        ],
                        false
                    ],
                    [
                        [
                            "state" => "Test"
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

        filterState($input);
    }

    public function negativeDataProvider() {
        return [
            [null, TypeError::class],
            [['array'], InvalidArgumentException::class],
            [$this, TypeError::class]

        ];
    }
}