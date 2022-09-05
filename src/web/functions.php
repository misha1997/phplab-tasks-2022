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
    $fistLetters = array_map(function ($item) {
        return substr($item['name'], 0, 1);
    }, $airports);

    $fistLetters = array_unique($fistLetters);
    sort($fistLetters);

    return $fistLetters;
}

/**
 * @param  array  $airports
 * @return int
 */

function getPagination(array $airports)
{
    return count($airports);
}

/**
 * @param  array  $airports
 * @return array
 */

function getFilteredFirstLetter(array $airports, string $letter)
{
    return array_filter($airports, function ($item) use ($letter) {
        return substr($item['name'], 0, 1) == $letter;
    });
}

/**
 * @param  array  $airports
 * @return array
 */

function getSorted(array $airports, string $sortKey)
{
    usort($airports, function ($a, $b) use ($sortKey) {
        return strcmp($a[$sortKey], $b[$sortKey]);
    });
    return $airports;
}

/**
 * @param  array  $airports
 * @return array
 */

function getFilteredState(array $airports, string $state)
{
    return array_filter($airports, function ($item) use ($state) {
        return $item['state'] == $state;
    });
}

/**
 * @param  string  $key
 * @param  mixed  $value
 * @param  int  $page
 * @return string
 */

function generateUrl($key, $value, $page = 1) 
{
    $params = $_GET;
    $params['page'] = $page;
    $params[$key] = $value;
    return '/?' . http_build_query($params);
}
