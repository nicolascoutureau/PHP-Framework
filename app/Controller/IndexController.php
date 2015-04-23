<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 23/04/15
 * Time: 10:49
 */

namespace App\app\Controller;


class IndexController extends BaseController {

    public function index()
    {
        $this->render('index.index');
    }

} 