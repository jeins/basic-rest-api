<?php
/*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * APITokenAuthMigrate.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class APITokenAuthMigrate {

    public function run(){
        Capsule::schema()->dropIfExists('api_auth');
        Capsule::schema()->create('api_auth', function($table){
            $table->increments('id_auth');
            $table->string('username');
            $table->string('password');
            $table->string('token');
            $table->timestamps();
        });
    }
} 