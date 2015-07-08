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

    public function addNewCustomer(){
        try{
            $db = $this->getDB();

            foreach($this->requestBodyArr as $key=>$value){
                $db->$key = $value;
            }
            $db->save();
            $this->writeToJSON($this->requestBodyArr, 201);
        } catch (\Exception $e){
            $this->writeToJSON(['errmsg' => 'service unavailable'], 503);
        }
    }

    public function changeCustomerData($id_customer){
        try {
            $saveFile = $this->getDB()->query()->where('id_customer', '=', $id_customer)->update($this->requestBodyArr);
            if($saveFile){
                $this->writeToJSON($this->requestBodyArr);
            } else{
                $this->writeToJSON(['errmsg' => 'not found'], 204);
            }
        } catch (\Exception $e) {
            $this->writeToJSON(['errmsg' => 'service unavailable'], 503);
        }
    }

    public function removeCustomer($id_customer){
        try{
            $result = $this->getDB()->query()->where('id_customer', '=', $id_customer)->delete();
            if($result){
                $this->writeToJSON(['removed data with id' => $id_customer]);
            } else{
                $this->writeToJSON(['errmsg' => 'not found'], 204);
            }
        } catch (\Exception $e) {
            $this->writeToJSON(['errmsg' => 'service unavailable'], 503);
        }
    }

    public function getCustomers($id_customer = 0, $orderBy = "id_customer", $orderType = "asc"){
        try {
            if($id_customer == 0){
                $this->writeToJSON($this->getDB()->orderBy($orderBy, $orderType)->get()->toArray());
            } else {
                $this->writeToJSON($this->getDB()->query()->where('id_customer', '=', $id_customer)->get()->toArray());
            }
        } catch (\Exception $e) {
            $this->writeToJSON(['errmsg' => 'service unavailable'], 503);
        }
    }

    public function filterCustomerBy(){
        try{
            $url = parse_url($_SERVER['REQUEST_URI']);
            parse_str($url['query'], $queryURL);

            $query = $this->getDB()->query();

            foreach($queryURL as $key=>$value){
                $query->where($key, 'LIKE', "%$value%");
            }

            $results = $query->get()->toArray();
            $this->writeToJSON($results);
        } catch (\Exception $e){
            $this->writeToJSON(['errmsg' => 'service unavailable'], 503);
        }
    }

    public function addCustomerItems(){}

    public function getCustomerItems($id_customer){}

    public function filterCustomerItems(){}
}