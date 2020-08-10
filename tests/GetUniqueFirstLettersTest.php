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
                    ['C','F', 'L', 'O', 'P', 'S', 'T']
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
                    ['A', 'I', 'S', 'V', 'Y']
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
                ['G', 'I', 'O', 'S', 'V', 'Y']
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
                ['A', 'C', 'T']
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
                ['T']]
        ];
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($input, $expected) {
        $this->expectException($expected);

        getUniqueFirstLetters($input);
    }

    public function negativeDataProvider() {
        return [
            [null, TypeError::class],
            [['array'], InvalidArgumentException::class],
            [$this, TypeError::class]

        ];
    }
}