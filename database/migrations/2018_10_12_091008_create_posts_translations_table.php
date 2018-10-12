<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('posts_id')->unsigned();
            $table->string('locale')->index();

            $table->string('info')->nullable();
            $table->string('product_name');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('status')->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();

            $table->unique(['post_id','locale']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_translations');
    }
}
