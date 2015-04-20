<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 16:41
 */

require_once '../vendor/autoload.php';

$app = \App\app\App::getInstance();

var_dump($app->getTable('user')->all());

echo 'ok';