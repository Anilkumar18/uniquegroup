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

use App\ProductDetails;

use App\ProductionRegions;

use App\ProductDetailFields;

use App\ProductDetailsCategory;

use App\Zippercolor;

use Illuminate\Support\Facades\Input;

use App\UserType;

use Session;

class ProductDetailsController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

    // Office/Region List used in officeregions.blade to list using stored procedure

    public function viewProductDetailList()
    {

        /*$user = Auth::user();

        $marketing_list = DB::select('call sp_selectMarketingRegions(1,0,"")');

        return view('admin.pdmmktproductionregions', ['Marketingregion' => $marketing_list,'user' =>$user]);*/

        $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
          $mktdetails=MarketingRegions::all();
          $productiondetails=ProductionRegions::all();
          //$columnsname = DB::getSchemaBuilder()->getColumnListing('productdetails');
         // $columnsname->renameColumn('status', 'status1')->comment = "New Comment of Product name column";
         //$columnsname1 = MarketingRegions::with('comments')->get();
        /*$aa= 'productdetails';
        $columnsname= DB::select('SELECT a.COLUMN_NAME FROM information_schema.COLUMNS a WHERE a.TABLE_NAME = "'.$aa.'"');
         //print_r($columnsname); exit;
         foreach ($columnsname as $col) {
               print_r($col);echo "<br/>";
           }  
        exit;*/
        $productdetaillist=ProductDetailsCategory::all();

        return view('admin.pdmproductdetails', compact('user','mktdetails','productdetaillist','columnsname','usertype'));
    }

public function ProductDetailSelect(Request $request ,$id)
    {
     
      
      // print_r($request);
       
        $productdetails_data = ProductDetailFields::where('id', '=', $id)->first();
       /* $columnsname= DB::select('SELECT a.COLUMN_NAME. a.COLUMN_TYPE FROM information_schema.COLUMNS a WHERE a.TABLE_NAME = "'.$tablename.'" and a.column_comment = "'.$productdetails_data->fieldname.'"');
        print_r($columnsname); exit;*/

       return json_encode(["success" => true, $productdetails_data]);

    }

    public function ProductDetaildelete(Request $request)
     {
       $user = Auth::user();

        //foreach ($request->ChkEvent as $key => $id) {        
          

         $marketingregiondelete = DB::select('call sp_commonprocedure(2,'.$request->id.',"productdetailfields")'); 

        //}
        
        $request->session()->flash('error', 'Field Name removed from product details successfully.');     

        return redirect(url(route('admin.productdetails')));   
    }

    public function addProductDetails(Request $request)
      
      {
      
      
                             $user = Auth::user();
                             
            
                              if($request->editID!="")
                              {
                                $checkproductdetails = ProductDetailFields::where('fieldname', '=', $request->fieldname)
                                             ->where('id', '!=', $request->editID)
                                             ->first();
                              
                                             
                             
                             if($checkproductdetails===null && $checkproductdetails=='')
                                    {
                                        $checkproductdetailsfieldID = ProductDetailFields::where('id', '=', $request->editID)->first();
                                        $tablename='productdetails';
										

        $colum= DB::select('SELECT a.COLUMN_NAME, a.COLUMN_TYPE FROM information_schema.COLUMNS a WHERE a.TABLE_NAME = "'.$tablename.'" and a.column_comment = "'.$checkproductdetailsfieldID->fieldname.'"');
		
		
		
        foreach($colum as $col)
        {
            $columnnames = $col->COLUMN_NAME;
        $columntype = $col->COLUMN_TYPE;
       
      
 
        $commentupdate = DB::select('ALTER TABLE '.$tablename.'
CHANGE COLUMN '.$columnnames.' '.$columnnames.' '.$columntype.' COMMENT "'.$request->fieldname.'"');     
                               
               
               }             
                 $productdetail_updations = DB::select('call sp_CRUDProductdetailsfields(2,'.$request->editID.',"'.$request->fieldname.'","'.$request->productdetailcategory.'",0)');  
                                $request->session()->flash('success', 'Field Name updated successfully!');                 
                                  }
                                   else{
                         
                         
                                             $request->session()->flash('error', 'Field Name already Exist!');  
                                            
                                             
                                             }
                    
                                         return redirect(url(route('admin.productdetails')));
                              
                              }
                              else
                              {
                                      $tablename= 'productdetails';
                                     $checkproductdetails = ProductDetailFields::where('fieldname', '=', $request->fieldname)
                                             ->where('id', '!=', $request->editID)
                                             ->first();
											 
         /*  $check_columnname= DB::select('SELECT a.COLUMN_NAME, a.COLUMN_TYPE FROM information_schema.COLUMNS a WHERE a.TABLE_NAME = "'.$tablename.'" and a.column_comment = "'.$request->fieldname.'"');

     foreach($check_columnname as $col)
        {
           echo $columnnames = $col->COLUMN_NAME;
       
		}*/
                                             
                                    
                                    if($checkproductdetails=== null)
                                        {
										
                                        
                                         //$tablename= 'productdetails';
										 
										// echo $request->fieldname;exit;
										
										

                                        
       $a = ' ';
        $b = '';
        $fielddatatype = 'VARCHAR(255)';
        $nospace = DB::select('SELECT replace("'.$request->fieldname.'","'.$a.'", "'.$b.'") as textstring');
        foreach($nospace as $nospacefieldname)
        {
           $nospacefieldnametextstring = $nospacefieldname->textstring;
        
        //print_r($nospacefieldname->textstring);
        $productdetaillist=ProductDetailsCategory::where('id', '=', $request->productdetailcategory)->first();                             
		// print_r($productdetaillist->id);
		
		/*checkfieldname already exist*/
		$check_columnname= DB::select('SELECT a.COLUMN_NAME, a.COLUMN_TYPE FROM information_schema.COLUMNS a WHERE a.TABLE_NAME = "'.$tablename.'" and a.column_comment = "'.$request->fieldname.'"');
		
		 foreach($check_columnname as $col)
        {
            $columnnames = $col->COLUMN_NAME;
			if($columnnames!="")
			{
			  $request->session()->flash('error', 'Field Name already Exist!'); 
			   return redirect(url(route('admin.productdetails')));
			}
       
		}
		
		
		
           $commentupdate = DB::select('ALTER TABLE '.$tablename.'
ADD COLUMN '.$nospacefieldnametextstring.' '.$fielddatatype.' COMMENT "'.$request->fieldname.'"'); 
                                                  

                                             $productgroup_insert = DB::select('call sp_CRUDProductdetailsfields(1,0,"'.$request->fieldname.'","'.$productdetaillist->id.'",1)');  
                                                                       
                                            $request->session()->flash('success', 'Field Name added successfully !');  
                                                                    
                                                   }                 
                                             return redirect(url(route('admin.productdetails')));

                                          } 
                                          else
                                            {
                                             $request->session()->flash('error', 'Field Name already Exist!'); 
                                            
                                            }
                                            
                                         return redirect(url(route('admin.productdetails')));
                
                        }
                                                
                                                               
                    
            
                            
        
    }

    public function getproductmaintenance(Request $request,$id){
      $customerid=Session::get('customername');
      //$productdetails=ProductDetails::where('status','=',1)->where('ProductGroupID','=',$id)->where('CustomerID','=',$customerid->id)->get();
$user = Auth::user();
      $processid=explode('#',base64_decode($id));
      $id=$processid[0];
   $subgroupid=$processid[1];
  $carestatus=$processid[2];
        $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         $ProductionRegions=ProductionRegions::where('status', '=', 1)->get();
           $productcustomerID=$customerid->id;
          $usertypeID=$user->userTypeID;
           $ProductGroupID=$id;
           
         
//echo 'call sp_getcustomerproductdetails('.$ProductGroupID.','.$usertypeID.','.$productcustomerID.','.$subgroupid.','.$carestatus.')';
         $productdetails=DB::Select('call sp_getcustomerproductdetails('.$ProductGroupID.','.$usertypeID.','.$productcustomerID.','.$subgroupid.','.$carestatus.')');

      
    $zippercolordetails = Zippercolor::orderBy('id','ASC')->get();
     $usertype = UserType::where('id', '=', $user->userTypeID)->first();
      return view('productmaintenance.home', compact('user','usertype','productdetails','zippercolordetails','customerid','carestatus'));

    }
    
}
