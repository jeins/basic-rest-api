<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Product extends Model{

    /**
     * @var string
     */
    protected $table = 'products';

    public function getAll(){
        return self::all();
    }

}