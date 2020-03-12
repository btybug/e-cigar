<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stores_id');
            $table->string('type');
            $table->string('contact');
            $table->timestamps();
            $table->foreign('stores_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_contacts');
    }
}
