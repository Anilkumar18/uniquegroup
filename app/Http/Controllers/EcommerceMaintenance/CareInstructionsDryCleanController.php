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



class CareInstructionsDryCleanController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

  
	
	public function DryCleanSymbolList()
	{

        
	
	    $user = Auth::user();
		$usertype = UserType::where('id', '=', $user->userTypeID)->first();
		
		$customerid=30;
		
		$customers = Customers::where('status', 1)->where('id',$customerid)->first();
		

	    //$chainID=Session::get('chainID');

		//$chainSessionData=Session::get('chainData');
		
	    //$usertype = UserType::where('id', '=', $user->userTypeID)->first(); 
		
		//$chains = Chain::where('status', 1)->where('id',$chainID)->first();
	 
	    $symbollist=DB::select('call sp_selectcareInstructions(1,'.$customerid.',0,0,4,0)');	  
		
		$symbolimagelist=DB::select('call sp_selectcareInstructions(2,'.$customerid.',0,0,4,1)');
	  
	   //return view('admin.symbol',compact('chainSessionData','symbollist','user','usertype','symbolimagelist','chains'));
	 return view('ecommercemaintenance.careinstructions_dryclean',compact('symbollist','user','usertype','symbolimagelist','customers'));
	
	}

	public function addDryCleanSymbollist(Request $request)
      
      {
	  
	 // echo "Insertions"; exit;
	 
        $user = Auth::user();
        
          $productImage = Input::file('image');
			
			//$chainID=Session::get('chainID');
			
			 $customerid=30;
			 
			 //echo "addsymbollist";
			 //echo "editID".$request->editID;
			 
			
			 
			
					if($request->editID!='')
					{
					             
								  $checksymbolsrecords =Symbol::where('descEnglish', '=', $request->descriptionEnglish)
								 ->where('id', '!=', $request->editID)
								 -> where('CustomerID', '=',$request->EditcustomerID)
								 ->first();
					
					
					           if($checksymbolsrecords===null && $checksymbolsrecords=='')
					             {
								 if($productImage!='')
                {
             		$destinationPath = 'data/symbol';
      				$productImage_filename=$productImage->storeAs($destinationPath,$productImage->getClientOriginalName());
	
				}
				else
				{
					
						if($request->selectimage!='')
						{
						$productImage_filename=$request->selectimage;
						}
						else
						{
						$productImage_filename='';
						}
						
			}	
			
			    
			                              $selectimageid=$request->selectimageid;
										  
											/* $symbolimageinsert = Symbolimage::create([
											'imageName' => $productImage_filename,
											'status' => 1]);
											
											   $symbolimageinsert->save();        
						
												$LastInsertId = $symbolimageinsert->id;*/
											 
											
													if($selectimageid!="")
													{
													$selectimageid=$selectimageid;
													}
													else
													{
											$symbolimageinsert = Symbolimage::create([
											'imageName' => $productImage_filename,
											'status' => 1]);
											
											   $symbolimageinsert->save();        
						
												$LastInsertId = $symbolimageinsert->id;
													$selectimageid=$LastInsertId;
													}
			
								$symbol_update = DB::select('call sp_CRUDsymbol(3,'.$request->editID.','.$customerid.',"'.$request->suspendedCarePhrase.'","'.$request->descriptionEnglish.'","'.$request->descriptionFrench.'","'.$request->descriptionSpanish.'","'.$request->descriptionPolish.'","'.$request->descriptionChinese.'","'.$request->descriptionRomanian.'","'.$request->descriptionTurkish.'","'.$request->descriptionPortuguese.'","'.$request->descriptionRussian.'","'.$request->symbolType.'",'.$selectimageid.',0,0)');  
											   
									$request->session()->flash('success', 'Symbol updated successfully!');  
								}	
										 else
										{
										 $request->session()->flash('failure', 'Symbol already exist!');  
										 return redirect(url(route('admin.drycleansymbollist')));
										 
										}	
								
									return redirect(url(route('admin.drycleansymbollist')));
					
								}
								
								else{
									//echo "Insertions54345354"; exit;
								   $checksymbolsrecords =Symbol::where('descEnglish', '=', $request->descriptionEnglish)
								 -> where('CustomerID','=',$request->customerID)
								 ->first();
								 
									 if($checksymbolsrecords=== null)
									{
									if($productImage!='')
                {
             		$destinationPath = 'data/symbol';
      				$productImage_filename=$productImage->storeAs($destinationPath,$productImage->getClientOriginalName());
	
				}
				else
				{
						if($request->selectimage !='')
						{
						$productImage_filename=$request->selectimage;
						}
						else
						{
						$productImage_filename= '';
						}
			}	
									
											$selectimageid=$request->selectimageid;
											 $symbolimageinsert = Symbolimage::create([
											'imageName' => $productImage_filename,
											'status' => 1]);
											
											   $symbolimageinsert->save();        
						
												$LastInsertId = $symbolimageinsert->id;
											 
											
													if($selectimageid!="")
													{
													$selectimageid=$selectimageid;
													}
													else
													{
													$selectimageid=$LastInsertId;
													}
											
																												
												$symbol_insert = DB::select('call sp_CRUDsymbol(1,0,'.$customerid.',"'.$request->suspendedCarePhrase.'","'.$request->descriptionEnglish.'","'.$request->descriptionFrench.'","'.$request->descriptionSpanish.'","'.$request->descriptionPolish.'","'.$request->descriptionChinese.'","'.$request->descriptionRomanian.'","'.$request->descriptionTurkish.'","'.$request->descriptionPortuguese.'","'.$request->descriptionRussian.'","'.$request->symbolType.'",'.$selectimageid.',0,1)');  
												   
												$request->session()->flash('success', 'Symbols was successful added!');  
												
												
											
											
											  }
									    else
										{
										 $request->session()->flash('failure', 'Symbol already exist!');  
										 
										 
										}	
											  
									return redirect(url(route('admin.drycleansymbollist')));
								}
					
					
							  
							 
        }
	
	  public function DryCleanSymbolactivate(Request $request)
		{
	
	    $user = Auth::user();
		$id=$request->id;
		
		 $symbol_activate = DB::select('call sp_commonprocedure(1,'.$id.',"symbolmaintenance")');

        /*foreach ($request->ChkEvent as $key => $id) {      
           
        $symbol_activate = DB::select('call sp_commonprocedure(1,'.$id.',"symbolmaintenance")');

        }*/
        
        $request->session()->flash('success', 'Symbol(s) activated successfully.');     

        return redirect(url(route('admin.drycleansymbollist')));	
	
	}
	 public function DryCleanSymboldeActivate(Request $request)
     {
       
        $user = Auth::user();   
		
		$id=$request->id;

        /*foreach ($request->ChkEvent as $key => $id) {                

            $symbol_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"symbolmaintenance")');

         }*/
		  $symbol_activate = DB::select('call sp_commonprocedure(2,'.$id.',"symbolmaintenance")');
		  
        
        $request->session()->flash('success', 'Symbol(s) deactivated successfully.');     

        return redirect(url(route('admin.drycleansymbollist')));   

     }
	  public function delete(Request $request)
     {
       $user = Auth::user();
	   
	   $id=$request->id;
	  
        /*foreach ($request->ChkEvent as $key => $id) {        
          

         $symbol_delete = DB::select('call sp_commonprocedure(3,'.$id.',"symbolmaintenance")'); 

        }*/
		 $symbol_delete = DB::select('call sp_commonprocedure(3,'.$id.',"symbolmaintenance")'); 
		
        $request->session()->flash('error', 'Symbol(s) deleted successfully.');     

        return redirect(url(route('admin.drycleansymbollist')));
		 
    }
	 public function getsymbolimg(Request $request, $id) {

      $productid = Symbolimage::find($id);
      
      $filePath = base_path()."/storage/app/".$productid->imageName; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);  
        return $img->response('png');

  }

public function DryCleanSymbol_Select(Request $request,$id)
	{
	
	//$chainID=Session::get('chainID');
	$customerid=30;
		
	$symbollist=DB::select('call sp_selectsymbol(4,'.$customerid.','.$id.',0,0)');	
	
	
	$count=count($symbollist);
	
	if ($count) {
		
	 foreach ($symbollist as $symbolmaintenace)
        {

            $data[]=$symbolmaintenace;

        }
	}else{
	
		 $data[]='null';
	}	
	
	
	
	return json_encode($data);

  
  
   }

}

?>
