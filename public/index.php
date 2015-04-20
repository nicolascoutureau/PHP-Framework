<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 16:41
 */

require_once '../vendor/autoload.php';

$app = \App\app\App::getInstance();

echo '<pre>';
var_dump($app->getTable('article')->all());
echo '</pre>';