<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 16:41
 */

use App\core\Routing\Dispatcher;

define('ROOT', dirname(__DIR__));
require_once ROOT . '/app/App.php';

\App\App\App::load();

$dispatcher = new Dispatcher($_SERVER['REQUEST_URI']);
$dispatcher->dispatch();