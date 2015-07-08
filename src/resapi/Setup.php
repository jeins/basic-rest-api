<?php
 /*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * Setup.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi;

use resapi\helper\Routing;
use Slim\Slim;


class Setup extends Slim{

    public function __construct(){
        parent::__construct([
            'mode' => 'production',
        ]);

        // setup database connection
        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection(array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'resapi',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => ''
        ));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        Routing::setupRouting($this);
    }
} 