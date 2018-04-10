<?php

namespace App\Http\Controllers;

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

use App\DeliveryAddress;

use App\BillAddress;

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

use App\DeliveryAccountNumber;

use App\Quote;

use App\Boxes;

use App\Hook;

use App\Tissuepaper;

use App\DeliveryMethodOrder;

use App\Woven;

use App\PrintedLabel;

use App\SymbolType;

use App\SymbolImages;

use App\HeatTransfer;

use App\PackagingStickers;

use App\FabricComposition;

use App\Garmentmaintenance;

use DB;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;


use File;
use URL;

use App\Zippercolor;
use App\Language;
use App\PlaceOrder;
use App\CountryofOrigin;

use App\DeliveryInstruction;

class OrderController extends Controller

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

    

 public function orderlistview()

    {
 		$user = Auth::user();

         

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

         return view('users.orderlist', compact('user','usertype'));

    }

    public function completeorderlistview()

    {
 		$user = Auth::user();

         

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

         return view('users.completeorderlist', compact('user','usertype'));

    }

    public function placeorderview()

    {
        $user = Auth::user();

         

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

       $productgroupdetails=ProductGroup::where('status','=',1)->get();
      return view('admin.placeorderlist', compact('user','usertype','productgroupdetails'));

    }

    public function placeordermaintenance($id)

    {

        $user = Auth::user();

         
$processid=explode('#',base64_decode($id));

      //print_r($processid);
  $id=$processid[0];
   $subgroupid=$processid[1];
  $carestatus=$processid[2];
        $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         $ProductionRegions=ProductionRegions::where('status', '=', 1)->get();
           $productcustomerID=$user->customerID;
          $usertypeID=$user->userTypeID;
           $ProductGroupID=$id;

         $productlist=DB::Select('call sp_getcustomerproductdetails('.$ProductGroupID.','.$usertypeID.','.$productcustomerID.','.$subgroupid.','.$carestatus.')');
       $productgroupdetails=ProductGroup::where('status','=',1)->where('id', '=', $id)->first();
       $productsubgroupdetails=ProductSubGroup::where('status','=',1)->where('id', '=', $subgroupid)->first();

$symboldetails=SymbolType::where('status','=',1)->get();
$seasondetails=Season::where('status','=',1)->get();

$Orderdetails=PlaceOrder::where('status','=',1)->where('orderstatus',0)->first();
       //$productgroupdetails=ProductGroup::where('status','=',1)->get();
       
      return view('admin.placeorder', compact('user','usertype','ProductGroupID','productlist','ProductionRegions','productgroupdetails','productsubgroupdetails','carestatus','symboldetails','seasondetails','Orderdetails'));

    }

    public function gezippercolorimg($id){



        $productid = Zippercolor::find($id);
        

      $filePath = base_path()."/storage/app/".$productid->productImage; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

     
    }

    public function getsymbolimg(Request $request, $id) {

      $productid = SymbolImages::find($id);
      
      $filePath = base_path()."/storage/app/".$productid->imageName; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);  
        return $img->response('png');

  }

 public function getproductzippercolorid($id){



       $productiddata = Zippercolor::where('productID', '=', $id)->get();
        
if(isset($productiddata)){
  if(is_object($productiddata)){
     foreach ($productiddata as $productidkey => $productidvalue) {
        $data['zipcolorid'][]=$productidvalue->id;
        $data['zipcolorcolor'][]=$productidvalue->zipperColor;
     }
   }else{
    $data='';
   }
}else{
  $data='';
}
     return json_encode(["success" => true, $data]);

     
    }

public  static function getsizedetails($id){

$productdetail = ProductDetails::find($id);
if($productdetail->WovenLabelID){
    $caredetaildata = Woven::where('productID', '=', $productdetail->id)->first();
}
if($productdetail->PrintedLabelID){
    $caredetaildata = PrintedLabel::where('productID', '=', $productdetail->id)->first();
}
if($productdetail->HeatTransferLabelID){
    $caredetaildata = HeatTransfer::where('productID', '=', $productdetail->id)->first();
}
if(isset($caredetaildata)){
$data['SizeRangeID']=$caredetaildata->SizeRangeID;
 $data['SizebyLetter']=$caredetaildata->SizebyLetter;
 $data['SizebyNumber']=$caredetaildata->SizebyNumber;
 $data['BraSizes']=$caredetaildata->BraSizes;
 $data['ToddlerSizes']=$caredetaildata->ToddlerSizes;
 $data['PantsSizes']=$caredetaildata->PantsSizes;


}else{
  $data=[];
}
return json_encode(["success" => true, $data]);

}
public function getcaredetails($id){

$productdetail = ProductDetails::find($id);
if($productdetail->WovenLabelID){
    $caredetaildata = Woven::where('productID', '=', $productdetail->id)->first();
}
if($productdetail->PrintedLabelID){
    $caredetaildata = PrintedLabel::where('productID', '=', $productdetail->id)->first();
}
if($productdetail->HeatTransferLabelID){
    $caredetaildata = HeatTransfer::where('productID', '=', $productdetail->id)->first();
}
if(isset($caredetaildata)){
 $data['SizeRangeID']=$caredetaildata->SizeRangeID;
 $data['SizebyLetter']=$caredetaildata->SizebyLetter;
 $data['SizebyNumber']=$caredetaildata->SizebyNumber;
 $data['BraSizes']=$caredetaildata->BraSizes;
 $data['ToddlerSizes']=$caredetaildata->ToddlerSizes;
 $data['PantsSizes']=$caredetaildata->PantsSizes;
 
 //echo $caredetaildata->LanguageID;
$Languagedetail=Language::where('id',$caredetaildata->LanguageID)->first();
$pdmlanduages=explode('/', $Languagedetail->descName);
//FabricComposition process starts
foreach ($pdmlanduages as $lang) {
  $processdetails[]=CountryofOrigin::where('status', 1)->pluck($lang)->toArray();
  //FabricComposition::where('word_one', $word_id)->pluck('word_two')->toArray();
}

$arraylen=0;
for ($i=0; $i <count($processdetails) ; $i++) { 
    if(count($processdetails[$i])>$arraylen){$arraylen=count($processdetails[$i]);}
}

for ($i=0; $i < $arraylen; $i++) { 
    $detaillist='';
for ($j=0; $j <count($processdetails) ; $j++) { 
    $detaillist.=isset($processdetails[$j][$i])?$processdetails[$j][$i].'/':'';
    
}
    $coodetails[]=rtrim($detaillist,'/');
}


        $data['CountryofOriginID']=$coodetails;
        $data['ExclusiveofTrimmings']=$caredetaildata->ExclusiveofTrimmings;
        $data['ExclusiveofDecoration']=$caredetaildata->ExclusiveofDecoration;
        $data['ExclusiveofFindings']=$caredetaildata->ExclusiveofFindings;
        $data['FireWarningLabel']=$caredetaildata->FireWarningLabel;
}else{
  $data='';
}
return json_encode(["success" => true, $data]);

}


public function getfabricdetails($id){

$productdetail = ProductDetails::find($id);
if($productdetail->WovenLabelID){
    $caredetaildata = Woven::where('productID', '=', $productdetail->id)->first();
}
if($productdetail->PrintedLabelID){
    $caredetaildata = PrintedLabel::where('productID', '=', $productdetail->id)->first();
}
if($productdetail->HeatTransferLabelID){
    $caredetaildata = HeatTransfer::where('productID', '=', $productdetail->id)->first();
}

if(isset($caredetaildata)){
//echo $caredetaildata->LanguageID;
$Languagedetail=Language::where('id',$caredetaildata->LanguageID)->first();
$pdmlanduages=explode('/', $Languagedetail->descName);
//FabricComposition process starts
foreach ($pdmlanduages as $lang) {
  $processdetails[]=FabricComposition::where('status', 1)->pluck($lang)->toArray();
  //FabricComposition::where('word_one', $word_id)->pluck('word_two')->toArray();
}


$arraylen=0;
for ($i=0; $i <count($processdetails) ; $i++) { 
    if(count($processdetails[$i])>$arraylen){$arraylen=count($processdetails[$i]);}
}

for ($i=0; $i < $arraylen; $i++) { 
    $detaillist='';
for ($j=0; $j <count($processdetails) ; $j++) { 
    $detaillist.=isset($processdetails[$j][$i])?$processdetails[$j][$i].'/':'';
    
}
    $data['fabricdetails'][]=rtrim($detaillist,'/');
}
//FabricComposition process ends

//GarmentComposition process starts
foreach ($pdmlanduages as $lang) {
  $processdetails[]=Garmentmaintenance::where('status', 1)->pluck($lang)->toArray();
  //FabricComposition::where('word_one', $word_id)->pluck('word_two')->toArray();
}


$arraylen=0;
for ($i=0; $i <count($processdetails) ; $i++) { 
    if(count($processdetails[$i])>$arraylen){$arraylen=count($processdetails[$i]);}
}

for ($i=0; $i < $arraylen; $i++) { 
    $detaillist='';
for ($j=0; $j <count($processdetails) ; $j++) { 
    $detaillist.=isset($processdetails[$j][$i])?$processdetails[$j][$i].'/':'';
    
}
    $data['garmentdetails'][]=rtrim($detaillist,'/');
}
}else{
  $data='';
}
//GarmentComposition process ends
return json_encode(["success" => true, $data]);
}


public function addneworder(Request $request){


if($request->editID){ 
$placeOrder  = PlaceOrder::findOrFail($request->editID);

    $input = $request->all();

    //$placeOrder->fill($input)->save();
if ($placeOrder) { 
           $placeOrder = $placeOrder->update($input);
           $placeOrder  = PlaceOrder::find($request->editID);
        }
}else{
  $placeOrder=PlaceOrder::create($request->all());
}


$placeOrder->sizeQuanity=isset($request->sizeQuanity)?implode('#', $request->sizeQuanity):'';
$placeOrder->fabricID= isset( $request->fabricID)?implode('#', $request->fabricID):'';
$placeOrder->fabricComposition=isset($request->fabricComposition)?implode('#', $request->fabricComposition):'';
$placeOrder->garmentID=isset($request->garmentID)?implode('#', $request->garmentID):'';
$placeOrder->garmentfabricID=isset( $request->garmentfabricID)?implode('#', $request->garmentfabricID):'';
$placeOrder->garmentfabricComposition=isset($request->garmentfabricComposition)?implode('#', $request->garmentfabricComposition):'';

$placeOrder->save();

//return url(redirect('user.orderlistview'));
return redirect(url(route('order.checkout')));
//return redirect(url(route('users.orderlist')));
}

public function checkout(Request $request){
 
  $user = Auth::user();

         

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

       //$ProductDetails=PlaceOrder::where('status','=',1)->where('orderstatus',0)->get();
       $ProductDetails=DB::Select('call sp_getcheckoutdetails()');
      return view('order.checkout', compact('user','usertype','ProductDetails'));
}

public function deliveryinstruction(Request $request){
 
  $user = Auth::user();

         

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

       //$ProductDetails=PlaceOrder::where('status','=',1)->where('orderstatus',0)->get();
       $ProductDetails=DB::Select('call sp_getcheckoutdetails()');
      return view('order.deliveryinstruction', compact('user','usertype'));
}


public function removeOrder(Request $request,$id){
$rsltDelRec = PlaceOrder::find($id);

   $rsltDelRec->delete();  
$request->session()->flash('success', 'Order Deleted successfully.');
return json_encode(["success" => true]);

}
public function editOrder(Request $request,$id){

 $editID=$id;
  $user = Auth::user();
 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
$Orderdetails=PlaceOrder::where('status','=',1)->where('orderstatus',0)->where('id',$id)->first();
$Productdetails=ProductDetails::where('status','=',1)->where('id',$Orderdetails->productID)->first();
    
    $carestatus=$Orderdetails->careWash?1:0;

  $id=$carestatus==0?$Productdetails->ProductGroupID:0;
   $subgroupid=$carestatus==0?$Productdetails->ProductSubGroupID:0;
  
        $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         $ProductionRegions=ProductionRegions::where('status', '=', 1)->get();
           $productcustomerID=$user->customerID;
          $usertypeID=$user->userTypeID;
           $ProductGroupID=$id;

         $productlist=DB::Select('call sp_getcustomerproductdetails('.$ProductGroupID.','.$usertypeID.','.$productcustomerID.','.$subgroupid.','.$carestatus.')');
       $productgroupdetails=ProductGroup::where('status','=',1)->where('id', '=', $id)->first();
       $productsubgroupdetails=ProductSubGroup::where('status','=',1)->where('id', '=', $subgroupid)->first();

$symboldetails=SymbolType::where('status','=',1)->get();
$seasondetails=Season::where('status','=',1)->get();

$getcaredetails=$this->getcaredetails($Orderdetails->productID);
$caredetails=json_decode($getcaredetails, true);

$getfabricdetails=$this->getfabricdetails($Orderdetails->productID);
$fabricgarmentdetails=json_decode($getfabricdetails, true);

if($Productdetails->ZipperPullersID){
$getproductzippercolorid=$this->getproductzippercolorid($Orderdetails->productID);
$productzippercolor=json_decode($getproductzippercolorid, true);
}else{
  $getproductzippercolorid='';
$productzippercolor=json_decode($getproductzippercolorid, true);
}

       //$productgroupdetails=ProductGroup::where('status','=',1)->get();
       
      return view('order.edit.editorder', compact('user','usertype','ProductGroupID','productlist','ProductionRegions','productgroupdetails','productsubgroupdetails','carestatus','symboldetails','seasondetails','Orderdetails','caredetails','Productdetails','fabricgarmentdetails','editID','productzippercolor'));

}

/*vidhya:06-04-2018*/
public function deliveryaddresssave(Request $request)
{

  $user = Auth::user();
   $usertype = UserType::where('id', '=', $user->userTypeID)->first();

    $addressinsert = DeliveryAddress::create([
                            'userID' => $usertype->id,

                            'DeliveryAddress' => $request->deliveryaddress,

                                                      

                            'status' => 1]);

                            

                $addressinsert->save();       



                $addrselect = DeliveryAddress::where('status', '=',1)->get();



        $data[]=$addrselect;
        
        
         return json_encode($data); 
}

public function deliveryaddressdel(Request $request)
{

  $user = Auth::user();
   $usertype = UserType::where('id', '=', $user->userTypeID)->first();
  $deliverydel = $request->ID;
  

  $deldeliveryadd = DeliveryAddress::where('id','=',$request->ID)->first();
        $deldeliveryadd->delete();

        $addrselect1 = DeliveryAddress::where('status', '=',1)->get();



        $data[]=$addrselect1;
        
        
         return json_encode($data); 
}

public function billaddresssave(Request $request)
{

  $user = Auth::user();
   $usertype = UserType::where('id', '=', $user->userTypeID)->first();

    $addressinsert1 = BillAddress::create([
                            'userID' => $usertype->id,

                            'BillAddress' => $request->billaddress,

                                                      

                            'status' => 1]);

                            

                $addressinsert1->save();       



                $addrselect = BillAddress::where('status', '=',1)->get();



        $data[]=$addrselect;
        
        
         return json_encode($data); 
}

public function billaddressdel(Request $request)
{

  $user = Auth::user();
   $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    

  $delbilladd = BillAddress::where('id','=',$request->ID)->first();
        $delbilladd->delete();

        $addrselect2 = BillAddress::where('status', '=',1)->get();



        $data[]=$addrselect2;
        
        
         return json_encode($data); 
}

public function deliverymethodsave(Request $request)
{

  $user = Auth::user();
   $usertype = UserType::where('id', '=', $user->userTypeID)->first();

    $addressinsert2 = DeliveryMethodOrder::create([
                            'userID' => $usertype->id,

                            'OrderDeliveryMethod' => $request->dmethod,

                                                      

                            'status' => 1]);

                            

                $addressinsert2->save();       



                $addrselect = DeliveryMethodOrder::where('status', '=',1)->get();



        $data[]=$addrselect;
        
        
         return json_encode($data); 
}

public function deliverymethoddel(Request $request)
{

  $user = Auth::user();
   $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    

  $deldeliverymethod = DeliveryMethodOrder::where('id','=',$request->ID)->first();
        $deldeliverymethod->delete();

        $addrselect3 = DeliveryMethodOrder::where('status', '=',1)->get();



        $data[]=$addrselect3;
        
        
         return json_encode($data); 
}
public function deliveryaccountsave(Request $request)
{

  $user = Auth::user();
   $usertype = UserType::where('id', '=', $user->userTypeID)->first();

    $addressinsert3 = DeliveryAccountNumber::create([
                            'userID' => $usertype->id,

                            'DeliveryAccountNo' => $request->DelaccNo,

                                                      

                            'status' => 1]);

                            

                $addressinsert3->save();       



                $addrselect = DeliveryAccountNumber::where('status', '=',1)->get();



        $data[]=$addrselect;
        
        
         return json_encode($data); 
}

public function deliveryaccountdel(Request $request)
{

  $user = Auth::user();
   $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    

  $deldeliveryaccount = DeliveryAccountNumber::where('id','=',$request->ID)->first();
        $deldeliveryaccount->delete();

        $addrselect4 = DeliveryAccountNumber::where('status', '=',1)->get();



        $data[]=$addrselect4;
        
        
         return json_encode($data); 
}
public function deliveryinstructionadd(Request $request)
{

  $user = Auth::user();

   $usertype = UserType::where('id', '=', $user->userTypeID)->first();

    $deliveryinstruction = DeliveryInstruction::create([
                            'UserID' => $user->id,
                            'POnumber' => $request->customerOrdernum,
                            'vendorname' => $request->vendorNumber,
                            'payingParty' => $request->payingParty,
                            'DeliveryDate' => $request->deliveryDate,
                            'DeliveryAddressID' => $request->deliveryTo,
                            'BillAddressID' => $request->billtoAddress,
                            'BillTelePhone' => $request->billtoTelephone,
                            'contact' => $request->contact,
                            'EmailID' => $request->emailAddress,
                            'DeliveryMethodID' => $request->deliveryMethod,
                            'DeliveryAccountNo' => $request->deliveryAccountNo,
                            'comments' => $request->specialInstriction,


                            'status' => 1]);

                            

                $deliveryinstruction->save();     

              $productdetailsupdate=DB::table('placeOrder')
            ->where('userID',$deliveryinstruction->UserID)
            ->update([
        'orderstatus' => 1
        ]);  

                $request->session()->flash('success', 'Delivery Instruction Added successfully.');     

        return redirect(url(route('user.placeorderview')));   

}

}

?>