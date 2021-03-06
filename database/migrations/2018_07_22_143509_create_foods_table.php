<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('price');
            $table->string('count')->default('1');
            $table->integer('restaurant_id')->unsigned()->index()->nullable();

            $table->timestamps();
            $table->string('create_date');
            $table->string('update_date')->nullable();

            $table->foreign('restaurant_id')->references('id')->on('foods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
