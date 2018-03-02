<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productdetails', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('CustomerID');
			$table->integer('ProductGroupID');
			$table->integer('ProductionRegionID');
			$table->integer('ProductProcessID');
			$table->integer('ProductStatusID');
			$table->integer('PricingMethodID');
			$table->integer('UnitofMeasurementID');
			$table->integer('InventoryID');
			$table->string('Brand');
			$table->string('ProgramName');
			$table->string('CustomerProductCode');
			$table->string('UniqueProductCode');
			$table->string('CustomerProductName');
			$table->integer('ProductSubGroup');
			$table->string('ProductionLeadTime');
			$table->string('SampleLeadTime');
			$table->text('Description');
			$table->string('Currency');
			$table->integer('Version');
			$table->string('SampleRequestedDate');
			$table->integer('StyleNumber');
			$table->string('Season');
			$table->text('UniqueWarehouseAddress');
			$table->integer('MaximumPiecesOnStock');
			$table->integer('MinimumPiecesOnStock');
			$table->integer('MinimumOrderValue');
			$table->string('PackSize');
			$table->string('SellingPrice');
			$table->integer('NumberOfSamplesRequired');
			$table->integer('QuoteRequired');
			$table->text('RemarksInstructions');
			$table->string('ProductImage');
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
        Schema::dropIfExists('productdetails');
    }
}
