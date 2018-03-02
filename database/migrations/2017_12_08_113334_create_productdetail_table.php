<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productdetail', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('CustomerID')->unsigned();
			$table->integer('ProductGroupID')->unsigned();
			$table->integer('ProductSubGroupID')->unsigned();
			$table->integer('SeasonID')->unsigned();
			$table->integer('ProductStatusID')->unsigned();
			$table->integer('ProductProcessID')->unsigned();
			$table->integer('ProductionRegionID1')->unsigned();
			$table->integer('ProductionRegionID2')->unsigned();
			$table->integer('PricingMethodID')->unsigned();
			$table->integer('CurrencyID')->unsigned();
			$table->integer('UnitofMeasurementID')->unsigned();
			$table->integer('InventoryID')->unsigned();
			$table->integer('UniqueFactory1')->unsigned();
			$table->integer('UniqueFactory2')->unsigned();
			$table->string('Brand');
			$table->string('ProgramName');
			$table->string('CustomerProductName');
			$table->string('CustomerProductCode');
			$table->string('UniqueProductCode');
			$table->text('Description');
			$table->integer('StyleNumber');
			$table->integer('Version');
			$table->integer('MinimumOrderQuantity');
			$table->integer('MinimumOrderValue');
			$table->string('PackSize');
			$table->string('SellingPrice');
			$table->integer('MaximumPiecesOnStock');
			$table->integer('MinimumPiecesOnStock');
			$table->string('SampleRequestedDate');
			$table->integer('SampleRequestNumber');
			$table->integer('NumberOfSamplesRequired');
			$table->integer('QuoteRequired');
			$table->string('SampleLeadTime');
			$table->string('ProductionLeadTime');
			$table->text('RemarksInstructions');
			$table->string('Artworkupload');
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
        Schema::dropIfExists('productdetail');
    }
}
