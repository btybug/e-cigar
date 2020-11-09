<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id');
            $table->text('image')->nullable();
            $table->text('url')->nullable();
            $table->text('tags')->nullable();
            $table->text('alt')->nullable();
            $table->timestamps();

//            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_banners');
    }
}
