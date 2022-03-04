<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
           CREATE TABLE order_products (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `product_id` INT(10) UNSIGNED NOT NULL,
              `order_id` INT(10) UNSIGNED NOT NULL,
              `quantity` TINYINT(3) NOT NULL DEFAULT 1,
              `size` VARCHAR(20) NOT NULL,
              `color` VARCHAR(50) NOT NULL,
              `unit_price` DECIMAL(10,2) NOT NULL,
              `discount` DECIMAL(10,2) NOT NULL,
              PRIMARY KEY (`id`),
              UNIQUE KEY `order_product_1` (`order_id`,`product_id`,`size`,`color`),
              KEY `product_order` (`product_id`),
              CONSTRAINT `order_product` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
              CONSTRAINT `product_order` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE
            ) ENGINE=InnoDB;
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
        DROP TABLE `order_products`;
        ");
    }
}
