<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meet_id')->unsigned();
            $table->integer('year_month_week')->unsgined();
            $table->integer('people_id')->nullable()->unsigned();
            $table->string('comment')->nullable();
            $table->timestamps();
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('people_id')->references('id')->on('people');
            $table->foreign('meet_id')->references('id')->on('meets');

            $table->unique(['meet_id', 'year_month_week']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
