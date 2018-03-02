<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryoriginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countryorigin', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('chainID');
			$table->string('suspendedCarePhrase');
			$table->string('countryID');
			$table->string('countryCode');
			$table->text('descriptionEnglish');
			$table->text('descriptionFrench');
			$table->text('descriptionSpanish');
			$table->text('descriptionPolish');
			$table->text('descriptionChinese');
			$table->text('descriptionRomanian');
			$table->text('descriptionTurkish');
			$table->text('descriptionDanish');
			$table->text('descriptionCzech');
			$table->text('descriptionHungarian');
			$table->text('descriptionSlovak');
			$table->text('descriptionPortuguese');
			$table->text('descriptionFlemish');
			$table->text('descriptionItalian');
			$table->text('descriptionGreek');
			$table->text('descriptionJapanese');
			$table->text('descriptionGerman');
			$table->text('descriptionSlovenian');
			$table->text('descriptionBulgarian');
			$table->text('descriptionKorean');
			$table->text('descriptionRussian');
			$table->text('descriptionArabic');
			$table->text('descriptionIndonesian');
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
        Schema::dropIfExists('countryorigin');
    }
}
