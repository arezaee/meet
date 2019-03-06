<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('months', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('year')->unsigned();
            $table->smallInteger('month')->unsigned();
            $table->smallInteger('first_day_week')->unsigned();
            $table->smallInteger('month_day')->unsigned();
            $table->smallInteger('first_lunar_month')->unsigned();
            $table->smallInteger('first_lunar_day')->unsigned();
            $table->smallInteger('last_lunar_day')->unsigned();
            $table->smallInteger('first_georgian_month')->unsigned();
            $table->smallInteger('first_georgian_day')->unsigned();
            $table->smallInteger('last_georgian_day')->unsigned();

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
        Schema::dropIfExists('month');
    }
}
