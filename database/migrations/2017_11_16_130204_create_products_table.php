<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('customerID');
			$table->string('CustomerName');
			$table->string('ProductCode');
			$table->integer('ProductGroup');
			$table->integer('Productsubgroup');
			$table->integer('ProductType');
			$table->text('Description');
			$table->string('Stock');
			$table->string('StockWarehouse');
			$table->string('MinimumOrderQuantity');
			$table->string('PackSize');
			$table->string('ProductImage');
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
        Schema::dropIfExists('products');
    }
}
?>