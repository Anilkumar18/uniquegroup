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


class PdmProductgroupsController extends Controller
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

}
?>