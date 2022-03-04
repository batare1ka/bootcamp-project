<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_details', function (Blueprint $table) {
            $table->renameColumn('fabric', 'composition');
            $table->tinyText('features')->default('')->after('fabric');
            $table->dropColumn(['size', 'color', 'created_at']);
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_details', function (Blueprint $table) {
            $table->renameColumn('composition', 'fabric');
            $table->dropColumn('features');
            $table->unsignedSmallInteger('size');
            $table->string('color', 30);
            $table->dateTime('created_at')->useCurrent();
        });
    }
}
