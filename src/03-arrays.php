<?php
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param  array $input
 * @return array
 */
function repeatArrayValues(array $input)
{
    $result = [];
    foreach ($input as $item) {
        for ($i = 1; $i <= $item; $i++) {
            $result[] = $item;
        }
    }

    return $result;
}

/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param  array $input
 * @return int
 */
function getUniqueValue(array $input)
{
    $unic = [];
    $minUnic = PHP_INT_MAX;
    $ununic = [];
    $length = count($input);
    if ($length === 0) {

        return 0;
    } else {
        for ($i = 0; $i < $length; $i++) {
            if (in_array($input[$i], $ununic)) {
                continue;
            }
            $matches = 0;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($input[$i] === $input[$j]) {
                    $matches++;
                }
            }
            if ($matches === 0) {
                $minUnic = ($input[$i] < $minUnic) ? $input[$i] : $minUnic;
                $unic[] = $input[$i];
            } else {
                $ununic[] = $input[$i];
            }
        }

        return ($minUnic === PHP_INT_MAX)?0:$minUnic;
    }
}

/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param  array $input
 * @return array
 */
function groupByTag(array $input)
{
}