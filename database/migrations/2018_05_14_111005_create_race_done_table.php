<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceDoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_done', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time_done');
            $table->date('date_done');
            $table->string('speed');
            $table->string('distance_done');
            $table->integer('users_id');
            $table->integer('race_list_id');
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
        Schema::dropIfExists('race_done');
    }
}
