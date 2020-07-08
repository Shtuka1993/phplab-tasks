<?php
/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater then 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter(int $minute)
{
    define("Q1","first");
    define("Q2", "second");
    define("Q3", "third");
    define("Q4", "fourth");

    if (($minute >= 0) AND ($minute <= 60)) {
        if($minute == 0) {
            return Q4;
        }
        $quarter = (int)(($minute-1)/15)+1;
        switch ($quarter) {
            case 1:
                return Q1;
                break;
            case 2:
                return Q2;
                break;
            case 3:
                return Q3;
                break;
            default:
                return Q4;
        }
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower then 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $year
 * @return boolean
 * @throws InvalidArgumentException
 */
function isLeapYear(int $year)
{
    if ($year >= 1900) {
        return ($year % 4) === 0;
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more then 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  string  $input
 * @return boolean
 * @throws InvalidArgumentException
 */
function isSumEqual(string $input)
{
    $s1 = 0;
    $s2= 0;

    if (strlen($input) === 6) {
        for( $i=0; $i<3; $i++ ) {
            $s1 += $input[$i];
            $s2 += $input[5-$i];
        }

        return $s1===$s2;

    } else {
        throw new InvalidArgumentException();
    }
}