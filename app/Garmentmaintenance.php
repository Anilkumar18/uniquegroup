<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garmentmaintenance extends Model
{
    //
	protected $table ="garmentmaintenance";

  protected $fillable = [
'descEnglish','descFrench','descSpanish','descPolish','descChinese','descRomanian',
  'descTurkish','descPortuguese','descRussian','descArabic','descHebrew','descKorean','descIndonesian','descBulgarian', 'descSlovenian','descGerman', 'descJapanese',
'descGreek' ,'descItalian', 'descFlemish' ,'descSlovak' ,'descHungarian', 'descCzech',
'descDanish','status','ZNumber','CustomerID','suspendedCarePhrase'



  ];
}
