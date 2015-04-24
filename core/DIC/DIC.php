<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 24/04/15
 * Time: 10:30
 */

namespace App\core\DIC;


class DIC {

    private $registry = [];
    private $instances = [];
    private $uniqid;
    private static $_instance;

    private function __construct()
    {
        $this->uniqid = uniqid();
    }

    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance = new DIC();
        }
        return self::$_instance;
    }


    public function set($key, Callable $resolver)
    {
        $this->registry[$key] = $resolver;
    }

    public function get($key)
    {
        if(!array_key_exists($key,$this->registry)){
            throw new \Exception($key . ' N\'existe pas dans le container');
        }

        if(!array_key_exists($key,$this->instances)) {
            $this->instances[$key] = $this->registry[$key]();
        }

        return $this->instances[$key];
    }


} 