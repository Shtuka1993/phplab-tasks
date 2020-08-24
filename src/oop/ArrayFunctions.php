<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 23.08.2020
 * Time: 23:18
 */

trait ArrayFunctions
{
    private function searchByKeys(array $array, array $keys) {
        $result = [];
        foreach ($keys as $key) {
            $result[] = $array[$key];
        }

        return array_filter($result, function($value) { return !is_null($value) && $value !== ''; });
    }

}