<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    /**
     * @dataProvider oneArgumentsNegativeDataProvider
     */
    public function testOneArgumentsNegative($input)
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper($input);
    }

    /**
     * @dataProvider twoArgumentsNegativeDataProvider
     */
    public function testTwoArgumentsNegative($input1, $input2)
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper($input1, $input2);
    }

    /**
     * @dataProvider threeArgumentsNegativeDataProvider
     */
    public function testThreeArgumentsNegative($input1, $input2, $input3)
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper($input1, $input2, $input3);
    }

    /**
     * @dataProvider zeroArgumentsDataProvider
     */
    public function testZeroArguments($expected)
    {
        $this->assertEquals($expected, countArgumentsWrapper());
    }

    /**
     * @dataProvider oneArgumentsDataProvider
     */
    public function testOneArguments($input, $expected)
    {
        $this->assertEquals($expected, countArgumentsWrapper($input));
    }

    /**
     * @dataProvider twoArgumentsDataProvider
     */
    public function testTwoArguments($input1, $input2, $expected)
    {
        $this->assertEquals($expected, countArgumentsWrapper($input1, $input2));
    }

    /**
     * @dataProvider threeArgumentsDataProvider
     */
    public function testThreeArguments($input1, $input2, $input3, $expected)
    {
        $this->assertEquals($expected, countArgumentsWrapper($input1, $input2, $input3));
    }

    /**
     * @dataProvider fiveArgumentsDataProvider
     */
    public function testFiveArguments($input1, $input2, $input3, $input4, $input5, $expected)
    {
        $this->assertEquals($expected, countArgumentsWrapper($input1, $input2, $input3, $input4, $input5));
    }

    public function zeroArgumentsDataProvider()
    {
        return [
            [['argument_count' => 0, 'argument_values' => []]]
        ];
    }

    public function oneArgumentsDataProvider()
    {
        return [
            ['alaska', ['argument_count' => 1, 'argument_values' => ['alaska']]]
        ];
    }

    public function twoArgumentsDataProvider()
    {
        return [
            ['Europe', 'europe', ['argument_count' => 2, 'argument_values' => ['Europe', 'europe']]]
        ];
    }

    public function threeArgumentsDataProvider()
    {
        return [
            ['alaska', 'Php', 'php', ['argument_count' => 3, 'argument_values' => ['alaska', 'Php', 'php']]]
        ];
    }

    public function fiveArgumentsDataProvider()
    {
        return [
            ['The', 'The', 'alaska', 'Php', 'php', ['argument_count' => 5, 'argument_values' => ['The', 'The', 'alaska', 'Php', 'php']]]
        ];
    }

    public function oneArgumentsNegativeDataProvider()
    {
        return [
            [1]
        ];
    }

    public function twoArgumentsNegativeDataProvider()
    {
        return [
            ['Europe', 2]
        ];
    }

    public function threeArgumentsNegativeDataProvider()
    {
        return [
            ['alaska', 3, 'php']
        ];
    }
}