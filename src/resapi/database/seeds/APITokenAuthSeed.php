<?php
/*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * APITokenAuthSeed.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\database\seeds;

use resapi\models\APITokenAuthModel;

class APITokenAuthSeed {

    public function run(){
        foreach($this->data() as $data){
            $db = new APITokenAuthModel();
            foreach($data as $key=>$value){
                $db->$key = $value;
            }
            $db->save();
        }
    }

    private function data(){
        return [
            [
                'username'  => 'reich',
                'password'  => sha1('01291238ACBSA'),
                'token'     => ''
            ],
            [
                'username'  => 'heinz.schneider',
                'password'  => sha1('12341ACVA'),
                'token'     => ''
            ],
            [
                'username'  => 'buerojenderko',
                'password'  => sha1('AQWEOAmyxf!'),
                'token'     => ''
            ],
            [
                'username'  => 'lemke',
                'password'  => sha1('Powlqd.-!123'),
                'token'     => ''
            ],
            [
                'username'  => 'e10',
                'password'  => sha1('Ma123jasdu13'),
                'token'     => ''
            ],
            [
                'username'  => 'jenderko',
                'password'  => sha1('M123as1!.'),
                'token'     => ''
            ],
            [
                'username'  => 'sudiman',
                'password'  => sha1('941Ksd128!..'),
                'token'     => ''
            ],
            [
                'username'  => 'santosa',
                'password'  => sha1('..9123sdk!jdd'),
                'token'     => ''
            ],
            [
                'username'  => 'andrean.john',
                'password'  => sha1('Laksdiqj!asd.'),
                'token'     => ''
            ],
            [
                'username'  => 'jalanraya',
                'password'  => sha1('-,and12j3!'),
                'token'     => ''
            ]
        ];
    }
} 