<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
           CREATE TABLE payments (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `payment_type` VARCHAR(20) NOT NULL,
              `payment_date` DATETIME NOT NULL DEFAULT current_timestamp(),
              `payment_amount` DECIMAL(10,2) NOT NULL,
               PRIMARY KEY (`id`)
            ) ENGINE=INNODB;
         ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
        DROP TABLE `payments`;
        ");
    }
}
