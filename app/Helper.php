<?php
/**
* change plain number to formatted currency
*
* @param $number
* @param $currency
*/
function formatNumber($number)
{
//   if($currency == 'USD') {
//        return number_format($number, 2, '.', ',');
//   }
   $submissiondetails = App\MarketingRegions::where('id','=',$number)->first();
   return $submissiondetails;
}

?>