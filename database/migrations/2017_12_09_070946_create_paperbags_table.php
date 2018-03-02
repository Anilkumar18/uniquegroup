<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperbagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paperbags', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('CustomerID')->unsigned();
			$table->integer('MaterialID')->unsigned();
			$table->integer('CuttingID')->unsigned();
			$table->integer('PrintingFinishingProcessID')->unsigned();
			$table->integer('PackagingStickersID')->unsigned();
			$table->integer('TissuePaperID')->unsigned();
			$table->integer('PrintType')->unsigned();
			$table->string('QualityReference')->nullable();
			$table->integer('Thickness')->nullable();
			$table->decimal('Width')->nullable();
			$table->decimal('Length')->nullable();
			$table->decimal('Height')->nullable();
			$table->string('HandleMaterial')->nullable();
			$table->integer('HandleWidth')->nullable();
			$table->integer('HandleLength')->nullable();
			$table->string('HandleFastening')->nullable();
			$table->integer('FoldOverWidth')->nullable();
			$table->string('Reinforcements')->nullable();
			$table->string('GroundPaperColor')->nullable();
			$table->integer('CMYK')->nullable();
			$table->string('PrintColor1')->nullable();
			$table->string('PrintColor2')->nullable();
			$table->string('PrintColor3')->nullable();
			$table->string('PrintColor4')->nullable();
			$table->string('PrintColor5')->nullable();
			$table->string('PrintColor6')->nullable();
			$table->string('PrintColor7')->nullable();
			$table->string('PrintColor8')->nullable();
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
        Schema::dropIfExists('paperbags');
    }
}
