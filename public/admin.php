<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 16:41
 */

use App\App\App;
use App\core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require_once ROOT . '/app/App.php';

App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'articles';
}


// Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDb());

if(!$auth->logged()) {
    $app->forbidden();
}

ob_start();
    if($page === 'articles'){
        require ROOT.'/pages/admin/article/index.php';
    } elseif ($page === 'article.edit'){
        require ROOT.'/pages/admin/article/edit.php';
    } elseif ($page === 'categorie'){
        require ROOT.'/pages/admin/article/categorie.php';
    } elseif( $page === '404'){
        require ROOT. '/pages/admin/404.php';
    }
$content = ob_get_clean();

require ROOT. '/pages/layout/admin.php';