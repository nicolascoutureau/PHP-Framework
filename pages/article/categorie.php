<?php

$app = \App\App\App::getInstance();

$categorie = $app->getTable('categorie')->findById($_GET['id']);
if(!$categorie){
    $app->notFound();
}

$articles = $app->getTable('article')->findLastByCategoryId($_GET['id']);
?>

<h1><?= $categorie->nom ?></h1>


<?php foreach($articles as $article): ?>
    <h2><?= $article->titre ?></h2>
    <p><?= $article->contenu ?></p>
<?php endforeach ?>
