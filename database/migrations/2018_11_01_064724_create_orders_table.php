<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->decimal('amount',6,2);
            $table->unsignedInteger('billing_addresses_id');
            $table->unsignedInteger('transaction_id')->nullable();
            $table->string('status');
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->decimal('shipping_price',6,2);
            $table->string('currency',3);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('parent_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('billing_addresses_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
