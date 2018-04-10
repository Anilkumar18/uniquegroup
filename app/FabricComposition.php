<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricComposition extends Model
{
    //
	protected $table = "fabricmaintenance";

  protected $fillable = [
    'id', 'customerID', 'suspendedCarePhrase','fibreContentsID','descEnglish','descFrench','descSpanish','descPolish','descChinese','descRomanian','descTurkish','descDanish','descCzech','descHungarian','descSlovak','descPortuguese','descFlemish','descItalian','descGreek','descJapanese','descGerman','descSlovenian','descBulgarian','descKorean','descRussian','descArabic','descIndonesian'
  ];
}
