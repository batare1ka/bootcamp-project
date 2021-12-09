<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->char('first_name', 50);
            $table->char('last_name', 50);
            $table->char('country', 50);
            $table->char('city', 50);
            $table->char('email', 50);
            $table->char('phone_num', 50)->default('');
            $table->char('address', 255);
            $table->char('postal_code', 50);
            $table->char('street', 30);
            $table->index(['first_name', 'last_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
