<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsCoreColumnDeliveryCostTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_cost_types', function (Blueprint $table) {
           $table->tinyInteger('is_core')->default(0);
           $table->tinyInteger('is_enabled')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_cost_types', function (Blueprint $table) {
            //
        });
    }
}
