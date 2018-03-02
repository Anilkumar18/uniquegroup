<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavedordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savedorders', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('SuserID');
			$table->integer('ScustomerID');
			$table->integer('SchainID');
			$table->integer('SregionID');
			$table->integer('SproductID');
			$table->string('Sponumber');
			$table->string('Spodate');
			$table->string('Squantity');
			$table->string('Ssize');
			$table->string('SstyleNo');
			$table->string('Sseason');
			$table->string('Scolour');
			$table->string('SproductsizeCode');
			$table->string('Ssizedetails');
			$table->string('Ssizequanitity');
			$table->string('SordersizeDetailsID');
			$table->string('Scountryofregion');
			$table->string('ScareCodeID');
			$table->integer('SorderwashsymbolID');
			$table->integer('SorderbleachsymbolID');
			$table->integer('SorderironsymbolID');
			$table->integer('SordertumblesymbolID');
			$table->integer('SorderdrycleansymbolID');
			$table->string('SmatericalSelect');
			$table->string('SmatericalGarselect');
			$table->integer('SSelFibreID1');
			$table->integer('SSelFibreID2');
			$table->integer('SSelFibreID3');
			$table->integer('SSelFibreID4');
			$table->integer('SSelFibreID5');
			$table->integer('SSelFibreID6');
			$table->integer('SSelFibreID7');
			$table->integer('SSelFibreID8');
			$table->integer('SfibrePer1');
			$table->integer('SfibrePer2');
			$table->integer('SfibrePer3');
			$table->integer('SfibrePer4');
			$table->integer('SfibrePer5');
			$table->integer('SfibrePer6');
			$table->integer('SfibrePer7');
			$table->integer('SfibrePer8');
			$table->integer('Sfabrictotal');
			$table->integer('SGarmentselectedID1');
			$table->integer('SGarmentselectedID2');
			$table->integer('SGarmentselectedID3');
			$table->integer('SGarmentselectedID4');
			$table->integer('SGarmentselectedID5');
			$table->integer('SGarmentselectedID6');
			$table->integer('SGarmentselectedID7');
			$table->integer('SGarmentselectedID8');
			$table->string('SSelGarmentFibreID1');
			$table->string('SSelGarmentFibreID2');
			$table->string('SSelGarmentFibreID3');
			$table->string('SSelGarmentFibreID4');
			$table->string('SSelGarmentFibreID5');
			$table->string('SSelGarmentFibreID6');
			$table->string('SSelGarmentFibreID7');
			$table->string('SSelGarmentFibreID8');
			$table->string('SGarmentFibrePerc1');
			$table->string('SGarmentFibrePerc2');
			$table->string('SGarmentFibrePerc3');
			$table->string('SGarmentFibrePerc4');
			$table->string('SGarmentFibrePerc5');
			$table->string('SGarmentFibrePerc6');
			$table->string('SGarmentFibrePerc7');
			$table->string('SGarmentFibrePerc8');
			$table->string('SorderGarmentID');
			$table->integer('Sexclusive_trims');
			$table->integer('Sexclusive_decoration');
			$table->integer('Sstepcount');
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
        Schema::dropIfExists('savedorders');
    }
}
