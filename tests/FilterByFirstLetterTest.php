<?php

use PHPUnit\Framework\TestCase;

class FilterByFirstLetterTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $_GET['filter_by_first_letter'] = 'V';
        $this->assertEquals($expected, filterByFirstLetter($input));
    }

    public function positiveDataProvider()
    {
        return [
                [
                    [
                        [
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
                        ]
                    ],
                    []
                ],
                [
                    [
                        [
                            "name" => "Andriy"
                        ],
                        [
                            "name" => "Ivan"
                        ],
                        [
                            "name" => "Yuriy"
                        ],
                        [
                            "name" => "Volodymyr"
                        ],
                        [
                            "name" => "Vitaliy"
                        ],
                        [
                            "name" => "Vlad"
                        ],
                        [
                            "name" => "Stepan"
                        ]
                    ],
                    [
                        [
                            "name" => "Volodymyr"
                        ],
                        [
                            "name" => "Vitaliy"
                        ],
                        [
                            "name" => "Vlad"
                        ]
                    ]
                ],
            [
                [
                    [
                       "name" => "Oksana"
                    ],
                    [
                        "name" => "Oleksandra"
                    ],
                    [
                        "name" => "Svitlana"
                    ],
                    [
                        "name" => "Viktoriya"
                    ],
                    [
                        "name" => "Galyna"
                    ],
                    [
                        "name" => "Iryna"
                    ],
                    [
                        "name" => "Yana"
                    ]
                ],
                [
                    [
                        "name" => "Viktoriya"
                    ]
                ]
            ],
            [
                [
                    [
                        "name" => "Test"
                    ],
                    [
                        "name" => "test"
                    ],
                    [
                        "name" => "test"
                    ],
                    [
                        "name" => "Test"
                    ],
                    [
                        "name" => "Test"
                    ],
                    [
                        "name" => "test"
                    ],
                    [
                        "name" => "Check"
                    ],
                    [
                        "name" => "Alert"
                    ]
                ],
                []
            ],
            [
                [
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
                    ],
                    [
                        "name" => "Test"
                    ]
                ],
                []]
        ];
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($input, $expected) {
        $this->expectException($expected);

        filterByFirstLetter($input);
    }

    public function negativeDataProvider() {
        return [
            [null, TypeError::class],
            [$this, TypeError::class]

        ];
    }
}