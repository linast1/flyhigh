<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('airline_name', 32);
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->time('duration');
            $table->unsignedInteger('seats');
            $table->string('fk_dep_airport', 11);
            $table->string('fk_arr_airport', 11);
            $table->unsignedInteger('fk_plane');

            $table->index(['fk_dep_airport'], "fk_dep_airport");
            $table->index(['fk_arr_airport'], "fk_arr_airport");
            $table->index(['fk_plane'], "fk_plane");

            $table->foreign('fk_dep_airport', 'fk_dep_airport')
                ->references('code')->on('airport')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('fk_arr_airport', 'fk_arr_airport')
                ->references('code')->on('airport')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('fk_plane', 'fk_plane')
                ->references('id')->on('plane')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight');
    }
}
