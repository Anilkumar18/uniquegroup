<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Redirect;

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

use App\Quote;

use App\Boxes;

use App\Hook;

use App\Tissuepaper;

use App\PackagingStickers;

use App\Tapes;

use DB;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;

use App\Washeng;

use App\Bleacheng;

use App\Ironeng;

use App\DryCleaningeng;

use App\Dryeng;

use App\Fabriccompositioneng;

use File;
use URL;

//TasK: To pass group ID
     //Done by Rajesh
     //Date :17032018
use App\Woven;
use App\PrintedLabel;


class CareController extends Controller

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

    

     public function getcareimg(Request $request, $value,$caretype) {

switch ($caretype) {
	case 0:
		$productid = Dryeng::find($value);
		break;
	case 1:
		$productid = DryCleaningeng::find($value);
		break;
	case 2:
		$productid = Washeng::find($value);
		break;
	case 3:
		$productid = Bleacheng::find($value);
		break;
	case 4:
		$productid = Ironeng::find($value);
		break;
	
	default:
		$productid = Dryeng::find($value);
		break;
}
      

      $filePath = base_path()."/storage/app/".$productid->Symbol; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

     }

     
     public function getfabricdetails(Request $request, $language) {

switch ($language) {
	case 'eng':
		$Fabricinfo = Fabriccompositioneng::all();
		break;
	
	
	default:
		$Fabricinfo =Fabriccompositioneng::all();
		break;
}
foreach ($Fabricinfo as $Fabricinfovalue) {
	$data['fabricinfo']['fabric'][]=$Fabricinfovalue->FabricComposition;
	$data['fabricinfo']['fabricID'][]=$Fabricinfovalue->id;
}


return json_encode(["success" => true, $data]);

     }
public function getsizemaintenancedetails(Request $request, $type, $co){
$processlan=explode(',', $co);
foreach ($processlan as $lanvalue) {
     $languset='sizes'.strtolower($lanvalue);

    $table=$languset;
                $fielddetailslist[] = DB::table($table)->where('SizeMaintenanceType', $type)->get();
                
} 
//echo '<pre>';print_r($fielddetailslist);echo '</pre>';
$i=0;
foreach ($fielddetailslist as $typekey => $typevalue) {
   
     if(is_object($typevalue)){
        foreach ($typevalue as $key => $value) {
         $processdetails[$i][]=$value->SizesName;
        }
    

    $i++;
}
    
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
    $data['details'][]=rtrim($detaillist,'/');
}
return json_encode(["success" => true, $data]);
}

public function getcaredetails(Request $request, $type, $co){

$processlan=explode(',', $co);
foreach ($processlan as $lanvalue) {
     $languset=$type.strtolower($lanvalue);

    $table=$languset;
                $fielddetailslist[] = DB::table($table)->get();
                
} $i=0;
if($type=='countryoforigin'){
foreach ($fielddetailslist as $typekey => $typevalue) {
   
     
        foreach ($typevalue as $key => $value) {
         $processdetails[$i][]=$value->CountryofOriginName;
        }
    

    $i++;
    
}
}
if($type=='sizes'){
    $table='sizemaintenance';
    $fielddetailslist = DB::table($table)->get();

        foreach ($fielddetailslist as $key => $value) {
         $processdetails[$i][]=$value->SizeMaintenance;
         $data['sizemaintenanceID'][]=$value->id;
        }
    }
//echo '<pre>';print_r($processdetails);echo '</pre>';
//cho  count($processdetails);
$arraylen=0;
for ($i=0; $i <count($processdetails) ; $i++) { 
    if(count($processdetails[$i])>$arraylen){$arraylen=count($processdetails[$i]);}
}

for ($i=0; $i < $arraylen; $i++) { 
    $detaillist='';
for ($j=0; $j <count($processdetails) ; $j++) { 
    $detaillist.=isset($processdetails[$j][$i])?$processdetails[$j][$i].'/':'';
    
}

    $data['details'][]=rtrim($detaillist,'/');
}


return json_encode(["success" => true, $data]);


}
    public function getproductdetailsitemlist(Request $request, $productgroup, $productsubgroupid){

    	$productgroupid=$productgroup;
	
	              $productsubgroupid=$productsubgroupid;

	              $productgroupdetails=ProductGroup::where('id','=',$productgroupid)->where('status','=',1)->get();
	            $productsubgroupdetails=ProductSubGroup::where('id','=',$productsubgroupid)->where('status','=',1)->get();
					$productfields=ProductDevelopmentFields::where('status','=',1)->get();

					$productinventorydetails=ProductDetails::where('status','=',1)->get();

	$isfound=0;
	foreach($productfields as $products)
	{
	if($productgroupid == $products->ProductGroupID)
	{
		
	$productdevelopmentfields=ProductDevelopmentFields::where('ProductGroupID','=',$productgroupid)->get();
	$isfound=1;
	}
	
	}
	
	if($isfound ==0)
	{
		
	//$productdevelopmentfields=ProductDevelopmentFields::where('ProductSubGroupID','=',$productsubgroupid)->get();
	$productdevelopmentfields=ProductDevelopmentFields::where('ProductSubGroupID','=',$productsubgroupid)->where('ProductGroupID','=',0)->where('status','=',1)->get();
	
	}
	//echo '<pre>';print_r($productdevelopmentfields);echo '</pre>';
	?>

<?php
                $x=1;
                $y=1;


                //echo '<pre>';print_r($productdevelopmentfields);echo '</pre>';
             foreach($productdevelopmentfields as $list){
                ?>
             
             
               
                  <!--check dropdown and textbox to display in forms starts here-->
                <?php
                if($list->dropdown!=""){
                $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                   
                	

                ?>
                 <div class="printcolorhidden processdiv" <?php if($list->hide==2){?> style="display: none;" <?php } ?>>
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo  $list->fieldname; if($list->isvalid==1){ ?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-5">
                <!-- //TasK: To pass group ID
     //Done by Rajesh
     //Date :17032018 -->
     
                        <select id="<?php echo $fieldname; ?>" <?php if($list->isvalid==1){ ?> required <?php } ?> name="<?php echo $fieldname; ?>" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         <?php foreach ($fielddetailslist as $fielddetails){ ?>
                           
                         <option value="<?php echo $fielddetails->id; ?>"><?php echo $fielddetails->$fieldname; ?></option>
                          <?php } ?>
                                            
                        </select>
                       
                </div>   
                 
                </div>
               
                 <?php  }elseif($list->checkbox!="" && $list->tablename!=''){
                	//TasK: To pass Language
     				//Done by Rajesh
     				//Date :19032018

                	$table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                 ?>
<?php if($list->isrefimg){ ?>
<div class="printcolorhidden processdiv <?php echo strtolower($list->columnfieldname).'blk'; ?>" <?php if($list->hide==2){?> style="display: none;" <?php } ?>><label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $listoffieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
    <div class="col-lg-10">
    	<?php foreach ($fielddetailslist as $fielddetails){ 

$caretype=$this->getcaretype($fieldname);
                         	 
    ?>
						<div class="col-lg-6">
							<label>
								<input type="radio" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>" data-lang=<?php echo strtoupper(substr($fielddetails->$fieldname, 0, 3)); ?> value="<?php echo $fielddetails->id; ?>" class="<?php echo strtolower($list->columnfieldname); ?>"  /><img src="<?php echo route('user.getcarepic', ['value' =>$fielddetails->id.'/'.$caretype ]);?>"><p class="spanval label_font"><?php echo $fielddetails->$fieldname; ?></p>
							</label>
						</div>
    	<?php } ?>
    </div>
</div>

<?php }else{ ?>
<div class="printcolorhidden" <?php if($list->hide==2){?> style="display: none;" <?php } ?>><label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $listoffieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
    <div class="col-lg-10">
    	<?php foreach ($fielddetailslist as $fielddetails){ ?>
    		<div class="col-lg-4">
<?php $processlan=explode('/', $fielddetails->$fieldname);$languset='';
foreach ($processlan as $lanvalue) {
	$languset.=strtoupper(substr($lanvalue, 0, 3)).'/';
}
 ?>
              <input type="checkbox" name="<?php echo $list->columnfieldname; ?>[]" id="<?php echo $list->columnfieldname; ?>" data-lang=<?php echo rtrim($languset,'/'); ?> value="<?php echo $fielddetails->id; ?>" class="<?php echo strtolower($list->columnfieldname); ?>"  /><p class="spanval label_font"><?php echo $fielddetails->$fieldname; ?></p>
              </div>

    	<?php } ?>
    </div>
</div>

<?php } ?>
                 
                <?php
                }else{ 
                	
                //TasK: To pass group ID
     //Done by Rajesh
     //Date :17032018
      ?>

                <div class="printcolorhidden processdiv" <?php if($list->hide==2){?> style="display: none;" <?php } ?>>
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" <?php if($list->isvalid==1){ ?> required<?php } ?> name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
                 <!-- //TasK: To pass group ID
     //Done by Rajesh
     //Date :17032018 -->
                </div>
                <?php } ?>
                
                
             
              


    	<?php 
    }?>
   <div class="printcolorhidden">
   		<div class="careinformation"></div>
   </div>
<?php 
    }

public function getcaretype($type){
$caretype='';
switch ($type) {
	case 'DryNames':
		$caretype=0;
		break;
	case 'DryCleaningNames':
		$caretype=1;
		break;
	case 'WashNames':
		$caretype=2;
		break;
	case 'BleachName':
		$caretype=3;
		break;
	case 'IronNames':
		$caretype=4;
		break;
	
	default:
		$caretype='';
		break;
}
return $caretype;
}

}

?>