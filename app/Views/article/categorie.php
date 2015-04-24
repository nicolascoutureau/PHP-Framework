<div class="container">
    <div class="row">
        <div class="col s8">
            <h1><?= $categorie->nom ?></h1>


            <?php foreach($articles as $article): ?>
                <h2><?= $article->titre ?></h2>
                <p><?= $article->contenu ?></p>
            <?php endforeach ?>
        </div>
        <div class="col s4">
            <h2>Categories</h2>
            <ul>
                <?php foreach($categories as $categorie): ?>
                    <li>
                        <a class="waves-effect waves-light btn" href="<?= $categorie->url ?>"><?= $categorie->nom ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
