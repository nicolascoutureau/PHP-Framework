<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 16:41
 */

require_once '../vendor/autoload.php';

var_dump(\App\app\config::getInstance()->get('db_name'));

echo 'ok';