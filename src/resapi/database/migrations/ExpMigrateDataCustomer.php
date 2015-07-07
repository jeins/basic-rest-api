<?php
 /*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * ExpMigrateDataCustomer.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class ExpMigrateDataCustomer {

    public function run(){
        // removed first foreign key tables
        Capsule::schema()->dropIfExists('data_customer_items');

        Capsule::schema()->dropIfExists('data_customer');
        Capsule::schema()->create('data_customer', function($table){
            $table->increments('id_customer');
            $table->string('full_name');
            $table->string('email');
            $table->string('password');
            $table->string('api_key');
            $table->string('address');
            $table->timestamps();
        });
    }
}