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

use App\User;

use App\Exceptions\Handler;

use Illuminate\Support\Facades\DB;

use App\MarketingRegions;

use App\ProductionRegions;
use App\UserType;

use Illuminate\Support\Facades\Input;



class ProductionRegionController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

    // Office/Region List used in officeregions.blade to list using stored procedure

    public function viewproductionRegionList()
    {

        /*$user = Auth::user();

        $marketing_list = DB::select('call sp_selectMarketingRegions(1,0,"")');

        return view('admin.pdmmktproductionregions', ['Marketingregion' => $marketing_list,'user' =>$user]);*/

        $user = Auth::user();
         
          $mktdetails=MarketingRegions::all();
          $productiondetails=ProductionRegions::all();
          $usertype = UserType::where('id', '=', $user->userTypeID)->first();
        
        return view('admin.pdmmktproductionregions', compact('user','mktdetails','productiondetails','usertype'));
    }


    // Office/Region Add and Update used in officeregions.blade model popups using stored procedure

    public function addProductionRegion(Request $request)
    {
     
	//print_r($request);
	 //exit;
    	$user = Auth::user();

        if($request->productioneditID!='')
        {

            $productionregion = ProductionRegions::where('ProductionRegions', '=', $request->productionregionName)->first();

            if ($productionregion === null) {

             $Production_update = DB::select('call sp_CRUDProductionRegions(2,'.$request->productioneditID.',"'.$request->productionregionName.'",0)');   

             $request->session()->flash('success', 'Production Region updated successfully.');    

            }else{

                 $request->session()->flash('error', 'Production Region name already exits!');  
            }    

            return redirect(url(route('admin.productionregions')));   
        }else {
        
            $productionregion = ProductionRegions::where('ProductionRegions', '=', $request->productionregionName)->first();
            
            if ($productionregion === null) {
                        
                //$officer_insert = DB::select('call sp_selectMarketingRegions(1,0,"'.$request->regionName.'",1)');  
				 $officer_insert = DB::select('call sp_CRUDProductionRegions(1,0,"'.$request->productionregionName.'",1)');  
               
                $request->session()->flash('success', 'Production Region was successful added!');  

            }else{

                $request->session()->flash('error', 'Production Region name already exits!');  
            }
            
            return redirect(url(route('admin.productionregions')));
       } 
    }


     // Office/Region delete single/multiple using stored procedure

     public function delete(Request $request)
     {
       $user = Auth::user();

        //foreach ($request->ChkEvent as $key => $id) {        
          

         $productionregiondelete = DB::select('call sp_commonprocedure(3,'.$request->id.',"productionregions")'); 

        //}
        
        $request->session()->flash('error', 'Production Region deleted successfully.');     

        return redirect(url(route('admin.productionregions')));   
    }

    // Office/Region select and used the modal popup edit screen from ajax request from officeregion_custom.js

    public function productionRegionSelect(Request $request ,$id)
    {
	 
	  
	  // print_r($request);
       
        $production_data = ProductionRegions::where('id', '=', $id)->first();

       return json_encode(["success" => true, $production_data]);

    }

    public function addProductionRegionlist(Request $request)
      
      {
      
      
                             $user = Auth::user();
                             
                              if($request->productioneditID!="")
                              {
                                $checkproductionregion = ProductionRegions::where('ProductionRegions', '=', $request->productionregionName)
                                             ->where('id', '!=', $request->productioneditID)
                                             ->first();
                              
                            
                             
                             if($checkproductionregion===null && $checkproductionregion=='')
                                    {
                             $productionregion_updations = DB::select('call sp_CRUDProductionRegions(2,'.$request->productioneditID.',"'.$request->productionregionName.'",0)');  
                                $request->session()->flash('success', 'Production Region updated successfully!');  
                                
                                  
                                  }
                                   else{
                         
                         
                                             $request->session()->flash('error', 'Production Region already Exist!');  
                                            
                                             
                                             }
                    
                                         return redirect(url(route('users.productgroup')));
                              
                              }
                              else
                              {
                            
                                     $checkproductionregion = ProductionRegions::where('ProductionRegions', '=', $request->productionregionName)
                                             ->where('id', '!=', $request->productioneditID)
                                             ->first();
                                             
                                    
                                    if($checkproductionregion=== null)
                                        {
                                        
                                         
                                                                                                                                    
                                             $productgroup_insert = DB::select('call sp_CRUDProductionRegions(1,0,"'.$request->productionregionName.'",1)');  
                                                                       
                                            $request->session()->flash('success', 'Production Region added successfully !');  
                                                                    
                                                                    
                                             return redirect(url(route('admin.add_productionregion')));
                                          } 
                                          else
                                            {
                                             $request->session()->flash('error', 'Production Region already Exist!'); 
                                            
                                            }
                                            
                                         return redirect(url(route('admin.add_productionregion')));
                
                        }
                                                
                                                               
                    
            
                            
        
    }

    
}
