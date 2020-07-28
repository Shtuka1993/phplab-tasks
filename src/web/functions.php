<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param  array  $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports)
{
    $letters = [];
    foreach ($airports as $var) {
        $letters[] = getFirstLetter($var);
    }
    $letters = array_unique($letters);
    sort($letters);

    return $letters;
}

/**
 * Returns first letter of airports array item name
 *
 * @param $var
 * @return mixed
 */
function getFirstLetter($var)
{

    return $var['name'][0];
}

/**
 * Return airport array filtered by first letter
 *
 * @param $array
 * @param $key
 * @return array
 */
function filterByFirstLetter($array, $key)
{
    define('FIRST_LETTER', $key);

    return array_filter($array, 'filterFirstLetter');
}

/**
 * Callback function for filtering by first letter
 *
 * Use constant FIRST_LETTER as key
 *
 * @param $var
 * @return bool
 */
function filterFirstLetter($var)
{

    return getFirstLetter($var) === FIRST_LETTER;
}

/**
 * Sort array by key
 *
 * @param $array
 * @param $key
 * @return mixed
 */
function sortByKey($array, $key)
{
    usort($array, 'sortBy'.ucfirst($key));

    return $array;
}

/**
 * Function that generate result for sorting callback function when we check to strings
 *
 * @param $var1
 * @param $var2
 * @return int
 */
function checkSortingStrings($var1, $var2) {
    if ($var1 === $var2) {

        return 0;
    }

    return ($var1 < $var2) ? -1 : 1;
}

/**
 * Callback function that apply sorting by name
 *
 * @param $var1
 * @param $var2
 * @return int
 */
function sortByName($var1, $var2)
{
    $var1 = $var1['name'];
    $var2 = $var2['name'];

    return checkSortingStrings($var1, $var2);
}

/**
 * Callback function that apply sorting by code
 *
 * @param $var1
 * @param $var2
 * @return int
 */
function sortByCode($var1, $var2)
{
    $var1 = $var1['code'];
    $var2 = $var2['code'];

    return checkSortingStrings($var1, $var2);
}

/**
 * Callback function that apply sorting by state
 *
 * @param $var1
 * @param $var2
 * @return int
 */
function sortByState($var1, $var2)
{
    $var1 = $var1['state'];
    $var2 = $var2['state'];

    return checkSortingStrings($var1, $var2);
}

/**
 * Callback function that apply sorting by city
 *
 * @param $var1
 * @param $var2
 * @return int
 */
function sortByCity($var1, $var2)
{
    $var1 = $var1['city'];
    $var2 = $var2['city'];

    return checkSortingStrings($var1, $var2);
}

/**
 * Return airport array filtered by state
 *
 * @param $array
 * @param $key
 * @return array
 */
function filterByState($array, $key)
{
    define('STATE', $key);

    return array_filter($array, 'filterState');
}

/**
 * Callback function for filtering by state
 *
 * @param $var
 * @return bool
 */
function filterState($var)
{

    return $var['state'] === STATE;
}

/**
 * Generate request URL
 *
 * @param $array
 * @param $page
 */
function generateURL($request, $key, $value, $resetPage)
{
    $request[$key] = $value;
    if ($resetPage) {
        $request['page'] = 1;
    }
    $result = [];
    foreach ($request as $key => $value) {
        $result[] = $key.'='.$value;
    }

    return '/?'.implode("&", $result);
}

/**
 * Return count of page
 *
 * @param $array
 * @param $per_page
 * @return float|int
 */
function pagination($array, $per_page)
{
    $pages = (int)( count($array) / 5 );

    return $pages;
}

/**
 * Filters array by current page
 *
 * @param $array
 * @param $per_page
 * @param $page
 * @return array
 */
function getPagination($array, $per_page, $page)
{

    return array_slice($array, ( $page - 1 ) * $per_page, $per_page);
}

/**
 * Reset current pagination page
 *
 * @return bool
 */
function resetPage() {
    $_GET['page'] = 1;

    return true;
}