<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 17:16
 */

namespace App\app;


class config{

    private $settings = [];
    private static $_instance;

    // Singleton
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new config();
        }
        return self::$_instance;
    }

    // Lit le fichier de config
    private function __construct()
    {
        $this->settings = require dirname(__DIR__).'/config/config.php';
    }

    /**
     * Retourne un paramètre de config
     * @param $key
     * @return null
     */
    public function get($key){

        if(!isset($this->settings[$key])){
            return null;
        }

        return $this->settings[$key];
    }

} 