<?php

namespace app\helpers;

/**
 * PHP additional features
 * Class PhpHelper
 *
 * @package app\helpers
 */
class PhpHelper
{
    /**
     * isset() with default value
     *
     * @param      $var
     * @param null $default
     *
     * @return mixed
     */
    public static function issetDef($var, $default = NULL)
    {
        if (isset($var)) {
            return $var;
        } else {
            return $default;
        }
    }
    
    /**
     * isset() in arrays with default value
     *
     * @param      $array
     * @param      $key
     * @param null $default
     *
     * @return mixed
     */
    public static function issetDefArr($array, $key, $default = NULL)
    {
        if (isset($array[$key])) {
            return $array[$key];
        } else {
            return $default;
        }
    }
    
    /**
     * Find subarrays in array with specified key-value pairs
     *
     * @param       $searchKey
     * @param       $searchValue
     * @param array $array
     *
     * @return array
     */
    public static function subarrayFindByKeyValue($searchKey, $searchValue, array $array)
    {
        $resultArray = [];
        foreach ($array as $subArray) {
            if (isset($subArray[$searchKey]) && $subArray[$searchKey] == $searchValue) {
                $resultArray[] = $subArray;
            }
        }
        return $resultArray;
    }
}