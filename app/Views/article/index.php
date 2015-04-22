<h1>Article Index</h1>

<?php foreach($articles as $article): ?>
    <h2><?= $article->titre ?></h2>
    <small><?= $article->categorie ?></small>
    <p><?= $article->extrait ?></p>
    <a href="<?= $article->url ?>">Voir l'article</a>
<?php endforeach; ?>

<h2>Categories</h2>

<ul>
    <?php foreach($categories as $categorie): ?>
        <li>
            <a href="<?= $categorie->url ?>"><?= $categorie->nom ?></a>
        </li>
    <?php endforeach ?>
</ul>


