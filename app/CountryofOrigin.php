<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryofOrigin extends Model
{
    //
	protected $table = "countryoforiginmaintenance";

  protected $fillable = [
    'countryID', 'customerID', 'descEnglish','descFrench','descSpanish','descPolish','descChinese','descRomanian','descTurkish','descCzech','descHungarian','descSlovak','descPortuguese','descFlemish','descItalian','descGerman','descDanish','descBulgarian','descGreek','descRussian','descArabic','descIndonesian','status'
  ];
}
