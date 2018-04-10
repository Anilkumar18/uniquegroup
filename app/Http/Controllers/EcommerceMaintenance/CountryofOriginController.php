<?php

namespace App\Http\Controllers\EcommerceMaintenance;

use Illuminate\Http\Request;

use Response;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Session;

use Validator,Stroage,Log,View,App;

//Auth facade
use Auth;

use App\UserType;

use App\Chain;

use App\Products;

use App\ProductGroup;

use App\ProductSubGroup;

use App\Customers;

use App\ProductionRegions;

use App\ProductProcess;

use App\Material;

use App\PrintType;

use App\Cutting;

use App\HangTags;

use App\PrintingFinishingProcess;

use App\LogoProcess;

use App\Season;

use App\PricingMethod;

use App\Currency;

use App\UnitofMeasurement;

use App\RawMaterial;

use App\PaperBags;

use App\ProductDetails;

use App\Status;

use App\HooksMaterial;

use App\ProductDevelopmentFields;

use App\ProductDetailFields;

use App\Inventory;

use App\UniqueOffices;

/*use App\CountryofOrigineng;

use App\CountryofOriginfre;

use App\CountryofOriginspan;

use App\CountryofOriginpol;

use App\CountryofOriginchi;

use App\CountryofOriginrom;

use App\CountryofOrigintur;

use App\CountryofOriginpor;

use App\CountryofOriginrus;

use App\CountryofOriginkor;

use App\CountryofOriginara;

use App\CountryofOriginheb;
use App\CountryofOriginita;
use App\CountryofOriginjap;*/


use App\Quote;

use App\Boxes;

use App\Hook;

use App\Tissuepaper;

use App\PackagingStickers;
use App\CountryofOrigin;

use DB;

use App\FibreContents;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;


use File;
use URL;

use App\Zippercolor;

class CountryofOriginController extends Controller

{


    /**

     * Create a new controller instance.

     *

     * @return void

     */
	 

    public function __construct()

    {

        $this->middleware('auth');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    

 

    public function gezippercolorimg($id){



        $productid = Zippercolor::find($id);
        

      $filePath = base_path()."/storage/app/zipper/".$productid->productImage; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

     
    }
 public function getproductzippercolorid($id){



       $productiddata = Zippercolor::where('productID', '=', $id)->get();
        

     foreach ($productiddata as $productidkey => $productidvalue) {
        $data['zipcolorid'][]=$productidvalue->id;
        $data['zipcolorcolor'][]=$productidvalue->zipperColor;
     }

     return json_encode(["success" => true, $data]);

     
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
        $productdetailsupdate=DB::table('zipperColor')
            ->where('id',$request->editid)
            ->update([
      'chainID' => $request->chainname,
        'productID' => $request->productcode,
        'zipperColor' => $request->color,
        'zipperDescription' => $request->itemdesc,
        'productCost' => $request->productCost,
        'sellingPrice' => $request->sellingPrice,
        'packSize' => $request->packSize,
        'productImage' => $request->selectimage,
        'status' => 1
        ]);
            $request->session()->flash('success', 'Zipper Color Updated successfully.');
      return redirect()->back();
      
    }
    else
    {
      //printf($request->editid);exit;
      
      $imgInp = Input::file('productImage');
            //$imgInp=$request->imgInp3;

            $path = '/data/product';
             if($imgInp!='')
                {
                    $destinationPath = $path;
                    $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());                   

                }


      $zippercoloradd = Zippercolor::Create([
        'chainID' => $request->chainname,
        'productID' => $request->productcode,
        'zipperColor' => $request->color,
        'zipperDescription' => $request->itemdesc,
        
        'productCost' => $request->productCost,
        'sellingPrice' => $request->sellingPrice,
        'packSize' => $request->packSize,
        'productImage' => $request->productImage,
        'status' => 1
      ]);
      $zippercoloradd->save();
      $request->session()->flash('success', 'Zipper Color Added successfully.');
      return redirect()->back();
    }
      

    }

    public function addcoo(Request $request)
    {
      $user = Auth::user();
      $usertype = UserType::where('id', '=', $user->userTypeID)->first();
                      
if($request->editID!='')
      {
        $updatecoo=DB::table('countryoforiginmaintenance')
            ->where('id',$request->editID)
            ->update([
      'customerID' => $request->CustomerID,
        
       /* 'descEnglish' => $request->englishDesc,
        'descFrench' => $request->frenchDesc,
        
        'descSpanish' => $request->spanishDesc,
        'descPolish' => $request->polishDesc,
        'descChinese' => $request->chineseDesc,
        'descRomanian' => $request->romanianDesc,
        'descTurkish' => $request->turkishDesc,
        'descCzech' => $request->czechDesc,
        'descHungarian' => $request->hungarianDesc,
        'descSlovak' => $request->slovakDesc,
        'descPortuguese' => $request->portugueseDesc,
        'descFlemish' => $request->flemishDesc,
        'descItalian' => $request->italianDesc,
        'descGerman' => $request->germanDesc,
        'descDanish' => $request->danishDesc,
        'descBulgarian' => $request->bulgarianDesc,
        'descGreek' => $request->greekDesc,
        'descRussian' => $request->russianDesc,
        'descArabic' => $request->arabicDesc,
        'descIndonesian' => $request->indonesianDesc,*/
		
		//Defect:09-04-2018
		//Desc:-country of origin maintenance - maintable
		 'descEnglish' => $request->EnglishDesc,
        'descFrench' => $request->frenchDesc,
        'descSpanish' => $request->spanishDesc,
        'descPolish' => $request->polishDesc,
        'descChinese' => $request->chineseDesc,
        'descRomanian' => $request->romanianDesc,
        'descTurkish' => $request->turkishDesc,
        'descCzech' => $request->czechDesc,
        'descHungarian' => $request->hungarianDesc,
        'descSlovak' => $request->slovakDesc,
        'descPortuguese' => $request->portugueseDesc,
        'descFlemish' => $request->flemishDesc,
        'descItalian' => $request->italianDesc,
        'descGerman' => $request->germanDesc,
        'descDanish' => $request->danishDesc,
        'descBulgarian' => $request->bulgarianDesc,
        'descGreek' => $request->greekDesc,
        'descRussian' => $request->russianDesc,
        'descArabic' => $request->arabicDesc,
        'descIndonesian' => $request->indonesianDesc,
        
        'status' => 1
        ]);
            $request->session()->flash('success', 'Country of Origin Updated successfully.');
      return redirect()->back();
      
    }
    else
    {
		
		/*if($request->EnglishDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOrigineng::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->EnglishDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
		}
		if($request->FrenchDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginfre::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->FrenchDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		if($request->SpanishDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginspan::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->SpanishDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		if($request->PolishDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginpol::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->PolishDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		if($request->ChineseDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginchi::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->ChineseDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		if($request->RomanianDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginrom::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->RomanianDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		
		if($request->TurkishDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOrigintur::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->TurkishDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		if($request->PortugueseDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginpor::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->PortugueseDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		if($request->RussianDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginrus::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->RussianDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		if($request->ArabicDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginara::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->ArabicDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		
		
		if($request->HebrewDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginheb::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->HebrewDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		if($request->KoreanDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginkor::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->KoreanDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		
		if($request->ItalianDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginitl::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->ItalianDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}
		if($request->JapaneseDesc!="")
		{
			//echo "Descenglish"; exit;
      $cooaddnew = CountryofOriginjap::Create([
        'customerID' => $request->CustomerID,
        
        'CountryofOriginName' => $request->JapaneseDesc,

        'status' => 1
      ]);
	   $cooaddnew->save();
	 
		}*/
		$allinputval=request()->all();
		
		//print_r($allinputval);
		//exit;
		
		//echo "<pre>";
		//print_r($allinputval['fieldlist']);
		$processlan=$allinputval['fieldlist'];
		
		foreach ($processlan as $language) {
			$tablename='countryoforigin'.strtolower(substr($language, 0,3));
			$languagevalue=$language.'Desc';

			//echo "tablename".$tablename;

			//echo "values".$allinputval[$languagevalue];
			//echo "<br>";
			//exit;

			//DB::table('mytable')->insert($data);

		//$data['CountryofOriginName']=$allinputval[$languagevalue];

		//print_r($data['CountryofOriginName']);

		//exit;

		//echo $data=$allinputval[$languagevalue];
		
		if($allinputval[$languagevalue])
		{
		
	   $data['CountryofOriginName']=$allinputval[$languagevalue];

	   $data['status']=1;

          

		DB::table($tablename)->insert($data);

		}
		else
		{
			$data['CountryofOriginName']='';
		   $data['status']=1;

          

		DB::table($tablename)->insert($data);	
		}
	

			//exit;
		//$tablename_test[]=$tablename;
		//$data_test[]=$data;

		}

		//print_r($tablename_test);
		//print_r($data);
		//exit;
		//echo "</pre>";
		
		//echo "<br>";
		
		
		/*foreach($allinputval as $arraykey=>$array1)
		{
			
			echo $arraykey;
			echo "<pre>";
			
		print_r($array1);
		
		echo "</pre>";
			
		      
			
			
		}*/
		
			
	
		
		//exit;
		
		
		
		
		
	  
      
      $request->session()->flash('success', 'Country of Origin Added successfully.');
      return redirect()->back();
    }
      
}
    

   public function editcoo(request $request,$id){
      $coodata=CountryofOrigin::where('id','=',$id)->first();
  //echo "<pre>".print_r($zippercolor_data);
  return json_encode(["success"=>true,$coodata]);
    }
    public function deletecoo(Request $request ,$id)
{
    //print_r($id);
   
       $user = Auth::user();
       $coodetailsdel = CountryofOrigin::where('id','=',$id)->first();
       
       
      //$customer_delete = Customers::find($id);

      $coodetailsdel->delete();




        $request->session()->flash('failure', 'Country Of Origin deleted successfully.');     

        return redirect()->back(); 
}
public function countryoforigin()
{
  $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         $coodetails = CountryofOrigin::orderBy('id','ASC')->get();
         $customerid=30;

        
         //print_r($coodetails);
         return view('ecommercemaintenance.contryoforigin', compact('user','usertype','coodetails','customerid'));

}

 public function cooactivate(Request $request)
    {
  
      $user = Auth::user();
    $id=$request->id;
    
     $updatecoo=DB::table('countryoforiginmaintenance')
            ->where('id',$request->id)
            ->update([
      'status' => 1,
        
        ]);
        
        $request->session()->flash('success', 'Country Of Origin activated successfully.');     

        return redirect()->back(); 
  
  }
   public function coodeActivate(Request $request)
     {
       
        $user = Auth::user();   
    
    $id=$request->id;

       $updatecoo=DB::table('countryoforiginmaintenance')
            ->where('id',$request->id)
            ->update([
      'status' => 0,
        
        ]);
      
        
        $request->session()->flash('success', 'Country Of Origin deactivated successfully.');     

       return redirect()->back(); 

     }

     public function zipactivate(Request $request)
    {
  
      $user = Auth::user();
    $id=$request->id;
    
     $updatecoo=DB::table('zippercolor')
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

       $updatecoo=DB::table('zippercolor')
            ->where('id',$request->id)
            ->update([
      'status' => 0,
        
        ]);
      
        
        $request->session()->flash('success', 'Zipper color deactivated successfully.');     

       return redirect()->back(); 

     }

     
      



}

?>