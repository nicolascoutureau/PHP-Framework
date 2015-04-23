<?php

namespace App\core\Session;

interface SessionInterface{

    public function get($key);

    public function set($key,$value);

    public function delete($key);
}