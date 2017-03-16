<?php

namespace App;

require  __DIR__ . '/../vendor/autoload.php';

$settings = require __DIR__ . '/../local.settings.php';

$app = new Setup($settings);
$app->run();

?>