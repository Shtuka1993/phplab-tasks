<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 15.08.2020
 * Time: 0:05
 */
namespace oop;

use interfaces\Storage;

class Session implements Storage
{
    private $session;

    /**
     * Session constructor.
     *
     * Creates session and setups variable to access $_SESSION superglobal array by reference
     *
     * @param $superglobal
     */
    public function __construct(&$superglobal)
    {
        session_start();
        $this->session = $superglobal;
    }

    /**
     * Returns all session variables
     *
     * @param array $only
     * @return array
     */
    public function all(array $only = [])
    {
        if(empty($only)) {
            return $this->session;
        } else {
            return [];
        }
    }

    /**
     * Return session variable with provided key
     *
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = null)
    {
        return $this->session[$key]?:$default;
    }

    /**
     * Sets session variable by key and value
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->session[$key] = $value;
    }

    /**
     * Check if we have such session variable
     *
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->session);
    }

    /**
     * Removes session variable by key
     *
     * @param $key
     */
    public function remove($key)
    {
        unset($this->session[$key]);
    }

    /**
     * Clears all session variables
     */
    public function clear()
    {
        session_unset();
    }
}