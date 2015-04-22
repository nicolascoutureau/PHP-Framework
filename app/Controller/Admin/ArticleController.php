<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 22/04/15
 * Time: 16:18
 */

namespace App\app\Controller\Admin;


use App\App\App;
use App\core\Controller\Controller;

class ArticleController extends AdminBaseController{

    public function index()
    {
        $articles = App::getInstance()->getTable('article')->all();

        $this->render('admin.article.index', compact('articles'));
    }

    public function add()
    {
        $app = App::getInstance();
        $articleTable = $app->getTable('article');

        if(!empty($_POST)){
            $result = $articleTable->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'categorie_id' => $_POST['categorie_id'],
            ]);
            if($result){
                return $this->index();
            }
        }

        $categories = $app->getTable('categorie')->all();

        $this->render('admin.article.new', compact('categories', 'message'));
    }

    public function edit()
    {
        $app = App::getInstance();
        $articleTable = $app->getTable('article');
        if(!empty($_POST)){
            $result = $articleTable->updateById($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'categorie_id' => $_POST['categorie_id'],
            ]);

            if($result){
                $message = "L'article a bien été modifié!";
            }
        }

        $article = $articleTable->findById($_GET['id']);
        $categories = $app->getTable('categorie')->all();

        $this->render('admin.article.edit', compact('categories', 'article'));
    }

    public function delete()
    {
        $app = App::getInstance();
        $articleTable = $app->getTable('article');
        if(!empty($_POST)){
            $result = $articleTable->deleteById($_POST['id']);

            if($result){
                return $this->index();
            }
        }
    }

} 