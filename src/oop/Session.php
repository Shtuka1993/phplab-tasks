<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 15.08.2020
 * Time: 0:05
 */

include_once('Storages.php');

include_once ('ArrayFunctions.php');

class Session implements Storages
{
    use ArrayFunctions;

    private $session;

    /**
     * Session constructor.
     *
     * Creates session and setups variable to access $_SESSION superglobal array by reference
     */
    public function __construct()
    {
        session_start();
        $this->session = &$_SESSION;
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

            return $this->searchByKeys($this->session, $only);
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
        return isset($this->session[$key]);
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
        session_destroy();
        $this->session = [];
    }
}