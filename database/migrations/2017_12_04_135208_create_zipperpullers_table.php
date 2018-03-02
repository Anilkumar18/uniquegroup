<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipperpullersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zipperpullers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('CustomerID')->unsigned();
			$table->integer('LogoProcessID')->unsigned();
			$table->integer('StringQuality')->nullable();
			$table->string('StringColor1')->nullable();
			$table->string('StringColor2')->nullable();
			$table->string('StringDimensions')->nullable();
			$table->string('StringThickness')->nullable();
			$table->string('DimensionsFinished')->nullable();
			$table->string('TPUemblemdetails')->nullable();
			$table->string('TPUColor')->nullable();
			$table->integer('Width')->nullable();
			$table->integer('Length')->nullable();
			$table->integer('Thickness')->nullable();
			$table->integer('status');
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
        Schema::dropIfExists('zipperpullers');
    }
}
