<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('CountryID')->unsigned();
			$table->integer('StateID')->unsigned();
			$table->string('CustomerName')->nullable();
			$table->string('MainContactFirstname')->nullable();
			$table->string('MainContactLastname')->nullable();
			$table->string('PhoneNumber')->nullable();
			$table->string('Email')->nullable();
			$table->string('Suite')->nullable();
			$table->string('Street')->nullable();
			$table->string('City')->nullable();
			$table->integer('ZIPcode');
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
        Schema::dropIfExists('customers');
    }
}
