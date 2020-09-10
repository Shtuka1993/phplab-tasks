<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 15.08.2020
 * Time: 0:02
 */

include_once('../Interfaces/Requests.php');

include_once('Cookies.php');
include_once('Session.php');

include_once('../Traits/ArrayFunctions.php');

class Request implements Requests
{
    use ArrayFunctions;

    public $cookies;
    public $session;

    private $get;
    private $post;
    private $ip;
    private $userAgent;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->cookies = new Cookies($_COOKIE);
        $this->session = new Session($_SESSION);
        $this->get = $_GET;
        $this->post = $_POST;
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public function query($key, $default = null)
    {
        return $this->get[$key]?:$default;
    }

    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public function post($key, $default = null)
    {
        return $this->post[$key]?:$default;
    }

    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = null)
    {
        return ($this->post($key))?:($this->query($key, $default));
    }

    /**
     * @param array $only
     * @return array
     */
    public function all(array $only = [])
    {
        $result = array_merge($this->get, $this->post);
        if(empty($only)) {

            return $result;
        } else {

            return $this->searchByKeys($result, $only);
        }
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->all());
    }

    /**
     * @return mixed
     */
    public function ip()
    {
        return $this->ip;
    }

    /**
     * @return mixed
     */
    public function userAgent()
    {
        return $this->userAgent;
    }



}