<h2>Ajouter un article</h2>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input  type="text" name="titre" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="contenu">Contenu</label>
        <textarea name="contenu" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="categorie">Categorie</label>
        <select class="form-control" name="categorie_id">
            <?php foreach($categories as $categorie): ?>
                <option value="<?= $categorie->id ?>"><?= $categorie->nom ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image"/>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>