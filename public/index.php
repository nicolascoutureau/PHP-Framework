<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 16:41
 */


/*\App\App\App::load();*/
$app = \App\app\App::getInstance();

echo '<pre>';
var_dump($app->getTable('article')->all());
echo '</pre>';