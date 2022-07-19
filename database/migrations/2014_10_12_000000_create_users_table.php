<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< HEAD
            $table->interger('level');
            $table->integer('parent_id');
            $table->interger('status');
=======
            $table->integer('count')->default(0);
            $table->integer('level')->comment("0:admin;1:company;2:store");
            $table->integer('parent_id');
            $table->integer('status')->default(0)->comment("0:disable;1:enabled");
>>>>>>> f7f15e92f7d49706f14cdd0d0734cf9509fa141c
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
