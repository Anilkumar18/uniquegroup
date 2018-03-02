<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWovenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('woven', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('CustomerID')->unsigned();
			$table->integer('TypeLabelID')->unsigned();
			$table->integer('SizerangeID')->unsigned();
			$table->integer('LanguageID')->unsigned();
			$table->integer('LoomtypeID')->unsigned();
			$table->integer('LoomHarnessID')->unsigned();
			$table->integer('WarpID')->unsigned();
			$table->integer('QualityID')->unsigned();
			$table->integer('TypeoffoldID')->unsigned();
			$table->integer('SewSpaceID')->unsigned();
			$table->integer('SlittingID')->unsigned();
			$table->string('Qualityreference')->nullable();
			$table->decimal('Width');
			$table->decimal('Length');
			$table->string('FinishedLength')->nullable();
			$table->string('GroundColor')->nullable();
			$table->string('Brocade1Color')->nullable();
			$table->string('Brocade2Color')->nullable();
			$table->string('Brocade3Color')->nullable();
			$table->string('Finishing')->nullable();
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
        Schema::dropIfExists('woven');
    }
}
