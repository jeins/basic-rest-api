<?php
 /*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * ExpSeedDataCustomerItems.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\database\seeds;

use resapi\model\ExpModelDataCustomerItems;

class ExpSeedDataCustomerItems {

    public function run(){
        foreach($this->data() as $data){
            $db = new ExpModelDataCustomerItems();
            foreach($data as $key=>$value){
                $db->$key = $value;
            }
            $db->save();
        }
    }

    private function data(){
        return [
            [
                'id_customer'   => 1,
                'item_name'     => 'GARUDA Kacang Atom Rasa Barbeque',
                'price'         => '2€'
            ],
            [
                'id_customer'   => 1,
                'item_name'     => 'Kacang Panggang Rasa Pedas',
                'price'         => '1€'
            ],
            [
                'id_customer'   => 2,
                'item_name'     => 'Pilus Campur',
                'price'         => '6.3€'
            ],
            [
                'id_customer'   => 3,
                'item_name'     => 'Anchor Boneeto Junior 1+',
                'price'         => '8€'
            ],
            [
                'id_customer'   => 3,
                'item_name'     => 'Follow on Formula for Babies 6 - 12 months old',
                'price'         => '5€'
            ],
            [
                'id_customer'   => 3,
                'item_name'     => 'Boneeto Junior 1+',
                'price'         => '12€'
            ],
            [
                'id_customer'   => 4,
                'item_name'     => 'Biskuit Rasa Coklat',
                'price'         => '7€'
            ],
            [
                'id_customer'   => 10,
                'item_name'     => 'Biskuit Rasa Kelapa (Butter Coconut Biscuits)',
                'price'         => '8€'
            ],
            [
                'id_customer'   => 5,
                'item_name'     => 'Biskuit Rasa Durian (Kaleng)',
                'price'         => '9€'
            ],
            [
                'id_customer'   => 5,
                'item_name'     => 'Biskuit Rasa Krim Coklat (Chocolate Sandwich)',
                'price'         => '20€'
            ],
            [
                'id_customer'   => 6,
                'item_name'     => 'Biskuit Rasa Kopi/Pikopi (Plastik)',
                'price'         => '21€'
            ],
            [
                'id_customer'   => 6,
                'item_name'     => 'Datita 3 Madu',
                'price'         => '4.3€'
            ],
            [
                'id_customer'   => 10,
                'item_name'     => 'Dancow Datita 3 Vanila',
                'price'         => '5.5€'
            ],
            [
                'id_customer'   => 7,
                'item_name'     => 'Dancow Nutrigold 3 Vanila',
                'price'         => '7.6€'
            ],
            [
                'id_customer'   => 7,
                'item_name'     => 'Dancow Nutrigold 4 Vanila',
                'price'         => '9€'
            ],
            [
                'id_customer'   => 9,
                'item_name'     => 'AIM Biskuit Susu',
                'price'         => '7€'
            ],
            [
                'id_customer'   => 8,
                'item_name'     => 'BISKUIT KOKOLA Regi Durian',
                'price'         => '11€'
            ],
            [
                'id_customer'   => 9,
                'item_name'     => 'Danstart 2',
                'price'         => '12€'
            ],
            [
                'id_customer'   => 8,
                'item_name'     => 'AIM Biskuit Rose Cream',
                'price'         => '5.4€'
            ],
            [
                'id_customer'   => 1,
                'item_name'     => 'KOKOLA Super Cream Bon-Bon',
                'price'         => '6€'
            ],
            [
                'id_customer'   => 5,
                'item_name'     => 'KOKOLA Kukis Susu Vanila',
                'price'         => '5€'
            ],
            [
                'id_customer'   => 3,
                'item_name'     => 'KOKOLA Marie Susu Madu',
                'price'         => '2.2€'
            ],
            [
                'id_customer'   => 2,
                'item_name'     => 'KOKOLA Delicious Cream Lemon',
                'price'         => '3.1€'
            ],
            [
                'id_customer'   => 6,
                'item_name'     => 'KOKOLA Delicious Durian',
                'price'         => '1.4€'
            ],
        ];
    }
}