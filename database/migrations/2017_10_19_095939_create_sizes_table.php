<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('chainID');
			$table->string('suspenedSizeCode');
			$table->string('sizeCode');
			$table->text('description');
			$table->string('sizeHeader1');
			$table->string('sizeHeader2');
			$table->string('sizeHeader3');
			$table->string('sizeHeader4');
			$table->string('sizeHeader5');
			$table->string('sizeHeader6');
			$table->string('sizeHeader7');			
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
        Schema::dropIfExists('sizes');
    }
}
