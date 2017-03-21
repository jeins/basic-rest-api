<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint as Table;
use App\Models\Product;
use Faker\Factory;

class Products extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        Capsule::schema()->create('products', function (Table $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price');
            $table->integer('stock');
            $table->string('description');
            $table->timestamps();
        });

        $faker = Factory::create();
        $sampleData = [];

        for ($i = 0; $i < 100; $i++) {
            $sampleData[] = [
                'name'  => $faker->name,
                'price' => $faker->randomFloat(2, 10, 1000),
                'stock' => $faker->numberBetween(100, 1000),
                'description' => $faker->text,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
        }

        Product::insert($sampleData);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Capsule::schema()->drop('products');
    }
}