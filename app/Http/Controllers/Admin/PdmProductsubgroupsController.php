<?php
namespace App\Http\Controllers\Admin;
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


class PdmProductsubgroupsController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
	public function ProductSubGroupList()
	{

	
	    $user = Auth::user();
		
	 
	   $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
	   
	   
	   $productsubgrouplist=ProductSubGroup::where('Product_groupID','=',$productgrouplist->id)->get();
	   
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		
	 return view('admin.pdmproductgroups',compact('user','productsubgrouplist','usertype'));
	
	}
   
   public function addProductSubGrouplist(Request $request)
      
      {
	  
	  
                              $user = Auth::user();
							  
							  
                             
							
							  if($request->editID1!="")
							  {
							    $checkproductsubgroup = ProductSubGroup::where('ProductSubGroupName', '=', $request->subgroupCode)
											 ->where('id', '!=', $request->editID1)
											 ->first();
							  
							 // echo $request->groupCode;exit;
							 
							 if($checkproductsubgroup===null && $checkproductsubgroup=='')
									{
							 //$productgroup_updations = DB::select('call sp_CRUDProductsubGroup(2,'.$customerID.','.$request->editID.',"'.$request->groupCode.'",0)');  
							 $productsubgroup_updations = DB::select('call sp_CRUDProductsubGroup(2,'.$request->productgroup.','.$request->editID1.',"'.$request->subgroupCode.'",0)');  
								$request->session()->flash('success', 'Packaging Sub Group(s) updated successfully!');  
								  //return redirect(url(route('users.productgroup')));
								  
								  }
								   else{
						 
						 
											 $request->session()->flash('error', 'Packaging Sub Group Item already Exist!');  
											
											 
											 }
					
										 return redirect(url(route('admin.pdmproductgroups')));
							  
							  }
							  else
							  {
							
				                     $checkproductsubgroup = ProductSubGroup::where('ProductSubGroupName', '=', $request->subgroupCode)
											 ->where('id', '!=', $request->editID1)
											 ->first();
											 
				                    
									if($checkproductsubgroup=== null)
			                        	{
										
										//echo $request->productgroup;exit;
										 
																																	
				$productsubgroup_insert = DB::select('call sp_CRUDProductsubGroup(1,'.$request->productgroup.',0,"'.$request->subgroupCode.'",1)');  
																	   
										    $request->session()->flash('success', 'Packaging Sub Group(s) was successful added!');  
																	
																	
		                                     return redirect(url(route('admin.pdmproductgroups')));
										  } 
										  else
											{
											 $request->session()->flash('error', 'Packaging Sub Group Item already Exist!'); 
											
											}
											
						                 return redirect(url(route('admin.pdmproductgroups')));
				
						}
												
															   
					
			
							
        
	}
	

	  public function delete(Request $request,$id)
     {
       $user = Auth::user();
	  
              
          

         $fibre_delete = DB::select('call sp_commonprocedure(3,'.$id.',"productsubgroup")'); 

       
		
		
        $request->session()->flash('error', 'Packaging Sub Group(s) deleted successfully.');     


        return redirect(url(route('admin.pdmproductgroups')));	
		 
    }


public function ProductSubGroupSelect(Request $request,$id)
	{
	
		
	$productsubgrouplist=DB::select('call sp_selectsubproductgroup(2,'.$id.')');	  

	
	$count=count($productsubgrouplist);
	
	if ($count) {
		
	 foreach ($productsubgrouplist as $productsubgrouplists)
        {

            $data[]=$productsubgrouplists;

        }
	}else{
	
		 $data[]='null';
	}	
	
	
	
	return json_encode($data);

  
  
   }
}
?>