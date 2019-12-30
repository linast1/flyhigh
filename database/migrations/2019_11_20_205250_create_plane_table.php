<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('model', 32);
            $table->string('captain', 32);
            $table->string('copilot', 32);
            $table->date('make_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plane');
    }
}
