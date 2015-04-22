<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 22/04/15
 * Time: 15:20
 */

namespace App\app\Controller;


use App\App\App;

class ArticleController extends BaseController{


    public function index()
    {
        $app = APP::getInstance();
        $articles = $app->getTable('article')->last();
        $categories = $app->getTable('categorie')->all();

        $this->render(
            'article.index',
            compact('articles','categories')
        );
    }

    public function categories()
    {
        $app = App::getInstance();

        $categorie = $app->getTable('categorie')->findById($_GET['id']);
        if(!$categorie){
            $this->notFound();
        }

        $articles = $app->getTable('article')->findLastByCategoryId($_GET['id']);

        $this->render(
            'article.categorie',
            compact('categorie','articles')
        );
    }

    public function show($id)
    {
        $app = APP::getInstance();
        $article = $app->getTable('article')->findById($id);
        if($article === false){
            $this->notFound();
        }

        $this->render(
            'article.single',
            compact('article')
        );
    }

} 