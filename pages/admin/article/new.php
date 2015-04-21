<?php

use App\App\App;

$app = App::getInstance();
$articleTable = $app->getTable('article');

if(!empty($_POST)){
    $result = $articleTable->create([
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'categorie_id' => $_POST['categorie_id'],
    ]);
    if($result){
        header('Location: admin.php');
        $message = "L'article a bien été ajouté!";
    }
}

$categories = $app->getTable('categorie')->all();

?>

<h2>Ajouter un article</h2>

<form method="POST">
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
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>