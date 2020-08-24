<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 15.08.2020
 * Time: 0:04
 */
include_once('Storages.php');

include_once ('ArrayFunctions.php');

class Cookies implements Storages
{
    use ArrayFunctions;

    private $cookies;
    private $duration; // Default duration of cookie - 1 day
    private $path; // Default path - /

    /**
     * Cookies constructor.
     *
     * Creates Cookies object to manipulate with cookies. Set ups setting for cookies. Such as duration and path for cookie.
     *
     * @param int $duration
     * @param string $path
     */
    public function __construct($duration = 86400, $path = '/')
    {
        $this->cookies = $_COOKIE;
        $this->duration = $duration;
        $this->path = $path;
    }

    /**
     * Returns all cookies
     *
     * @param array $only
     * @return array
     */
    public function all(array $only = [])
    {
        if(empty($only)) {

            return $this->cookies;
        } else {

            return $this->searchByKeys($this->cookies, $only);
        }
    }

    /**
     * Return cookie by key
     *
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = 'test'/*null*/)
    {
        return $this->cookies[$key]?:$default;
    }

    /**
     * Sets cookie by key and value
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        setcookie($key, $value);
    }

    /**
     * Checks if such cookie exist
     *
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->cookies[$key]);
    }

    /**,
     * Remove such cookie
     *
     * @param $key
     */
    public function remove($key)
    {
        unset($this->cookies[$key]);
        setcookie($key, "", time() - 3600);
    }
}