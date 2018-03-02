<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('chainID');
			$table->string('ordering_officeID');
			$table->string('production_officeID')->default(0);
			$table->integer('marketingRegion_ID')->default(0);
			$table->integer('enduse_ID')->default(0);
			$table->integer('labeltype_ID')->default(0);
			$table->integer('product_groupID')->default(0);
			$table->integer('brand_ID')->default(0);
			$table->string('product_code');
			$table->string('alter_productcode')->default('NULL');
			$table->text('product_description');
			$table->text('product_searchtext');
			$table->string('fsc_certificatecode')->default('NULL');
			$table->string('carelabel_quest')->default('NULL');
			$table->string('bundle_quantity')->default('NULL');
			$table->string('unit_measure')->default('NULL');
			$table->string('available_manualorder')->default('NULL');
			$table->string('reason_suspended')->default('NULL');
			$table->string('additional_info')->default('NULL');
			$table->string('tariff_code')->default('NULL');
			$table->string('fsc_expirydate')->default('NULL');
			$table->string('stock_itemsizing')->default('NULL');
			$table->string('pack_size')->default('NULL');
			$table->string('selling_price')->default('NULL');
			$table->string('minimum_orderqty')->default('NULL');
			$table->string('suspended_product')->default('NULL');
			$table->string('fabric_qty')->default('NULL');
			$table->string('product_width')->default('NULL');
			$table->string('product_length')->default('NULL');
			$table->string('product_textcolor')->default('NULL');
			$table->string('product_copyright')->default('NULL');
			$table->string('product_caution')->default('NULL');
			$table->string('product_cuttingmethod')->default('NULL');
			$table->string('product_vendorID')->default('NULL');
			$table->string('product_province')->default('NULL');
			$table->string('product_country')->default('NULL');
			$table->string('product_backcolour')->default('NULL');
			$table->string('product_pantone')->default('NULL');
			$table->string('product_styleno')->default('NULL');
			$table->string('product_careset')->default('NULL');
			$table->string('product_caresymbols')->default('NULL');
			$table->string('product_carephrases')->default('NULL');
			$table->string('product_carecity')->default('NULL');
			$table->integer('product_type')->default(0);
			$table->string('stockproduct_code')->default('NULL');
			$table->string('stockproduct_group')->default('NULL');
			$table->string('stockminimum_ordercharge')->default('NULL');
			$table->string('stockminimum_code')->default('NULL');
			$table->string('imgInp')->default('NULL');
			$table->string('artworkimg1')->default('NULL');
			$table->string('artworkimg2')->default('NULL');
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
        Schema::dropIfExists('product');
    }
}
