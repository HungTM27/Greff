<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('work_address');
            $table->string('access_address');
            $table->string('speciality');
            $table->integer('id_station');
            $table->integer('id_job_category')->foreign('id_job_category')->references('id')->on('careers');
            $table->text('note');
            $table->text('bring_item');
            $table->integer('id_skill_required');
            $table->integer('id_store')->foreign('id_store')->references('id')->on('stores');
            $table->integer('status');
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
        Schema::dropIfExists('occupations');
    }
}
