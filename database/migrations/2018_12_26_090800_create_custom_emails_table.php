<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from');
            $table->string('type');
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('parent_id')->nullable();
            $table->tinyInteger('is_for_admin')->default(0);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('custom_emails')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_emails');
    }
}
