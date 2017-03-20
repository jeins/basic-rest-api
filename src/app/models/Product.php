<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';

    public $timestamps = false;

    public static function getAll(){
        return self::all();
    }

}