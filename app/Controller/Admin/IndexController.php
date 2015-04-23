<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 23/04/15
 * Time: 14:19
 */

namespace App\app\Controller\Admin;


use App\App\App;

class IndexController extends AdminBaseController{

    public function index()
    {
        $articles = App::getInstance()->getTable('article')->all();

        $this->render('admin.article.index', compact('articles'));
    }

} 