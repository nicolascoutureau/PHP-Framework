<?php

use App\App\App;

$app = App::getInstance();
$articleTable = $app->getTable('article');
if(!empty($_POST)){
    $result = $articleTable->deleteById($_POST['id']);

    if($result){
        header('Location: admin.php');
    }
}

?>