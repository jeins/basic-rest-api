<?php
 /*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * ExpSeedDataCustomer.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\database\seeds;

use resapi\models\ExpModelDataCustomer;

class ExpSeedDataCustomer {

    public function run(){
        foreach($this->data() as $data){
            $db = new ExpModelDataCustomer();
            foreach($data as $key=>$value){
                $db->$key = $value;
            }
            $db->save();
        }
    }

    private function data(){
        return [
            [
                'full_name'     => 'Thomas Reich',
                'email'         => 'reich@hotmail.com',
                'password'      => sha1('01291238ACBSA'),
                'api_key'       => '',
                'address'       => 'Rhinstr. 91, 10559 Berlin, Germany'
            ],
            [
                'full_name'     => 'Heinz Schneider',
                'email'         => 'heinz.schneider@gmx.net',
                'password'      => sha1('12341ACVA'),
                'api_key'       => '',
                'address'       => 'Alt Moabit 119, 10557 Hamburg, Germany'
            ],
            [
                'full_name'     => 'Sabine Jenderko',
                'email'         => 'buerojenderko@gmail.com',
                'password'      => sha1('AQWEOAmyxf!'),
                'api_key'       => '',
                'address'       => 'Alam Raya 20, 761237 Bekasi, Indonesian'
            ],
            [
                'full_name'     => 'Wiegbert Lemke',
                'email'         => 'lemke@yahoo.de',
                'password'      => sha1('Powlqd.-!123'),
                'api_key'       => '',
                'address'       => 'Feldzeugmesiter. 1, 312391 Frankfurt, Germany'
            ],
            [
                'full_name'     => 'Michael Welslau',
                'email'         => 'e10@yahoo.com',
                'password'      => sha1('Ma123jasdu13'),
                'api_key'       => '',
                'address'       => 'Templehofer Weg 123, 12391 Bonn, Germany'
            ],
            [
                'full_name'     => 'Christoph Jenderko',
                'email'         => 'jenderko@gmx.de',
                'password'      => sha1('M123as1!.'),
                'api_key'       => '',
                'address'       => 'Bellevuestr. 98, 10123 Berlin, Germany'
            ],
            [
                'full_name'     => 'Sudirman',
                'email'         => 'sudiman@yahoo.co.id',
                'password'      => sha1('941Ksd128!..'),
                'api_key'       => '',
                'address'       => 'Jl. Jendral Sudirman 12, 239123 Jakarta Timur, Indonesian'
            ],
            [
                'full_name'     => 'Budi Santosa',
                'email'         => 'santosa@gmail.com',
                'password'      => sha1('..9123sdk!jdd'),
                'api_key'       => '',
                'address'       => 'Keluarahan Jati Asih 12, 21931 Bandung, Indonesian'
            ],
            [
                'full_name'     => 'Johny Andrean',
                'email'         => 'andrean.john@yahoo.com',
                'password'      => sha1('Laksdiqj!asd.'),
                'api_key'       => '',
                'address'       => 'Westerm,aiser 1216, 33098 Paderborn'
            ],
            [
                'full_name'     => 'Paijo Sukijem',
                'email'         => 'jalanraya@gmail.com',
                'password'      => sha1('-,and12j3!'),
                'api_key'       => '',
                'address'       => 'Lreuzberger Ring 13, 65205 Wiesbaden, Germany'
            ]
        ];
    }
}