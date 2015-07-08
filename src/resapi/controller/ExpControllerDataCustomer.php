<?php
 /*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * ExpControllerDataCustomer.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\controller;

use resapi\libraries\Base;
use resapi\models\ExpModelDataCustomer;

class ExpControllerDataCustomer extends Base{

    private function getDB(){
        return new ExpModelDataCustomer();
    }

    public function addNewCustomer(){}

    public function changeCustomerData($id_customer){}

    public function removeCustomer($id_customer){}

    public function getCustomers($id_customer = 0){}

    public function filterCustomerBy(){}

    public function addCustomerItems(){}

    public function getCustomerItems($id_customer){}

    public function filterCustomerItems(){}
}