<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');

            $table->string('s_id')->unique();
            $table->string('f_id')->unique();
            $table->string('d_id')->unique();
            $table->integer('transaction_id')->unsigned()->index()->nullable();

            $table->string('create_date');
            $table->string('update_date')->nullable();
            $table->timestamps();

            $table->foreign('transaction_id')->references('transactions')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
