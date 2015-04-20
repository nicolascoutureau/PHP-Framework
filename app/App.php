<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 17:39
 */

namespace App\app;

use App\app\Database\Database;

class App {


    private static $_instance;
    private $db_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    public function getTable($name)
    {
        $class_name = '\App\app\Table\\'.ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        if(is_null($this->db_instance)){
            $config = config::getInstance();
            $this->db_instance = new Database($config->get('db_name'),$config->get('db_user'),$config->get('db_password'),$config->get('db_host'));
        }

        return $this->db_instance;
    }


} 