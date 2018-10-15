<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailTemplatesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_templates_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mail_templates_id')->unsigned();
            $table->string('title');
            $table->string('subject');
            $table->longText('content');
            $table->string('locale')->index();
            $table->unique(['mail_templates_id','locale']);
            $table->foreign('mail_templates_id')->references('id')->on('mail_templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_template_translations');
    }
}
