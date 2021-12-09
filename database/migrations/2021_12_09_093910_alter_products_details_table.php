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
            $table->tinyText('prod_features')->default('')->after('fabric');
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
        //
    }
}
