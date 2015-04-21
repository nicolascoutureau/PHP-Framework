<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 21/04/15
 * Time: 10:25
 */

?>

<h1>Article Index</h1>

<?php foreach(\App\App\App::getInstance()->getTable('article')->last() as $article): ?>
    <h2><?= $article->titre ?></h2>
    <p><?= $article->extrait ?></p>
    <a href="<?= $article->url ?>">Voir l'article</a>
<?php endforeach; ?>

