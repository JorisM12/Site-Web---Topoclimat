<?php
use App\Autoloarder;
use App\Core\Main;
define('ROOT', dirname(__DIR__));
require_once ROOT.'/Autoloader.php';
Autoloarder::register();
$app = new Main;
$app->start();

