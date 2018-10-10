<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',100);
            $table->string('last_name',100);
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('phone',100)->unique();
            $table->string('country',100);
            $table->enum('gender',['male','female']);
            $table->tinyInteger('status')->default(0);
            $table->integer('role_id')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')->on('roles')
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
    }
}
