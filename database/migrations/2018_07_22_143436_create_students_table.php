<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('student_id')->unique();
            $table->string('food_id')->unique();
            $table->string('password');
            $table->integer('wallet_id')->unsigned()->index()->nullable();

            $table->timestamps();
            $table->string('create_date');
            $table->string('update_date')->nullable();

            $table->foreign('wallet_id')->references('id')->on('wallets');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
