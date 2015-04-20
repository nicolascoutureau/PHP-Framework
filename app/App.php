<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 17:39
 */

namespace App\app;

class App {


    private static $_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    public static function getTable($name)
    {
        return new \App\app\Table\PostTable();
    }


} 