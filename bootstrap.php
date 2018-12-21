<?php
use Whoops\Run as Whoops;
use Whoops\Handler\PrettyPageHandler;
use Illuminate\Database\Capsule\Manager as Capsule;

// Define BASE_PATH;
define('BASE_PATH', __DIR__);

// Autoload
require BASE_PATH . '/vendor/autoload.php';

// Boot Eloquent
$capsule = new Capsule();
$capsule->addConnection(require BASE_PATH . '/config/database.php');
$capsule->bootEloquent();

// Whoops Error Hint
$whoops = new Whoops();
$whoops->pushHandler(new PrettyPageHandler());
$whoops->register();