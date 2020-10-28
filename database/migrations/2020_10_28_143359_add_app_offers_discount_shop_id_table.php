<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppOffersDiscountShopIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_offers_discount', function (Blueprint $table) {
            $table->unsignedInteger('app_warehouse_id')->nullable();
            $table->foreign('app_warehouse_id')->references('id')
                ->on('app_warehouses')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_offers_discount', function (Blueprint $table) {
            //
        });
    }
}
