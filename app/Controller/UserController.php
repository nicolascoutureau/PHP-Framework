<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 22/04/15
 * Time: 16:52
 */

namespace App\app\Controller;


use App\App\App;
use App\core\Auth\DBAuth;

class UserController extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'admin';
    }

    public function login(){
        if(!empty($_POST)){
            $app = App::getInstance();
            $auth = new DBAuth($app->getDb(), $app->getSession());

            if($auth->login($_POST['username'], $_POST['password'])){
                $app->getFlash()->set('Bienvenue '. $_POST['username']);
                header('Location: /admin');
                die();
            }else{
                $app->getFlash()->set('Mauvais Login ou mot de passe', 'danger');
            }
        }

        $this->render('user.login', compact('message'));
    }

    public function logout()
    {
        $app = App::getInstance();
        $app->getSession()->delete('auth');
        $app->getFlash()->set('A bientot!');

        header('Location: /');
        die();
    }
    
} 