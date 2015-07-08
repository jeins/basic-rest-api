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
                'id_auth'       => 1,
                'full_name'     => 'Thomas Reich',
                'email'         => 'reich@hotmail.com',
                'tlpn'          => '+4902154785',
                'address'       => 'Rhinstr. 91, 10559 Berlin, Germany'
            ],
            [
                'id_auth'       => 2,
                'full_name'     => 'Heinz Schneider',
                'email'         => 'heinz.schneider@gmx.net',
                'tlpn'          => '+491314134123',
                'address'       => 'Alt Moabit 119, 10557 Hamburg, Germany'
            ],
            [
                'id_auth'       => 3,
                'full_name'     => 'Sabine Jenderko',
                'email'         => 'buerojenderko@gmail.com',
                'tlpn'          => '+62021231785',
                'address'       => 'Alam Raya 20, 761237 Bekasi, Indonesian'
            ],
            [
                'id_auth'       => 4,
                'full_name'     => 'Wiegbert Lemke',
                'email'         => 'lemke@yahoo.de',
                'tlpn'          => '+462023123785',
                'address'       => 'Feldzeugmesiter. 1, 312391 Frankfurt, Germany'
            ],
            [
                'id_auth'       => 5,
                'full_name'     => 'Michael Welslau',
                'email'         => 'e10@yahoo.com',
                'tlpn'          => '+491230138785',
                'address'       => 'Templehofer Weg 123, 12391 Bonn, Germany'
            ],
            [
                'id_auth'       => 6,
                'full_name'     => 'Christoph Jenderko',
                'email'         => 'jenderko@gmx.de',
                'tlpn'          => '+4933252012',
                'address'       => 'Bellevuestr. 98, 10123 Berlin, Germany'
            ],
            [
                'id_auth'       => 7,
                'full_name'     => 'Sudirman',
                'email'         => 'sudiman@yahoo.co.id',
                'tlpn'          => '+62315425474',
                'address'       => 'Jl. Jendral Sudirman 12, 239123 Jakarta Timur, Indonesian'
            ],
            [
                'id_auth'       => 8,
                'full_name'     => 'Budi Santosa',
                'email'         => 'santosa@gmail.com',
                'tlpn'          => '+6254102346',
                'address'       => 'Keluarahan Jati Asih 12, 21931 Bandung, Indonesian'
            ],
            [
                'id_auth'       => 9,
                'full_name'     => 'Johny Andrean',
                'email'         => 'andrean.john@yahoo.com',
                'tlpn'          => '+4969851245445',
                'address'       => 'Westerm,aiser 1216, 33098 Paderborn'
            ],
            [
                'id_auth'       => 10,
                'full_name'     => 'Paijo Sukijem',
                'email'         => 'jalanraya@gmail.com',
                'tlpn'          => '+49691231445',
                'address'       => 'Lreuzberger Ring 13, 65205 Wiesbaden, Germany'
            ]
        ];
    }
}