<?php
namespace App\Http\Controllers\EcommerceMaintenance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\Eloquent\Model;
//Auth facade
use Auth, Storage, Log, View, App;
use App\Http\Requests;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use Hash;
use Validator;
Use Session;
use App\UserType;
use App\Garmentmaintenance;


class GarmentmaintenanceController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
	 public function index() 
	 {
         $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		
        return view('admin.pdmhome', compact('user','usertype'));
    }

     public function indexdevlopment() 

     {
        //echo "dfgbdf";exit;
         $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
        
        return view('admin.develop_home', compact('user','usertype','productgrouplist'));
    }


 public function garmentmaintenance(){
     $user = Auth::user();
      $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    return view('ecommercemaintenance.garmentmaintenance',compact('user','usertype'));
 }


public function addgarmentmaintenance(Request $request){
    $user = Auth::user();
   
$usertype = UserType::where('id', '=', $user->userTypeID)->first();

  $ZNumber = $request->input('ZNumber'); 
 $descEnglish= $request->input('descEnglish');
  $descFrench = $request->input('descFrench');
   $descSpanish = $request->input('descSpanish');
    $descPolishr= $request->input('descPolish');
     $descChinese = $request->input('descChinese');
      $descRomanian= $request->input('descRomanian');
       $descTurkish= $request->input('descTurkish');
        $descPortuguese = $request->input('descPortuguese'); 
        $descRussian = $request->input('descRussian'); 
        $descArabic = $request->input('descArabic');  
     $descKorean = $request->input('descKorean'); 
    $descIndonesian = $request->input('descrIndonesian'); 
   $descBulgarian = $request->input('descrBulgarian'); 
   $descSlovenian = $request->input('descSlovenian');

     $descGerman = $request->input('descGerman'); 
      $descJapanese = $request->input('descJapanese');

      $descGreek = $request->input('descGreek'); 
     $descItalian = $request->input('descItalian'); 
    $descFlemish = $request->input('descFlemish'); 
   $descSlovak = $request->input('descSlovak'); 

  $descHungarian = $request->input('descHungarian'); 
 $descCzech = $request->input('descCzech'); 
 $descDanish = $request->input('descDanish');
  $status= $request->input('status');
$CustomerID= $request->input('CustomerID');
$suspendedCarePhrase= $request->input('suspendedCarePhrase');
                                          
   if($request->input('editID')==""){
 $ProductDetails=Garmentmaintenance::create($request->all());

 return redirect(url(route('admin.garmentmaintenance')));
   }
   else{
    $Garmentmaintenance =Garmentmaintenance::find($request->editID);
 $Garmentmaintenance->ZNumber=$request->input('ZNumber'); 
 $Garmentmaintenance->descEnglish=$request->input('descEnglish');
  $Garmentmaintenance->descFrench=$request->input('descFrench');
   $Garmentmaintenance->descSpanish=$request->input('descSpanish');
    $Garmentmaintenance->descPolish=$request->input('descPolish');
     $Garmentmaintenance ->descChinese=$request->input('descChinese');
      $Garmentmaintenance->descRomanian=$request->input('descRomanian');
       $Garmentmaintenance->descTurkish=$request->input('descTurkish');
        $Garmentmaintenance->descPortuguese=$request->input('descPortuguese'); 
        $Garmentmaintenance->descRussian=$request->input('descRussian'); 
       $Garmentmaintenance ->descArabic=$request->input('descArabic'); 
       $Garmentmaintenance->descKorean=$request->input('descKorean'); 
    $Garmentmaintenance->descIndonesian=$request->input('descIndonesian'); 
    $Garmentmaintenance->descBulgarian=$request->input('descBulgarian'); 
      $Garmentmaintenance->descSlovenian=$request->input('descSlovenian');
       $Garmentmaintenance->descGerman=$request->input('descGerman'); 
    $Garmentmaintenance->descJapanese=$request->input('descJapanese');
$Garmentmaintenance ->descGreek=$request->input('descGreek'); 
  $Garmentmaintenance->descItalian= $request->input('descItalian'); 
$Garmentmaintenance->descFlemish=$request->input('descFlemish'); 
  $Garmentmaintenance->descSlovak=$request->input('descSlovak'); 
  $Garmentmaintenance->descHungarian=$request->input('descHungarian'); 
   $Garmentmaintenance->descCzech=$request->input('descCzech'); 
  $Garmentmaintenance->descDanish=$request->input('descDanish');
$Garmentmaintenance->save();
 }
 return redirect(url(route('admin.garmentmaintenance')));
}

public function deletegarmentmaintenance(Request $request, $id){
$user=Auth::user();
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
  $Garmentmaintenance=Garmentmaintenance::where('id',"=",$id)->get(); 
Garmentmaintenance::find($id)->delete();
  return redirect(url(route('admin.garmentmaintenance')));  


}


public function getgarmentmaintenance(Request $request, $id){
  $user=Auth::user();
  $garmentmaintenancedata=Garmentmaintenance::where('id',"=",$id)->get();
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
$data='';

foreach ($garmentmaintenancedata as $garmentmaintenance) {
  $data[]=$garmentmaintenance;
}
return json_encode($data);
}






public function viewgarmentmaintenance(Request $request, $id){
  $user=Auth::user();
  $garmentmaintenancedata=Garmentmaintenance::where('id',"=",$id)->get();
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
$data='';

foreach ($garmentmaintenancedata as $garmentmaintenance) {
  $data[]=$garmentmaintenance;
}
return json_encode($data);
}













public function garmentstickersymbolactivate(Request $request, $id){

      $user = Auth::user();
      $usertype = UserType::where('id', '=', $user->userTypeID)->first();

     $id=$request->id;

   $symbol_activate = DB::select('call sp_commonprocedure(1,'.$id.',"garmentmaintenance")'); 

      $request->session()->flash('success', 'garmentmaintenance(s) activated successfully.');     

         return redirect(url(route('admin.garmentmaintenance'))); 
   

}

public function garmentstickersymboldeactivate(Request $request, $id){
    $user = Auth::user();   
     $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    $id=$request->id;

      $symbol_activate = DB::select('call sp_commonprocedure(2,'.$id.',"garmentmaintenance")');
        
        
        $request->session()->flash('success', 'garmentmaintenance(s) deactivated successfully.');    

             //return view('admin.pdmnew', compact('user','usertype')); 
             return redirect(url(route('admin.garmentmaintenance')));  


}







}


?>