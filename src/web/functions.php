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
    if (is_array($airports)) {
        $letters = [];
        foreach ($airports as $var) {
            if (is_array($var)) {
                if ((array_key_exists('name', $var))) {
                    $letters[] = strtoupper(getFirstLetter($var));
                } else {
                    throw new InvalidArgumentException();
                }
            } else {
                throw new InvalidArgumentException();
            }
        }
        $letters = array_unique($letters);
        sort($letters);

        return $letters;
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * Returns first letter of airports array item name
 *
 * @param array $var
 * @return mixed
 */
function getFirstLetter(array $var)
{
    if(array_key_exists('name', $var)) {

        return $var['name'][0];
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * Return airport array filtered by first letter
 *
 * @param array $array
 * @return array
 */
function filterByFirstLetter(array $array)
{
    return array_values(array_filter($array, 'filterFirstLetter'));
}

/**
 * Callback function for filtering by first letter
 *
 * @param array $var
 * @return bool
 */
function filterFirstLetter(array $var)
{
    if(array_key_exists('name', $var)) {
        return getFirstLetter($var) === $_GET['filter_by_first_letter'];
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * Sort array by key
 *
 * @param array $array
 * @param string $key
 * @return array
 */
function sortByKey(array $array, string $key)
{
    $callback = 'sortBy' . ucfirst($key);
    if (function_exists($callback)) {
        if(count($array) !== 1) {
            try {
                usort($array, $callback);

                return $array;
            } catch (Error $e) {
                throw new InvalidArgumentException();
            }
        } elseif(is_array($array[0]) && array_key_exists($key, $array[0])) {
            return $array;
        }
    }
    throw new InvalidArgumentException();
}

/**
 * Function that generate result for sorting callback function when we check to strings
 *
 * @param string $var1
 * @param string $var2
 * @return int
 */
function checkSortingStrings(string $var1, string $var2) {
    if ($var1 === $var2) {

        return 0;
    }

    return ($var1 < $var2) ? -1 : 1;
}

/**
 * Callback function that apply sorting by name
 *
 * @param array $var1
 * @param array $var2
 * @return int
 */
function sortByName(array $var1, array $var2)
{
    if(array_key_exists('name', $var1) && array_key_exists('name', $var2)) {
        $var1 = $var1['name'];
        $var2 = $var2['name'];

        return checkSortingStrings($var1, $var2);
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * Callback function that apply sorting by code
 *
 * @param array $var1
 * @param array $var2
 * @return int
 */
function sortByCode(array $var1, array $var2)
{
    if(array_key_exists('code', $var1) && array_key_exists('code', $var2)) {
        $var1 = $var1['code'];
        $var2 = $var2['code'];

        return checkSortingStrings($var1, $var2);
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * Callback function that apply sorting by state
 *
 * @param array $var1
 * @param array $var2
 * @return int
 */
function sortByState(array $var1, array $var2)
{
    if(array_key_exists('state', $var1) && array_key_exists('state', $var2)) {
        $var1 = $var1['state'];
        $var2 = $var2['state'];

        return checkSortingStrings($var1, $var2);
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * Callback function that apply sorting by city
 *
 * @param array $var1
 * @param array $var2
 * @return int
 */
function sortByCity(array $var1, array $var2)
{
    if(array_key_exists('city', $var1) && array_key_exists('city', $var2)) {
        $var1 = $var1['city'];
        $var2 = $var2['city'];

        return checkSortingStrings($var1, $var2);
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * Return airport array filtered by state
 *
 * @param array $array
 * @return array
 */
function filterByState(array $array)
{
    return array_values(array_filter($array, 'filterState'));
}

/**
 * Callback function for filtering by state
 *
 * @param array $var
 * @return bool
 */
function filterState(array $var)
{
    if(array_key_exists('state', $var)) {
        return $var['state'] === $_GET['filter_by_state'];
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * Generate request URL
 *
 * @param array $request
 * @param string $key
 * @param string $value
 * @param bool $resetPage
 * @return string
 */
function generateURL(array $request, string $key, string $value, bool $resetPage)
{
    $request[$key] = $value;
    if ($resetPage) {
        $request['page'] = 1;
    }
    $result = [];
    foreach ($request as $key => $value) {
        $result[] = $key . '=' . $value;
    }

    return '/?'.implode("&", $result);
}

/**
 * Return count of page
 *
 * @param array $array
 * @param int $per_page
 * @return float|int
 */
function pagination(array $array, int $per_page)
{
    $pages = (count($array) / $per_page);
    $pagesInt = (int)(count($array) / $per_page);
    $pages = ($pagesInt < $pages) ? ($pagesInt + 1) : $pagesInt;

    return $pages;
}

/**
 * Filters array by current page
 *
 * @param array $array
 * @param int $per_page
 * @param int $page
 * @return array
 */
function getPagination(array $array, int $per_page, int $page)
{

    return array_slice($array, ($page - 1) * $per_page, $per_page);
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