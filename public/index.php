<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 16:41
 */

use App\core\Auth\DBAuth;
use App\core\Config;
use App\core\Database\Database;
use App\core\DIC\DIC;
use App\core\Routing\Dispatcher;
use App\core\Session\Flash;
use App\core\Session\Session;

define('ROOT', dirname(__DIR__));
require_once ROOT . '/app/App.php';

\App\App\App::load();

$dispatcher = new Dispatcher($_SERVER['REQUEST_URI']);
$dispatcher->dispatch();