<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patches', function (Blueprint $table) {
            $table->increments('id')->unsigned();
			$table->integer('CustomerID')->unsigned();
			$table->integer('MaterialID')->unsigned();
			$table->string('QualityReference');
			$table->decimal('Width');
			$table->decimal('Length');
			$table->string('GroundColor');
			$table->string('PantoneColor1');
			$table->string('PantoneColor2');
			$table->string('PantoneColor3');
			$table->string('MerrowEdgeSize');
			$table->string('MerrowEdgeColor');
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
        Schema::dropIfExists('patches');
    }
}
