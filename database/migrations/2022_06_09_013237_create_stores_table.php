<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
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
            $table->String('store_name');
            $table->String('contact_name');
            $table->String('phone_number');
            $table->String('email');
            $table->String('Area');
            $table->String('Address');
            $table->integer('id_company')->foreign('id_company')->references('id')->on('companies');
            $table->integer('id_area')->foreign('id_area')->references('id')->on('areas');
            $table->integer('id_address')->foreign('id_address')->references('id')->on('areas');
            $table->integer('status')->default(0)->comment('0:Disable; 1:Enable');
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
