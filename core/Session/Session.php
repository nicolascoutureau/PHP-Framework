<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 23/04/15
 * Time: 11:55
 */

namespace App\core\Session;


class Session implements SessionInterface {

    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function delete($key)
    {
        unset($_SESSION[$key]);
    }
}