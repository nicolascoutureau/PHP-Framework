<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 23/04/15
 * Time: 10:53
 */

namespace App\core\Routing;


class Dispatcher {


    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function dispatch()
    {
        $parts = explode('/',(trim($this->url,'/')));

        if($parts[0] == 'admin'){
            $ctrl = 'App\app\Controller\Admin\\'.ucfirst(!empty($parts[1])?$parts[1]:'Index').'Controller';
            $mthd = isset($parts[2])?$parts[2]:"index";

            $args = [];
            for($i=3; $i<count($parts); $i++){
                $args[] = $parts[$i];
            }
        }else{
            $ctrl = 'App\app\Controller\\'.ucfirst(!empty($parts[0])?$parts[0]:'Index').'Controller';
            $mthd = isset($parts[1])?$parts[1]:"index";

            $args = [];
            for($i=2; $i<count($parts); $i++){
                $args[] = $parts[$i];
            }
        }

        call_user_func_array([new $ctrl(), $mthd], $args);

    }

} 