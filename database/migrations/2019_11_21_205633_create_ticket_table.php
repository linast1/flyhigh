<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->string('code', 11);
            $table->primary('code');
            $table->string('owner_name', 32);
            $table->string('owner_surname', 32);
            $table->string('owner_email', 32);
            $table->unsignedInteger('seat_number');
            $table->tinyInteger('extra_baggage');
            $table->unsignedInteger('fk_flight');

            $table->index(['fk_flight'], "fk_flight");

            $table->foreign('fk_flight', 'fk_flight')
                ->references('id')->on('flight')
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
        Schema::dropIfExists('ticket');
    }
}
