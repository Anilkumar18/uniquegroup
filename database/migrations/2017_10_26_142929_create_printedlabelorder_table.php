<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintedlabelorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printedlabelorder', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('PuserID');
			$table->integer('PcustomerID');
			$table->integer('PchainID');
			$table->integer('PregionID');
			$table->integer('PproductID');
			$table->string('Pponumber');
			$table->string('Ppodate');
			$table->string('Pquantity');
			$table->string('Psize');
			$table->string('PstyleNo');
			$table->string('Pseason');
			$table->integer('Pproducttype');
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
        Schema::dropIfExists('printedlabelorder');
    }
}
