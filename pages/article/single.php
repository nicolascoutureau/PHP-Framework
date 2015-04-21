<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 21/04/15
 * Time: 11:23
 */

$app = \App\App\App::getInstance();
$article = $app->getTable('article')->findById($_GET['id']);
if($article === false){
    $app->notFound();
}

var_dump($article);

?>
