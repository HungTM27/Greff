<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruit_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_job')->foreign('id_job')->references('id')->on('jobs');
            $table->date('work_date');
            $table->integer('work_time');
            $table->time('work_time_start', $precision = 0);
            $table->time('work_time_end', $precision = 0);
            $table->integer('break_time');
            $table->integer('people');
            $table->integer('salary/hour');
            $table->integer('travel_fees');
            $table->date('dealine_day');
            $table->time('dealine_time');
            $table->integer('status')->default(0)->comment('0:Hiring; 1:Disable;2:finish;3:Cancel');
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
        Schema::dropIfExists('recruit_jobs');
    }
}
