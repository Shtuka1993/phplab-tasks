<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
    * @dataProvider zeroArgumentsDataProvider
    */
    public function testZeroArguments($expected)
    {
        $this->assertEquals($expected, countArguments());
    }

    /**
     * @dataProvider oneArgumentsDataProvider
     */
    public function testOneArguments($input, $expected)
    {
        $this->assertEquals($expected, countArguments($input));
    }

    /**
     * @dataProvider twoArgumentsDataProvider
     */
    public function testTwoArguments($input1, $input2, $expected)
    {
        $this->assertEquals($expected, countArguments($input1, $input2));
    }

    /**
     * @dataProvider threeArgumentsDataProvider
     */
    public function testThreeArguments($input1, $input2, $input3, $expected)
    {
        $this->assertEquals($expected, countArguments($input1, $input2, $input3));
    }

    /**
     * @dataProvider fiveArgumentsDataProvider
     */
    public function testFiveArguments($input1, $input2, $input3, $input4, $input5, $expected)
    {
        $this->assertEquals($expected, countArguments($input1, $input2, $input3, $input4, $input5));
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

}