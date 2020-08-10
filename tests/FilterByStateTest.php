<?php

use PHPUnit\Framework\TestCase;

class FilterByStateTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $_GET['filter_by_state'] = 'Test';
        $this->assertEquals($expected, filterByState($input));
    }

    public function positiveDataProvider()
    {
        return [
                [
                    [
                        [
                            "state" => "Test"
                        ],
                        [
                            "state" => "Ogden-Hinckley Airport"
                        ],
                        [
                            "state" => "Test"
                        ],
                        [
                            "state" => "St. George Regional Airport"
                        ],
                        [
                            "state" => "Test"
                        ],
                        [
                            "state" => "Friday Harbor Airport"
                        ],
                        [
                            "state" => "Tri-Cities Airport"
                        ],
                        [
                            "state" => "Pullman/Moscow Regional Airport"
                        ]
                    ],
                    [[
                        "state" => "Test"
                    ],
                        [
                            "state" => "Test"
                        ],
                        [
                            "state" => "Test"
                        ]]
                ],
                [
                    [
                        [
                            "state" => "Andriy"
                        ],
                        [
                            "state" => "Ivan"
                        ],
                        [
                            "state" => "Yuriy"
                        ],
                        [
                            "state" => "Volodymyr"
                        ],
                        [
                            "state" => "Vitaliy"
                        ],
                        [
                            "state" => "Vlad"
                        ],
                        [
                            "state" => "Stepan"
                        ]
                    ],
                    []
                ],
            [
                [
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ]
                ],
                [
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ],
                    [
                        "state" => "Test"
                    ]
                ]]
        ];
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($input, $expected) {
        $this->expectException($expected);

        filterByState($input);
    }

    public function negativeDataProvider() {
        return [
            [null, TypeError::class],
            [$this, TypeError::class]

        ];
    }
}