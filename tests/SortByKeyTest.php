<?php

use PHPUnit\Framework\TestCase;

class SortByKeyTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($array, $key, $expected)
    {
        $this->assertEquals($expected, sortByKey($array, $key));
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
                    'name',
                    [
                        [
                            "name" => "Cedar City Regional Airport"
                        ],
                        [
                            "name" => "Friday Harbor Airport"
                        ],
                        [
                            "name" => "Lynchburg Regional Airport"
                        ],
                        [
                            "name" => "Ogden-Hinckley Airport"
                        ],
                        [
                            "name" => "Provo Municipal Airport"
                        ],
                        [
                            "name" => "Pullman/Moscow Regional Airport"
                        ],
                        [
                            "name" => "St. George Regional Airport"
                        ],
                        [
                            "name" => "Tri-Cities Airport"
                        ]
                    ]
                ],[
                [
                    [
                        "state" => "Cedar City Regional Airport"
                    ],
                    [
                        "state" => "Ogden-Hinckley Airport"
                    ],
                    [
                        "state" => "Provo Municipal Airport"
                    ],
                    [
                        "state" => "St. George Regional Airport"
                    ],
                    [
                        "state" => "Lynchburg Regional Airport"
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
                'state',
                [
                    [
                        "state" => "Cedar City Regional Airport"
                    ],
                    [
                        "state" => "Friday Harbor Airport"
                    ],
                    [
                        "state" => "Lynchburg Regional Airport"
                    ],
                    [
                        "state" => "Ogden-Hinckley Airport"
                    ],
                    [
                        "state" => "Provo Municipal Airport"
                    ],
                    [
                        "state" => "Pullman/Moscow Regional Airport"
                    ],
                    [
                        "state" => "St. George Regional Airport"
                    ],
                    [
                        "state" => "Tri-Cities Airport"
                    ]
                ]
            ],[
                [
                    [
                        "code" => "Cedar City Regional Airport"
                    ],
                    [
                        "code" => "Ogden-Hinckley Airport"
                    ],
                    [
                        "code" => "Provo Municipal Airport"
                    ],
                    [
                        "code" => "St. George Regional Airport"
                    ],
                    [
                        "code" => "Lynchburg Regional Airport"
                    ],
                    [
                        "code" => "Friday Harbor Airport"
                    ],
                    [
                        "code" => "Tri-Cities Airport"
                    ],
                    [
                        "code" => "Pullman/Moscow Regional Airport"
                    ]
                ],
                'code',
                [
                    [
                        "code" => "Cedar City Regional Airport"
                    ],
                    [
                        "code" => "Friday Harbor Airport"
                    ],
                    [
                        "code" => "Lynchburg Regional Airport"
                    ],
                    [
                        "code" => "Ogden-Hinckley Airport"
                    ],
                    [
                        "code" => "Provo Municipal Airport"
                    ],
                    [
                        "code" => "Pullman/Moscow Regional Airport"
                    ],
                    [
                        "code" => "St. George Regional Airport"
                    ],
                    [
                        "code" => "Tri-Cities Airport"
                    ]
                ]
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
                    'name',
                    [
                        [
                            "name" => "Andriy"
                        ],
                        [
                            "name" => "Ivan"
                        ],
                        [
                            "name" => "Stepan"
                        ],
                        [
                            "name" => "Vitaliy"
                        ],
                        [
                            "name" => "Vlad"
                        ],
                        [
                            "name" => "Volodymyr"
                        ],
                        [
                            "name" => "Yuriy"
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
                'name',
                [
                    [
                        "name" => "Galyna"
                    ],
                    [
                        "name" => "Iryna"
                    ],
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
                        "name" => "Yana"
                    ]
                ]
            ],
            [
                [],
                'name',
                []
            ]
        ];
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($array, $key, $expected) {
        $this->expectException($expected);

        sortByKey($array, $key);
    }

    public function negativeDataProvider() {
        return [
            [null, 'name', TypeError::class],
            [['array', 'array'], 'name', InvalidArgumentException::class],
            [['array'], 'name', InvalidArgumentException::class],
            [$this, 'name', TypeError::class],
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
                'name1',
                InvalidArgumentException::class
            ]
        ];
    }
}