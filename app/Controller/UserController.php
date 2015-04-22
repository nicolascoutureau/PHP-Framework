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
            $db = App::getInstance()->getDb();
            $auth = new DBAuth($db);

            if($auth->login($_POST['username'], $_POST['password'])){
                header('Location: index.php?page=admin.article.index');
            }else{
                $message = 'Accès interdit';
            }
        }

        $this->render('user.login', compact('message'));
    }
    
} 