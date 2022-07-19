<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Store extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0)->comment('0:Disable; 1:Enable');
            $table->string('store_name');
            $table->string('store_name(kana)')->nullable();
            $table->integer('id_city')->foreign('id_city')->references('id')->on('areas');
            $table->integer('id_district')->foreign('id_district')->references('id')->on('areas');
            $table->string('address')->nullable();
            $table->integer('station')->nullable();
            $table->string('hp_url')->nullable();
            $table->string('contact_name');
            $table->string('phone_number');
            $table->string('email');
            $table->integer('id_company');
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
        Schema::dropIfExists('stores');
    }
}
