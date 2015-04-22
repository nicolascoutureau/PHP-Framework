<h2>Modifier l'article</h2>

<form method="POST">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input  type="text" name="titre" value="<?= $article->titre ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="contenu">Contenu</label>
        <textarea name="contenu" id="" cols="30" rows="10" class="form-control"><?= $article->contenu ?></textarea>
    </div>
    <div class="form-group">
        <label for="categorie">Categorie</label>
        <select class="form-control" name="categorie_id">
            <?php foreach($categories as $categorie): ?>
                <option <?= ($categorie->nom === $article->categorie)? 'selected' : ''?> value="<?= $categorie->id ?>"><?= $categorie->nom ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>