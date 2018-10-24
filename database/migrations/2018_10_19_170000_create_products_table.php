<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('stock_id')->unsigned();
            $table->string('status')->nullable();
            $table->string('type',20);
            $table->string('image')->nullable();
            $table->tinyInteger('taxable')->default(0);

            $table->string('sku',30)->unique()->nullable();
            $table->text('other_images')->nullable();
            $table->text('videos')->nullable();
            $table->text('posters')->nullable();

            $table->text('tags')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
