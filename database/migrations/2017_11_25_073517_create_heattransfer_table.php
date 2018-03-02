<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeattransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heattransfer', function (Blueprint $table) {
            $table->increments('id')->unsigned();
			$table->integer('CustomerID')->unsigned();
			$table->integer('TypeofHeatTransferID')->unsigned();
			$table->integer('FinishID')->unsigned();
			$table->integer('Width');
			$table->integer('Length');
			$table->string('PantoneColor1');
			$table->string('PantoneColor2');
			$table->string('PantoneColor3');
			$table->string('Application');
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
        Schema::dropIfExists('heattransfer');
    }
}
