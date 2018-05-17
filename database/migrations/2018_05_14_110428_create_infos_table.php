<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level')->default(1);
            $table->integer('exp')->default(0);
            $table->string('total_distance')->default('0');
            $table->string('average_speed')->default('0');
            $table->string('picture')->nullable();
            $table->string('lastname');
            $table->string('firstname');
            $table->integer('users_id');
            $table->integer('leagues_id')->default(20);
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
        Schema::dropIfExists('infos');
    }
}
