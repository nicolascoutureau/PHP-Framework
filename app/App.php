<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 17:39
 */

namespace App\App;


use App\core\Auth\DBAuth;
use App\core\config;
use App\core\Database\Database;
use App\core\DIC\DIC;
use App\core\Session\Flash;
use App\core\Session\Session;
use App\Core\Tools\Slug;

class App {


    private static $_instance;
//    private $db_instance;
//    private $session_instance;
//    private $flash_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require_once '../vendor/autoload.php';
        App::getInstance()->registerServices();
    }

    public function getTable($name)
    {
        $class_name = '\App\app\Table\\'.ucfirst($name) . 'Table';
        return new $class_name(DIC::getInstance()->get('Database'));
    }

    public function registerServices()
    {
        $container = DIC::getInstance();

        $container->set('Database', function(){
            $config = Config::getInstance();
            return new Database($config->get('db_name'),$config->get('db_user'),$config->get('db_password'),$config->get('db_host'));
        });

        $container->set('Session', function(){
            return new Session();
        });

        $container->set('Flash', function() use ($container){
            return new Flash($container->get('Session'));
        });

        $container->set('DBAuth', function() use ($container){
            return new DBAuth($container->get('Database'), $container->get('Session'));
        });

        $container->set('Slug', function() use ($container){
            return new Slug($container->get('Database'));
        });
    }

/*    public function getDb()
    {
        if(is_null($this->db_instance)){
            $config = Config::getInstance();
            $this->db_instance = new Database($config->get('db_name'),$config->get('db_user'),$config->get('db_password'),$config->get('db_host'));
        }

        return $this->db_instance;
    }

    public function getSession()
    {
        if(is_null($this->session_instance)){
            $this->session_instance = new Session();
        }

        return $this->session_instance;
    }

    public function getFlash()
    {
        if(is_null($this->flash_instance)){
            $this->flash_instance = new Flash($this->getSession());
        }

        return $this->flash_instance;
    }*/



} 