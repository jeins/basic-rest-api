<?php

use Phpmig\Adapter;
use Pimple\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

$container = new Container();

$container['config'] = require './local.settings.php';

$container['db'] = function ($c) {
    $capsule = new Capsule();
    $capsule->addConnection($c['config']['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['phpmig.adapter'] = function($c) {
    return new Adapter\Illuminate\Database($c['db'], 'migrations');
};
$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';
$container['phpmig.migrations_template_path'] = $container['phpmig.migrations_path'] . DIRECTORY_SEPARATOR . '.template.php';

return $container;