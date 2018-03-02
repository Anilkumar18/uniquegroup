<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHangtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hangtags', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('CustomerID')->unsigned();
			$table->integer('PrintTypeID')->unsigned();
			$table->integer('CuttingID')->unsigned();
			$table->integer('PrintingFinishingProcessID')->unsigned();
			$table->integer('PaperQualityReference')->nullable();
			$table->integer('PaperThickness')->nullable();
			$table->integer('Width')->nullable();
			$table->integer('Length')->nullable();
			$table->string('GroundPaperColor')->nullable();
			$table->integer('CMYK')->nullable();
			$table->string('PantoneColor1')->nullable();
			$table->string('PantoneColor2')->nullable();
			$table->string('PantoneColor3')->nullable();
			$table->integer('DrillHoleSize')->nullable;
			$table->integer('Grommet')->nullable();
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
        Schema::dropIfExists('hangtags');
    }
}
