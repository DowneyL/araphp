<?php
use Illuminate\Database\Capsule\Manager as Capsule;

// Autoload
require '../vendor/autoload.php';

// Eloquent ORM
$capsule = new Capsule();
$capsule->addConnection(require '../config/database.php');
$capsule->bootEloquent();

// Router

require '../config/route.php';