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

use Illuminate\Support\Facades\Input;

use App\UserType;



class MarketingRegionController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

    // Office/Region List used in officeregions.blade to list using stored procedure

    public function viewmarketingRegionList()
    {

        /*$user = Auth::user();

        $marketing_list = DB::select('call sp_selectMarketingRegions(1,0,"")');

        return view('admin.pdmmktproductionregions', ['Marketingregion' => $marketing_list,'user' =>$user]);*/

        $user = Auth::user();
        $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         
          $mktdetails=MarketingRegions::all();
          $productiondetails=ProductionRegions::all();
        
        return view('admin.pdmmktproductionregions', compact('user','mktdetails','productiondetails','usertype'));
    }


    // Office/Region Add and Update used in officeregions.blade model popups using stored procedure

    public function addMarketingRegion(Request $request)
    {
     
	//print_r($request);
	 //exit;
    	$user = Auth::user();

        if($request->editID!='')
        {

            $region = MarketingRegions::where('MarketingRegions', '=', $request->regionName)->first();

            if ($region === null) {

             $Marketing_update = DB::select('call sp_CRUDMarketingRegions(2,'.$request->editID.',"'.$request->regionName.'",0)');   

             $request->session()->flash('success', 'Marketing Region updated successfully.');    

            }else{

                 $request->session()->flash('error', 'Marketing Region name already exits!');  
            }    

            return redirect(url(route('admin.marketingregions')));   
        }else {
        
            $region = MarketingRegions::where('MarketingRegions', '=', $request->regionName)->first();
            
            if ($region === null) {
                        
                //$officer_insert = DB::select('call sp_selectMarketingRegions(1,0,"'.$request->regionName.'",1)');  
				 $officer_insert = DB::select('call sp_CRUDMarketingRegions(1,0,"'.$request->regionName.'",1)');  
               
                $request->session()->flash('success', 'Marketing/Region was successful added!');  

            }else{

                $request->session()->flash('error', 'Marketing/Region name already exits!');  
            }
            
            return redirect(url(route('admin.marketingregions')));
       } 
    }

    // Office/Region Deactivate single/multiple using stored procedure

    public function deActivate(Request $request)
     {
       
        $user = Auth::user();       

        foreach ($request->ChkEvent as $key => $id) {                

            $officer_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"marketingregion")');

         }
        
        $request->session()->flash('success', 'Marketing/Region(s) deactivated successfully.');     

        return redirect(url(route('admin.marketingregions')));   

     }

    // Office/Region activate single/multiple using stored procedure

     public function activate(Request $request)
     {
       
        $user = Auth::user();

        foreach ($request->ChkEvent as $key => $id) {      
           
            $officer_activate = DB::select('call sp_commonprocedure(1,'.$id.',"marketingregion")');

        }
        
        $request->session()->flash('success', 'marketing/Region(s) activated successfully.');     

        return redirect(url(route('admin.marketingregions')));   

     }

     // Office/Region delete single/multiple using stored procedure

     public function delete(Request $request)
     {
       $user = Auth::user();

        //foreach ($request->ChkEvent as $key => $id) {        
          

         $marketingregiondelete = DB::select('call sp_commonprocedure(3,'.$request->id.',"marketingregions")'); 

        //}
        
        $request->session()->flash('error', 'Marketing Region deleted successfully.');     

        return redirect(url(route('admin.marketingregions')));   
    }

    // Office/Region select and used the modal popup edit screen from ajax request from officeregion_custom.js

    public function marketingRegionSelect(Request $request ,$id)
    {
	 
	  
	  // print_r($request);
       
        $marketing_data = MarketingRegions::where('id', '=', $id)->first();

       return json_encode(["success" => true, $marketing_data]);

    }

    public function addMarketingRegionlist(Request $request)
      
      {
      
      
                             $user = Auth::user();
                             
                              if($request->editID!="")
                              {
                                $checkmarketingregion = MarketingRegions::where('MarketingRegions', '=', $request->regionName)
                                             ->where('id', '!=', $request->editID)
                                             ->first();
                              
                            
                             
                             if($checkmarketingregion===null && $checkmarketingregion=='')
                                    {
                             $marketingregion_updations = DB::select('call sp_CRUDMarketingRegions(2,'.$request->editID.',"'.$request->regionName.'",0)');  
                                $request->session()->flash('success', 'Marketing Region updated successfully!');  
                                
                                  
                                  }
                                   else{
                         
                         
                                             $request->session()->flash('error', 'Marketing Region already Exist!');  
                                            
                                             
                                             }
                    
                                         return redirect(url(route('users.productgroup')));
                              
                              }
                              else
                              {
                            
                                     $checkmarketingregion = MarketingRegions::where('MarketingRegions', '=', $request->regionName)
                                             ->where('id', '!=', $request->editID)
                                             ->first();
                                             
                                    
                                    if($checkmarketingregion=== null)
                                        {
                                        
                                         
                                                                                                                                    
                                             $productgroup_insert = DB::select('call sp_CRUDMarketingRegions(1,0,"'.$request->regionName.'",1)');  
                                                                       
                                            $request->session()->flash('success', 'Marketing Region added successfully !');  
                                                                    
                                                                    
                                             return redirect(url(route('admin.add_marketingregion')));
                                          } 
                                          else
                                            {
                                             $request->session()->flash('error', 'Marketing Region already Exist!'); 
                                            
                                            }
                                            
                                         return redirect(url(route('admin.add_marketingregion')));
                
                        }
                                                
                                                               
                    
            
                            
        
    }

    
}
