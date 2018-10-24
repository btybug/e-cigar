<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_job', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('status')->default(0);
            $table->string('to')->nullable();
            $table->unsignedInteger('mail_template_id');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('must_be_done')->nullable();
            $table->text('log')->nullable();
            $table->timestamps();

            $table->foreign('mail_template_id')
                ->references('id')
                ->on('mail_templates')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_job');
    }
}
