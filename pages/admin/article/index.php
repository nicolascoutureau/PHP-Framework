<?php

use App\App\App;

$articles = App::getInstance()->getTable('article')->all();

?>

<h1>Administrer les articles</h1>

<p>
    <a href="?page=article.new" class="btn btn-success">Ajouter un article</a>
</p>

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

                    <form action="?page=article.delete" method="POST" style="display: inline">
                        <input type="hidden" name="id" value="<?= $article->id ?>"/>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>

