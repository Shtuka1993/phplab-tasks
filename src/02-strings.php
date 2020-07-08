<?php
/**
 * The $input variable contains text in snake case (i.e. hello_world or this_is_home_task)
 * Transform it into camel cased string and return (i.e. helloWorld or thisIsHomeTask)
 * @see http://xahlee.info/comp/camelCase_vs_snake_case.html
 *
 * @param  string  $input
 * @return string
 */
function snakeCaseToCamelCase(string $input)
{
    $result = $input;
    foreach ($input as $i=>$c) {
        if($c === '_') {
            $oldLeter = $input[$i+1];
            $newLeter = strtoupper($oldLeter);
            $result = substr_replace($result, $newLeter, $i+1, 1);
        }
    }
    $result = str_replace('_', '', $result);
    return $result;
}

/**
 * The $input variable contains multibyte text like 'ФЫВА олдж'
 * Mirror each word individually and return transformed text (i.e. 'АВЫФ ждло')
 * !!! do not change words order
 *
 * @param  string  $input
 * @return string
 */
function mirrorMultibyteString(string $input)
{
    $words = explode(' ', $input);
    foreach ($words as $word) {
        $word = strrev($word);
    }
    $result = implode(' ', $words);
}

/**
 * My friend wants a new band name for her band.
 * She likes bands that use the formula: 'The' + a noun with first letter capitalized.
 * However, when a noun STARTS and ENDS with the same letter,
 * she likes to repeat the noun twice and connect them together with the first and last letter,
 * combined into one word like so (WITHOUT a 'The' in front):
 * dolphin -> The Dolphin
 * alaska -> Alaskalaska
 * europe -> Europeurope
 * Implement this logic.
 *
 * @param  string  $noun
 * @return string
 */
function getBrandName(string $noun)
{
    $result = '';
    if ($noun[0] === $noun[-1]) {
        $result = ucfirst($noun).substr($noun, 1);
    } else {
        $result = "The ".ucfirst($noun);
    }
    return $result;
}