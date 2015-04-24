<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 22/04/15
 * Time: 15:20
 */

namespace App\app\Controller;


use App\App\App;
use App\core\DIC\DIC;

class ArticleController extends BaseController{


    public function index()
    {
        $p = isset($_GET['p']) && $_GET['p'] > 0 ? (int) $_GET['p'] : 1;

        var_dump($p);
        $articles = $this->getTable('article')->last();
        $categories = $this->getTable('categorie')->all();

        $this->render(
            'article.index',
            compact('articles','categories')
        );
    }

    public function categorie($id)
    {
        $categorie = $this->getTable('categorie')->findById($id);
        if(!$categorie){
            $this->notFound();
        }

        $articles = $this->getTable('article')->findLastByCategoryId($id);
        $categories = $this->getTable('categorie')->all();

        $this->render(
            'article.categorie',
            compact('categories','categorie','articles')
        );
    }

    public function show($id)
    {
        $article = $this->getTable('article')->findById($id);
        if($article === false){
            $this->notFound();
        }

        $this->render(
            'article.single',
            compact('article')
        );
    }

} 