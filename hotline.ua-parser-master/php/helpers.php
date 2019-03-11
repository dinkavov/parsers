<?php

/**
 * @param array $array
 * @return array
 */
function cleaner($array = array())
{
    $strainer = array("<", ">");
    foreach($array as $num => $xss)
    {
        $array[$num] = str_replace($strainer, "|", $xss);
    }
    return $array;
}

/**
 * @param array $array
 * @return string
 */
function makeQuery( $array = array())
{
    $str = '';

    foreach ($array as $key => $value)
    {
        $str .= '+' . $value;
    }

    return $str;
}