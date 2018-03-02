<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniqueofficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniqueoffices', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('CustomerID')->unsigned();
			$table->string('Factory1OfficeFactoryName')->nullable();
			$table->integer('Factory1MarketingRegionID')->unsigned();
			$table->integer('Factory1ProductionRegionID')->unsigned();
			$table->string('Factory1MainContactFirstName')->nullable();
			$table->string('Factory1MainContactLastName')->nullable();
			$table->integer('Factory1PhoneNumber')->nullable();
			$table->string('Factory1Email')->nullable();
			$table->string('Factory1Suite')->nullable();
			$table->string('Factory1Street')->nullable();
			$table->string('Factory1City')->nullable();
			$table->integer('Factory1CountryID')->unsigned();
			$table->integer('Factory1StateID')->unsigned();
			$table->integer('Factory1ZIPcode')->nullable();
			$table->string('Factory2OfficeFactoryName')->nullable();
			$table->integer('Factory2MarketingRegionID')->nullable();
			$table->integer('Factory2ProductionRegionID')->nullable();
			$table->string('Factory2MainContactFirstName')->nullable();
			$table->string('Factory2MainContactLastName')->nullable();
			$table->integer('Factory2PhoneNumber')->nullable();
			$table->string('Factory2Email')->nullable();
			$table->string('Factory2Suite')->nullable();
			$table->string('Factory2Street')->nullable();
			$table->string('Factory2City')->nullable();
			$table->integer('Factory2CountryID')->unsigned();
			$table->integer('Factory2StateID')->unsigned();
			$table->integer('Factory2ZIPcode')->nullable();
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
        Schema::dropIfExists('uniqueoffices');
    }
}
