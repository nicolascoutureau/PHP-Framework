<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 22/04/15
 * Time: 16:34
 */

namespace App\app\Controller\Admin;


use App\App\App;
use App\core\Auth\DBAuth;
use App\core\Controller\Controller;

class AdminBaseController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'admin';

        // Auth
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());

        if(!$auth->logged()) {
            header('Location: /user/login');
        }
    }

} 