<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 16:41
 */

define('ROOT', dirname(__DIR__));
require_once ROOT . '/app/App.php';

\App\App\App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'articles';
}

if($page === 'articles'){
    require ROOT.'/pages/article/index.php';
} elseif ($page === 'article'){
    require ROOT.'/pages/article/single.php';
}