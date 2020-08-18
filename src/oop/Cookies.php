<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 15.08.2020
 * Time: 0:04
 */
namespace oop;

use interfaces\Storage;

class Cookies implements Storage
{
    private $cookies;
    private $duration; // Default duration of cookie - 1 day
    private $path; // Default path - /

    /**
     * Cookies constructor.
     *
     * Creates Cookies object to manipulate with cookies. Set ups setting for cookies. Such as duration and path for cookie.
     *
     * @param $superglobal
     * @param int $duration
     * @param string $path
     */
    public function __construct($superglobal , $duration = 86400, $path = '/')
    {
        $this->cookies = $superglobal;
        $this->duration = $duration;
        $this->path = $path;
    }

    /**
     * @param array $only
     * @return array
     */
    public function all(array $only = [])
    {
        if(empty($only)) {
            return $this->cookies;
        } else {
            return [];
        }
    }

    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = null)
    {
        return $this->cookies[$key]?:$default;
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        setcookie($key, $value, time() + $this->duration, $this->path);
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->cookies);
    }

    /**
     * @param $key
     */
    public function remove($key)
    {
        setcookie($key, "", time() - 3600);
    }
}