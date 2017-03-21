<?= "<?php";?>


use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint as Table;

class <?= $className ?> extends Migration
{
    /**
    * Do the migration
    */
    public function up()
    {
        Capsule::schema()->create('<?= strtolower($className) ?>', function(Table $table)
        {
            $table->timestamps();
        });

    }

    /**
    * Undo the migration
    */
    public function down()
    {
        Capsule::schema()->drop('<?= strtolower($className) ?>');
    }
}