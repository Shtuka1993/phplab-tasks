<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 15.08.2020
 * Time: 14:46
 */

namespace interfaces;


interface Request
{
    public function query($key, $default = null);

    public function post($key, $default = null);

    public function get($key, $default = null);

    public function all(array $only = []);

    public function has($key);

}