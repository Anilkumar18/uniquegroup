<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricestickerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricesticker', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('chainID');
			$table->string('poName');
			$table->string('colorCode');
			$table->string('basicColor');
			$table->string('frenchColor');
			$table->string('fallallColour');
			$table->string('outerWear');
			$table->string('activeColor');
			$table->string('sleepWear');
			$table->string('healthWear');
			$table->string('status');
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
        Schema::dropIfExists('pricesticker');
    }
}
