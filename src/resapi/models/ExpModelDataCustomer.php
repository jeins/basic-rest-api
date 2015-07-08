<?php
 /*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * ExpModelDataCustomer.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\models;

use Illuminate\Database\Eloquent\Model as Model;

class ExpModelDataCustomer extends Model{

    protected $table = 'data_customer';
    protected $primaryKey = 'id_customer';

    /**
     * setup relationship between data_customer 1 .... * data_customer_items
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function infoItems(){
        return $this->hasMany('\resapi\models\ExpModelDataCustomerItems', $this->primaryKey);
    }
}