<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZippercolorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zippercolor', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('chainID');
			$table->integer('productID');
			$table->string('zipperColor');
			$table->string('zipperDescription');
			$table->string('productImage');
			$table->string('productCost');
			$table->string('sellingPrice');
			$table->string('PackSize');
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
        Schema::dropIfExists('zippercolor');
    }
}
