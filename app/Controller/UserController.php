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
use App\core\DIC\DIC;

class UserController extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'admin';
    }

    public function login(){
        if(!empty($_POST)){
            $auth = $this->get('DBAuth');

            if($auth->login($_POST['username'], $_POST['password'])){
                $this->get('Flash')->set('Bienvenue '. $_POST['username']);
                header('Location: /admin');
                die();
            }else{
                $this->get('Flash')->set('Mauvais Login ou mot de passe', 'danger');
            }
        }

        $this->render('user.login', compact('message'));
    }

    public function logout()
    {
        $this->get('Session')->delete('auth');
        $this->get('Flash')->set('A bientot!');

        header('Location: /');
        die();
    }
    
} 