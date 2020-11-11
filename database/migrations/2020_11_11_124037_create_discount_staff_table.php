<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_staff', function (Blueprint $table) {
            $table->unsignedBigInteger('discount_id');
            $table->unsignedInteger('staff_id');
            $table->foreign('discount_id')
                ->references('id')
                ->on('discounts')->onDelete('cascade');
            $table->foreign('staff_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_staff');
    }
}
