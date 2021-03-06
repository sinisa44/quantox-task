<?php

require_once __DIR__ . " /../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection( [
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'quantox_task',
    'username'  => 'root',
    'password'  => '',
    'collation' => 'utf8_unicode_ci'
] );

$capsule->setAsGlobal();
$capsule->bootEloquent();