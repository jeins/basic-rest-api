<?php
 /*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * ExpMigrateDataCustomerItems.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class ExpMigrateDataCustomerItems {

    public function run(){
        Capsule::schema()->dropIfExists('data_customer_items');
        Capsule::schema()->create('data_customer_items', function($table){
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id_customer')->on('data_customer')->onDelete('cascade');
            $table->string('item_name');
            $table->string('price');
            $table->timestamps();
        });
    }
}