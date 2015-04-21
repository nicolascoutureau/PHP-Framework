<?php

use App\App\App;

$articles = App::getInstance()->getTable('article')->all();

?>

<h1>Articles</h1>

<table class="table table-stripped">
    <thead>
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($articles as $article): ?>
            <tr>
                <td><?= $article->id ?></td>
                <td><?= $article->titre ?></td>
                <td>
                    <a class="btn btn-primary" href="?page=article.edit&id=<?= $article->id ?>">Éditer</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>

