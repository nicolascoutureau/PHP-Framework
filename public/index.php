<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 16:41
 */

use App\app\Controller\Admin\ArticleController as ArticleControllerAdmin;
use App\app\Controller\ArticleController;
use App\app\Controller\UserController;

define('ROOT', dirname(__DIR__));
require_once ROOT . '/app/App.php';

\App\App\App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'articles';
}

$parts = explode('/',$_SERVER['REQUEST_URI']);
$ctrl = 'App\app\Controller\\'.ucfirst($parts[1]).'Controller';
$mthd = $parts[2];
$args = [];

for($i=3; $i<count($parts); $i++){
    $args[] = $parts[$i];
}

var_dump($ctrl,$mthd,$args);

$controller = new $ctrl();
$controller->$mthd($args[0]);



/*if($page === 'articles'){
    $controller = new ArticleController();
    $controller->index();
} elseif ($page === 'article'){
    $controller = new ArticleController();
    $controller->show();
} elseif ($page === 'categorie') {
    $controller = new ArticleController();
    $controller->categories();
} elseif ($page === 'admin.article.index'){
    $controller = new ArticleControllerAdmin();
    $controller->index();
} elseif ($page === 'admin.article.add'){
    $controller = new ArticleControllerAdmin();
    $controller->add();
} elseif ($page === 'admin.article.edit'){
    $controller = new ArticleControllerAdmin();
    $controller->edit();
} elseif ($page === 'admin.article.delete'){
    $controller = new ArticleControllerAdmin();
    $controller->delete();
} elseif ($page === 'login'){
    $controller = new UserController();
    $controller->login();
}*/