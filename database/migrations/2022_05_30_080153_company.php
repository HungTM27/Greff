<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0)->comment('0:Disable; 1:Enable');
            $table->string('company_name');
            $table->string('company_name(kana)')->nullable();
            $table->string('registed_name');
            $table->string('registed_name(kana)')->nullable();
            $table->integer('id_city')->foreign('id_city')->references('id')->on('areas');
            $table->integer('id_district')->foreign('id_district')->references('id')->on('areas');
            $table->string('room')->nullable();
            $table->string('building')->nullable();
            $table->string('zipcode');
            $table->string('hp_url');
            $table->string('area');
            $table->string('career');
            $table->string('contact_name');
            $table->string('phone_number');
            $table->string('email');
            $table->integer('other')->nullable()->foreign('id_other')->references('id')->on('others');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
