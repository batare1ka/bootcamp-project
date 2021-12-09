<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProductsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE TABLE products_details (
            `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `product_id` int(10) UNSIGNED NOT NULL,
            `size` SMALLINT(5) UNSIGNED NOT NULL,
            `color` VARCHAR(30) DEFAULT NULL,
            `weight` VARCHAR(20) NOT NULL,
            `description` TEXT DEFAULT NULL,
            `fabric` VARCHAR(100) DEFAULT NULL,
            `created_at` DATETIME NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`),
            CONSTRAINT `unique_product` UNIQUE (`product_id`),
            FOREIGN KEY `products_details`(`product_id`)
            REFERENCES `products` (`id`) ON UPDATE CASCADE
            ON DELETE CASCADE 
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
        DROP TABLE `products_details`;
        ");
    }
}
