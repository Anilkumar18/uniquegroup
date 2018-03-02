<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSymbolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symbols', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('chainID');
			$table->string('suspendedCarePhrase');
			$table->text('descriptionEnglish');
			$table->text('descriptionFrench');
			$table->text('descriptionSpanish');
			$table->text('descriptionPolish');
			$table->text('descriptionChinese');
			$table->text('descriptionRomanian');
			$table->text('descriptionTurkish');
			$table->text('descriptionPortuguese');
			$table->text('descriptionRussian');
			$table->string('symbolType');
			$table->integer('imageID');
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
        Schema::dropIfExists('symbols');
    }
}
