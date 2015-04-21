<?php
use App\App\App;

if(!empty($_POST)){
    $db = App::getInstance()->getDb();
    $auth = new \App\core\Auth\DBAuth($db);

    if($auth->login($_POST['username'], $_POST['password'])){
        header('Location: admin.php');
    }else{
        echo 'Accès interdit';
    }
}


?>


<form method="POST">
    <input type="text" name="username" placeholder="username"/><br/>
    <input type="password" name="password" placeholder="password"/><br/>
    <input type="submit"/>
</form>