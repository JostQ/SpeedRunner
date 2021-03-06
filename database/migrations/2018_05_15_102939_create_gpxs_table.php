<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpxs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('startLat');
            $table->string('startLon');
            $table->string('startTime');
            $table->string('endLat');
            $table->string('endLon');
            $table->string('endTime');
            $table->integer('users_id');
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
        Schema::dropIfExists('gpxs');
    }
}
