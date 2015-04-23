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
use App\core\Session\Flash;
use App\core\Session\Session;

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
                $app->getFlash()->set("L'article a bien été créé!");
                return $this->index();
            }
        }

        $categories = $app->getTable('categorie')->all();

        $this->render('admin.article.new', compact('categories', 'message'));
    }

    public function edit($id)
    {
        $app = App::getInstance();
        $articleTable = $app->getTable('article');
        if(!empty($_POST)){
            $result = $articleTable->updateById($id, [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'categorie_id' => $_POST['categorie_id'],
            ]);

            if($result){
                $app->getFlash()->set("L'article a bien été modifié!");
                header('Location: /admin/article');
            }
        }

        $article = $articleTable->findById($id);
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
                $app->getFlash()->set("L'article a bien été supprimé!");
                return $this->index();
            }
        }
    }

} 