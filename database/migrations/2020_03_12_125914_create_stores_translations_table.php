<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stores_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('director');
            $table->text('address');
            $table->text('description')->nullable();
            $table->unique(['stores_id','locale']);
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
        Schema::dropIfExists('stores_translations');
    }
}
