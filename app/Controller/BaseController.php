<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 22/04/15
 * Time: 16:36
 */

namespace App\app\Controller;


use App\core\Controller\Controller;

class BaseController extends Controller{

    public function __construct(){
        parent::__construct();
        $this->layout = 'default';
    }
} 