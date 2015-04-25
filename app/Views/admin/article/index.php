<h1>Administrer les articles</h1>

<p>
    <a href="/admin/article/add" class="btn btn-success">Ajouter un article</a>
</p>

<table class="table table-stripped">
    <thead>
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Image</td>
        <td>Catégorie</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($articles as $article): ?>
            <tr>
                <td><?= $article->id ?></td>
                <td><?= $article->titre ?></td>
                <td><img class="img-responsive" style="width: 100px" src="<?= $article->imagePath ?>"/></td>
                <td><?= $article->categorie ?></td>
                <td>
                    <a class="btn btn-primary" href="/admin/article/edit/<?= $article->id ?>">Éditer</a>

                    <form action="/admin/article/delete" method="POST" style="display: inline">
                        <input type="hidden" name="id" value="<?= $article->id ?>"/>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>

