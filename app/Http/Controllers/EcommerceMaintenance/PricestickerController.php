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
Use App\ProductGroup;
Use App\ProductSubGroup;
use App\UserType;
use App\Pricesticker;

class PricestickerController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
	public function ProductGroupList()
	{

	
	    $user = Auth::user();
		
	 
	   $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
	   
	   $productsubgrouplist=ProductSubGroup::where('Product_groupID','=',1)->where('status','=',1)->orderBy('id','ASC')->get();
		
		$usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 return view('admin.pdmproductgroups',compact('user','productgrouplist','productsubgrouplist','usertype'));
	
	}
   
   public function addProductGrouplist(Request $request)
      
      {
	  
	  
                             $user = Auth::user();
                            
							  if($request->editID!="")
							  {
							    $checkproductgroup = ProductGroup::where('ProductGroup', '=', $request->groupCode)
											 ->where('id', '!=', $request->editID)
											 ->first();
							  
						
							 
							 if($checkproductgroup===null && $checkproductgroup=='')
									{
							 $productgroup_updations = DB::select('call sp_CRUDProductGroup(2,'.$request->editID.',"'.$request->groupCode.'",0)');  
								$request->session()->flash('success', 'Product Group(s) updated successfully!');  
								  //return redirect(url(route('users.productgroup')));
								  
								  }
								   else{
											 $request->session()->flash('error', 'Product Group already Exist!');  
											
											 
											 }
					
										 return redirect(url(route('admin.pdmproductgroups')));
							  
							  }
							  else
							  {
							
				                     $checkproductgroup = ProductGroup::where('ProductGroup', '=', $request->groupCode)
											 ->where('id', '!=', $request->editID)
											 ->first();
											 
				                    
									if($checkproductgroup=== null)
			                        	{
										
										 
																																	
											 $productgroup_insert = DB::select('call sp_CRUDProductGroup(1,0,"'.$request->groupCode.'",1)');  
																	   
										    $request->session()->flash('success', 'Product Group(s) was successful added!');  
																	
																	
		                                     return redirect(url(route('admin.pdmproductgroups')));
										  } 
										  else
											{
											 $request->session()->flash('error', 'ProductGroup already Exist!'); 
											
											}
											
						                 return redirect(url(route('admin.pdmproductgroups')));
				
						}
												
															   
					
			
							
        
	}
	
	

	  public function delete(Request $request,$id)
     {
       $user = Auth::user();
	  
           $checkproductsubgroup=ProductSubGroup::where('Product_groupID',"=",$id)->first();
		   
		    if($checkproductsubgroup===null && $checkproductsubgroup=='')
          
            {
         $productgroup_delete = DB::select('call sp_commonprocedure(3,'.$id.',"productgroup")'); 

       
		
		
        $request->session()->flash('error', 'Product Group(s) deleted successfully.');     

        return redirect(url(route('admin.pdmproductgroups')));	
		
		}
		else
		{
		 $request->session()->flash('error', 'This Product Group has Subgroup associated. Cannot Delete the Product Group'); 
		}
		
		  return redirect(url(route('admin.pdmproductgroups')));	
    }


public function ProductGroupSelect(Request $request,$id)
	{
	
		
	$productgrouplist=DB::select('call sp_selectproductgroup(2,'.$id.')');	  

	
	$count=count($productgrouplist);
	
	if ($count) {
		
	 foreach ($productgrouplist as $productgrouplists)
        {

            $data[]=$productgrouplists;

        }
	}else{
	
		 $data[]='null';
	}	
	
	
	
	return json_encode($data);

  
  
   }

//purushothaman_29_03_2018
public function addProductstorelist(Request $request){
	  $user = Auth::user();
     $usertype = UserType::where('id', '=', $user->userTypeID)->first();
  $poName = $request->input('poName'); 
 $colorCode= $request->input('colorCode');
  $basicColor = $request->input('basicColor');
   $frenchColor = $request->input('frenchColor');
    $fallallColour= $request->input('fallallColour');
     $outerWear = $request->input('outerWear');
      $activeColor= $request->input('activeColor');
       $sleepWear = $request->input('sleepWear');
        $healthWear = $request->input('healthWear'); 
        $status = $request->input('status'); 
        
         
    if($request->input('editID')==""){
$ProductDetails = Pricesticker::create($request->all());
 return redirect(url(route('admin.pricesticker')));
   }
   else{
   	$Productstore = Pricesticker::find($request->editID);

$Productstore->poName= $request->input('poName');
$Productstore->colorCode= $request->input('colorCode');
$Productstore->basicColor= $request->input('basicColor');
$Productstore->frenchColor= $request->input('frenchColor');
$Productstore->fallallColour= $request->input('fallallColour');
$Productstore->outerWear= $request->input('outerWear');
$Productstore->activeColor= $request->input('activeColor');
$Productstore->sleepWear= $request->input('sleepWear');
$Productstore->healthWear= $request->input('healthWear');

$Productstore->save();
 //return view('admin.pdmnew', compact('user','usertype'));
   }
  return redirect(url(route('admin.pricesticker')));
}



////purushothaman_29_03_2018
public function getpricestickerdetails(Request $request, $id){

	$user=Auth::user();
     $pricesticker=Pricesticker::where('id',"=",$id)->get();

$usertype = UserType::where('id', '=', $user->userTypeID)->first();
$data='';
foreach ($pricesticker as $pricestickerdata) {
	$data[]=$pricestickerdata;
}
	//return view('admin.addvendors', compact('user','usertype'));

return json_encode($data);



}

//purushothaman_29_03_2018 
public function deletepricestickerdetails(Request $request, $id){

$user=Auth::user();
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
  $pricestickerdetail=Pricesticker::where('id',"=",$id)->get(); 
Pricesticker::find($id)->delete();
  return redirect(url(route('admin.pricesticker')));	

//return redirect(url('admin.pdmnew'));




}

//purushothaman_30_03_2018 
public function stickersymbolactivate(Request $request, $id){

	    $user = Auth::user();
	    $usertype = UserType::where('id', '=', $user->userTypeID)->first();

		 $id=$request->id;

	 $symbol_activate = DB::select('call sp_commonprocedure(1,'.$id.',"pricesticker")'); 

	    $request->session()->flash('success', 'pricesticker(s) activated successfully.');     

      //return view('admin.pdmnew', compact('user','usertype'));

         return redirect(url(route('admin.pricesticker')));	
   

}

//purushothaman_30_03_2018 
public function stickersymboldeactivate(Request $request, $id){
    $user = Auth::user();   
		 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		$id=$request->id;

		  $symbol_activate = DB::select('call sp_commonprocedure(2,'.$id.',"pricesticker")');
		  	
        
        $request->session()->flash('success', 'pricesticker(s) deactivated successfully.');    

             //return view('admin.pdmnew', compact('user','usertype')); 
             return redirect(url(route('admin.pricesticker')));	 


}



public function viewpricestickermaintenance(Request $request, $id){
  $user=Auth::user();
  $pricestickerdata=Pricesticker::where('id',"=",$id)->get();
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
$data='';

foreach ($pricestickerdata as $pricesticker) {
  $data[]=$pricesticker;
}
return json_encode($data);
}














}
?>