<?php

use PHPUnit\Framework\TestCase;

class CheckSortingStringsTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input1, $input2, $expected)
    {
        $this->assertEquals($expected, checkSortingStrings($input1, $input2));
    }

    public function positiveDataProvider()
    {
        return [
                    [
                        "name", "Test", 1
                    ],
                    [
                        "test", "Test", 1
                    ],
                    [
                        "name", "name", 0
                    ],
                    [
                        "Test", "name", -1
                    ],
                    [
                        "123", "500", -1
                    ],
                    [
                        "name", "test", -1
                    ],
                    [
                        "name", "Check", 1
                    ],
                    [
                        "name", "Alert", 1
                    ],
                    [
                        "test", "test", 0
                    ]
                ];
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($input1, $input2, $expected) {
        $this->expectException($expected);

        checkSortingStrings($input1, $input2);
    }

    public function negativeDataProvider() {
        return [
            [null, null, TypeError::class],
            [['array'], 'string', TypeError::class],
            [$this, 'string', TypeError::class]

        ];
    }
}