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
        $articles = $this->getTable('article')->all();

        $this->render('admin.article.index', compact('articles'));
    }

    public function add()
    {
        $articleTable = $this->getTable('article');

        if(!empty($_POST)){

            if ($_FILES['image']['error'] > 0){
                $this->get('Flash')->set("Erreur lors du transfert");
                return $this->add();
            }

            if(!in_array($_FILES['image']['type'], ['image/png', 'image/jpg', 'image/jpeg'])){
                $this->get('Flash')->set("Mauvais format de fichier");
                return $this->add();
            }

            $path = ROOT .'/public/images/article/';
            $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$path.$_FILES['image']['name']);

            $result = $articleTable->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'categorie_id' => $_POST['categorie_id'],
                'image' => $_FILES['image']['name']
            ]);
            if($result){
                $this->get('Flash')->set("L'article a bien été créé!");
                return $this->index();
            }
        }

        $categories = $this->getTable('categorie')->all();

        $this->render('admin.article.new', compact('categories', 'message'));
    }

    public function edit($id)
    {
        $articleTable = $this->getTable('article');
        if(!empty($_POST)){
            if ($_FILES['image']['error'] > 0){
                $this->get('Flash')->set("Erreur lors du transfert");
            }

            if(!in_array($_FILES['image']['type'], ['image/png', 'image/jpg', 'image/jpeg'])){
                $this->get('Flash')->set("Mauvais format de fichier");
            }

            $path = ROOT .'/public/images/article/';
            $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$path.$_FILES['image']['name']);
            if ($resultat){
                $this->get('Flash')->set("Transfert réussi");
            }

            $fields = [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'categorie_id' => $_POST['categorie_id'],
            ];

            if($_FILES["image"]["error"] === UPLOAD_ERR_OK){
                $fields['image'] = $_FILES['image']['name'];
            }

            $result = $articleTable->updateById($id, $fields);

            if($result){
                $this->get('Flash')->set("L'article a bien été modifié!");
                header('Location: /admin/article');
                die();
            }
        }

        $article = $articleTable->findById($id);
        $categories = $this->getTable('categorie')->all();

        $this->render('admin.article.edit', compact('categories', 'article'));
    }

    public function delete()
    {
        $articleTable = $this->getTable('article');
        if(!empty($_POST)){
            $result = $articleTable->deleteById($_POST['id']);

            if($result){
                $this->get('Flash')->set("L'article a bien été supprimé!");
                return $this->index();
            }
        }
    }

} 