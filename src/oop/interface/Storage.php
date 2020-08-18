<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 15.08.2020
 * Time: 15:17
 */

namespace interfaces;


interface Storage
{
    public function all(array $only = []);

    public function get($key, $default = null);

    public function set($key, $value);

    public function has($key);

    public function remove($key);

}