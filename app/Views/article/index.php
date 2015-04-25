<div class="container">
    <div class="row">
        <div class="col s8">
            <h1>Article Index</h1>
            <?php foreach($articles as $article): ?>
                <?= $article->id ?>
                <h2><?= $article->titre ?></h2>
                <img class="responsive-img" src="<?= $article->imagePath ?>" alt="<?= $article->titre ?>"/>
                <small><?= $article->categorie ?></small>
                <p class="flow-text"><?= $article->extrait ?></p>
                <a class="waves-effect waves-light btn" href="<?= $article->url ?>">Voir l'article</a>
            <?php endforeach; ?>

            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="mdi-navigation-chevron-left"></i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="mdi-navigation-chevron-right"></i></a></li>
            </ul>
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
