<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestpatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testpatches', function (Blueprint $table) {
           $table->increments('id')->unsigned();
			$table->integer('CustomerID')->unsigned();
			$table->integer('MaterialID')->unsigned();
			$table->string('QualityReference')->nullable();
			$table->decimal('Width')->nullable();
			$table->decimal('Length')->nullable();
			$table->string('GroundColor')->nullable();
			$table->string('PantoneColor1')->nullable();
			$table->string('PantoneColor2')->nullable();
			$table->string('PantoneColor3')->nullable();
			$table->string('MerrowEdgeSize')->nullable();
			$table->string('MerrowEdgeColor')->nullable();
			$table->integer('status')->default(1);
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
        Schema::dropIfExists('testpatches');
    }
}
