<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemStickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_stickers', function (Blueprint $table) {
            $table->unsignedInteger('sticker_id');
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('ordering')->nullable();

            $table->unique(['sticker_id','item_id']);
            $table->timestamps();

            $table->foreign('sticker_id')->references('id')->on('stickers')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_stickers');
    }
}
