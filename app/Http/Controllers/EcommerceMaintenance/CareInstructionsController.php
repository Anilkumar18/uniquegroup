<?php

namespace App\Http\Controllers\EcommerceMaintenance;

use Illuminate\Http\Request; 

use App\Http\Requests; 

use App\Http\Controllers\Controller;

use Response;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\Eloquent\Model;

use Auth,Validator,Stroage,Log,View,App;

use App\User;

use DB;

use App\UserType;

use App\Symbol;

use App\Symbolimage;

use App\Customers;

use Session;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;

use App\ProductGroup;
use App\ProductSubGroup;
use App\Language;
use App\Careinstruction;
use Schema;

class CareInstructionsController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

  public function viewcarelist(Request $request) 
	 {
         $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		 
		 $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
		
        return view('care.careinstructionhome', compact('user','productgrouplist','usertype'));
    }

    public function getcarelist(Request $request) 
	 {
         $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		 $customerID=0;
		 // Customer ID 30 is for marks
		$carelanguage=DB::Select('call sp_getcarelanguage('.$customerID.')');
		$Careinstruction=Careinstruction::where('status',1)->get();
		//print_r($carelanguage);exit;
		 
		//echo $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();exit;
		 
		
        return view('care.careinstructiondata', compact('user','carelanguage','usertype','customerID','Careinstruction'));
    }
    public function getcaredetails(Request $request,$id) 
	 {
         $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		 //echo base64_decode($id);exit;
		 $caredata=explode('#', base64_decode($id));
		 $customerID=$caredata[0];
		 $caretype=strtolower(str_replace(' ','',$caredata[1]));

		 switch ($caretype) {
		 	case 'wash':
		 		$caretable='wash';
		 		$carefield='WashNames';
		 		break;
		 	case 'iron':
		 		$caretable='iron';
		 		$carefield='IronNames';
		 		break;
		 	case 'dryclean':
		 		$caretable='drycleaning';
		 		$carefield='DryCleaningNames';
		 		break;
		 	case 'dry':
		 		$caretable='dry';
		 		$carefield='DryNames';
		 		break;
		 	case 'bleach':
		 		$caretable='bleach';
		 		$carefield='BleachName';
		 		break;
		 	default:
		 		# code...
		 		break;
		 }
		 // Customer ID 30 is for marks
		$carelanguage=DB::Select('call sp_getcarelanguage('.$customerID.')');
		if (count($carelanguage) > 0){
			foreach($carelanguage as $languagelist){
                if($languagelist->status==1){
$processlan=explode('/', $languagelist->LanguageName);$languset='';
                      
foreach ($processlan as $lanvalue) {
     $languset.=strtolower(substr($lanvalue, 0, 3));
     $table=$caretable.$languset;
    if (Schema::hasTable($table)) {
    $carefielddetailslist[] = DB::table($table)->get();
}else{
    $carefielddetailslist[]='';
}
}
                }
            }
		}
$i=0;
		foreach ($carefielddetailslist as $typekey => $fabtypevalue) {
   
     if(is_object($fabtypevalue)){
        foreach ($fabtypevalue as $key => $fabvalue) {

            //echo '<pre>';print_r($value->FabricComposition);echo '</pre>';
         $fabprocessdetails[$i][]=$fabvalue->$carefield;
        }
    

    $i++;
}
    
}
//echo '<pre>';print_r($processdetails);echo '</pre>';
$arraylen=0;
for ($i=0; $i <count($fabprocessdetails) ; $i++) { 
    if(count($fabprocessdetails[$i])>$arraylen){$arraylen=count($fabprocessdetails[$i]);}
}
$cc=0;
for ($i=0; $i < $arraylen; $i++) { 
	$processcaredata=[];
    $j=0;

foreach($carelanguage as $languagelist){
   
                       if($languagelist->status==1){ 
                       $tablerow[$cc][]=isset($fabprocessdetails[$j][$i])?$fabprocessdetails[$j][$i]:'';
 $j++;
}
}
$cc++;

}
//echo '<pre>';print_r($tablerow);echo '</pre>';
return json_encode(["success" => true, $tablerow]);
		 
    }


}

?>
