<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php

$session = new \App\core\Session\Session();
$flash = new \App\core\Session\Flash($session);

$flash = $flash->get();

if(!empty($flash)):
    ?>
    <div class="container">
        <div class="alert alert-<?= $flash[1] ?>" role="alert"><?= $flash[0] ?></div>
    </div>
<?php endif ?>

    <?= $content ?>
</body>
</html>