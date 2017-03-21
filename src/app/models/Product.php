<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    public static function getAll()
    {
        return self::all();
    }

    public static function add($data)
    {
        $allowedField = ['name', 'price', 'stock', 'description'];

    }
}