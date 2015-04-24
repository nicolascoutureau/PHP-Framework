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
use App\core\DIC\DIC;

class AdminBaseController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'admin';

        // Auth
        $auth = $this->get('DBAuth');

        if(!$auth->logged()) {
            header('Location: /user/login');
        }
    }

} 