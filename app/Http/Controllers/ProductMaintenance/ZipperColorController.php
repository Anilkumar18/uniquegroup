<?php

namespace App\Http\Controllers\ProductMaintenance;

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

use File;
use URL;

class ZipperColorController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

    public function editzippercolor(request $request,$id){
      $zippercolor_data=Zippercolor::where('id','=',$id)->first();
  //echo "<pre>".print_r($zippercolor_data);
  return json_encode(["success"=>true,$zippercolor_data]);
    }
public function zippercolorimg(Request $request, $id) {

      $productid = Zippercolor::find($id);
      
      $filePath = base_path()."/storage/app/data/product/".$productid->productImage; 
      echo $filePath;
      exit;
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);  
        return $img->response('jpg');

  }

     public function deletezippercolor(Request $request ,$id)
{
    
   
       $user = Auth::user();
       $developmentlist_delete = Zippercolor::where('id','=',$id)->first();
       
       
      //$customer_delete = Customers::find($id);

      $developmentlist_delete->delete();




        $request->session()->flash('failure', 'Zipper color Product deleted successfully.');     

        return redirect()->back(); 
}

  public function getzippercolorimg(Request $request,$id)
    {

      $productid = Zippercolor::where('id','=',$id)->first();

      $filePath = base_path()."/storage/app/data/product/".$productid->productImage;
       echo $filePath;
      exit;
        header('Content-type: image/jpg');
        $img = Image::make($filePath);
        return $img->response('jpg');
    }


    /*Vidhya:27-03-2018
    //Add zipper color insert code*/
    public function zippercoloradd(Request $request)
    {
      $user = Auth::user();
      $usertype = UserType::where('id', '=', $user->userTypeID)->first();
      //print_r($request->productImage);
      if($request->editid!='')
      {

        $path = '/zipper';

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

     
      $imgInp = Input::file('productImage');
      //$imgInp=$request->imgInp3;
$imgInp_filename='';
      
       if($imgInp!='')
                {
                $destinationPath = $path;
              $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());             

        }else{
          $imgInp_filename=$request->selectimage;
        }


        $productdetailsupdate=DB::table('zipperColor')
            ->where('id',$request->editid)
            ->update([
        'productID' => $request->productcode,
        'zipperColor' => $request->color,
        'zipperDescription' => $request->itemdesc,
        'productCost' => $request->productCost,
        'sellingPrice' => $request->sellingPrice,
        'packSize' => $request->packSize,
        'productImage' => $imgInp_filename,
        'status' => 1
        ]);
            $request->session()->flash('success', 'Zipper Color Updated successfully.');
      return redirect()->back();
      
    }
    else
    {
      //$productImage=$request->productImage;
      $path = '/zipper';

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

     
      $imgInp = Input::file('productImage');
      //$imgInp=$request->imgInp3;
$imgInp_filename='';
      
       if($imgInp!='')
                {
                $destinationPath = $path;
              $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());             

        }
        


      $zippercoloradd = Zippercolor::Create([
        'customerID' => $request->chainname,
        'productID' => $request->productcode,
        'zipperColor' => $request->color,
        'zipperDescription' => $request->itemdesc,        
        'productCost' => $request->productCost,
        'sellingPrice' => $request->sellingPrice,
        'packSize' => $request->packSize,
        'productImage' => $imgInp_filename,
        'status' => 1
      ]);
      $zippercoloradd->save();
      $request->session()->flash('success', 'Zipper Color Added successfully.');
      return redirect()->back();
    }
      

    }


     public function zipactivate(Request $request)
    {
  
      $user = Auth::user();
    $id=$request->id;
    
     $updatecoo=DB::table('zipperColor')
            ->where('id',$request->id)
            ->update([
      'status' => 1,
        
        ]);
        
        $request->session()->flash('success', 'Zipper color activated successfully.');     

        return redirect()->back(); 
  
  }
   public function zipdeActivate(Request $request)
     {
       
        $user = Auth::user();   
    
    $id=$request->id;

       $updatecoo=DB::table('zipperColor')
            ->where('id',$request->id)
            ->update([
      'status' => 0,
        
        ]);
      
        
        $request->session()->flash('success', 'Zipper color deactivated successfully.');     

       return redirect()->back(); 

     }
    
}
