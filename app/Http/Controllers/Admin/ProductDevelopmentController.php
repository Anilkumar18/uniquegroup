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
use App\ProductGroup;
use App\ProductSubGroup;
use App\PaperMaterial;
use App\ProductDevelopmentFields;
use App\PaperBags;
use App\PrintType;
use App\PackagingCutting;
use App\PrintingFinishingProcess;
use App\FabricBags;
use App\FabricBagsMaterial;
use App\PolyBags;
Use Session;
use App\UserType;

class ProductDevelopmentController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
	 public function index() 
	 {
         $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		 
		 $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
		
        return view('admin.productdevelopmenthome', compact('user','productgrouplist','usertype'));
    }
    public function viewproductlist(Request $request,$id) 
	 {
         $user = Auth::user();
	
		//$materiallist=PaperMaterial::all();
		
		$columnsname=ProductDevelopmentFields::where('ProductSubGroupID','=',$id)->where('status','=',1)->get();
		
		$productsubgroupid=$id;
		
		$productsubgroupdetails=ProductSubGroup::where('id','=',$productsubgroupid)->where('status','=',1)->first();
		
		$productgroupdetails=ProductGroup::where('id','=',$productsubgroupdetails->Product_groupID)->where('status','=',1)->first();
		$usertype = UserType::where('id', '=', $user->userTypeID)->first();
		 //Rajesh 07042018 
        return view('admin.pdmproducts', compact('id','user','columnsname','productsubgroupdetails','productgroupdetails','usertype'));
    }

    public function viewgrouplist(Request $request,$id) 
	 {
         $user = Auth::user();
	
		//$materiallist=PaperMaterial::all();
		$productgroupdetails=ProductGroup::where('id','=',$id)->where('status','=',1)->first();

	   $columnsname=ProductDevelopmentFields::where('ProductGroupID','=',$productgroupdetails->id)->where('status','=',1)->get();
		$productsubgroupid=$productgroupdetails->id;
		
		$productsubgroupdetails=ProductSubGroup::where('Product_groupID','=',$productsubgroupid)->where('status','=',1)->first();
		$usertype = UserType::where('id', '=', $user->userTypeID)->first();
		
		//$columnsname=ProductDevelopmentFields::where('ProductSubGroupID','=',$id)->where('status','=',1)->get();
		 
        return view('admin.pdmproducts', compact('user','columnsname','productsubgroupdetails','productgroupdetails','usertype'));
    }
	
        public function addDropdownOptions(Request $request)
        {
		   
		   $editid=$request->id;
		   $columnvalues=$request->value;
		   $tablename=$request->table;
		   $tablenamecolumn=$request->tablefield;
		 if($editid!="")
		   {
		   $dropdownoptionsupdations=DB::Select('call sp_commonupdateprocedure(1,'.$editid.',"'.$tablename.'","'.$tablenamecolumn.'",\'"'.$columnvalues.'"\')');
		   $data=$dropdownoptionsupdations;
		   }
		   else
		   {
			$dropdownoptionsinsertions=DB::Select('call sp_commonupdateprocedure(2,0,"'.$tablename.'","'.$tablenamecolumn.'",\'"'.$columnvalues.'"\')');
			$data=$dropdownoptionsinsertions;
			$request->session()->flash('success', 'Dropdown Options added successfully.');  
			
   
   }
   
   return json_encode($data);
 

    }
	public function addFieldnames(Request $request,$id)
	{
	
	
	 $editid=$request->fieldeditID;
	  $fieldname=$request->fieldname;
	 
	 
	  
	 
	  $checkproductdevelopmentfieldID =ProductDevelopmentFields::where('id', '=', $request->fieldeditID)->first();
	  if($checkproductdevelopmentfieldID->ProductGroupID > 0)
	  {
	 		$groupid = 1;
	   		$checkfortablename = ProductGroup::where('id','=',$checkproductdevelopmentfieldID->ProductGroupID)->first();
	   		$tablename= $checkfortablename->ProductGroup;
	   		$tablename = strtolower(str_replace(' ', '', $tablename));
			  //return redirect(url(route('admin.viewgrouplist',['id'=>$id])));
	 
	  }
	else
	{
		$checkfortablename = ProductSubGroup::where('id','=', $checkproductdevelopmentfieldID->ProductSubGroupID)->first();
	   		$checkfortablename = ProductGroup::where('id', '=', $checkfortablename->Product_groupID)->first();
	   		$tablename= $checkfortablename->ProductGroup;
	   		$tablename = strtolower(str_replace(' ','', $tablename));
	        $groupid = 0;
	}
	   
	 
	  $columnsname= DB::select('SELECT a.COLUMN_NAME, a.COLUMN_TYPE FROM information_schema.COLUMNS a WHERE a.TABLE_NAME = "'.$tablename.'" and a.column_comment = "'.$checkproductdevelopmentfieldID->fieldname.'"');
	  
	 foreach($columnsname as $col)
        {
            $columnnames = $col->COLUMN_NAME;
        $columntype = $col->COLUMN_TYPE;
       
    
        $commentupdate = DB::select('ALTER TABLE '.$tablename.' CHANGE COLUMN '.$columnnames.' '.$columnnames.' '.$columntype.' COMMENT "'.$request->fieldname.'"');     
                              

 }     
	 if($groupid == 1)
	 {
	 	$paperbags_updations = DB::select('call sp_CRUDProductdevelopmentfields(3,'.$request->fieldeditID.',"'.$request->fieldname.'","'.$id.'",0)');  
	  $request->session()->flash('success', 'Fieldname Updated successfully');
	     return redirect(url(route('admin.viewgrouplist',['id'=>$id])));
	 }
	 else
	 {
	 	$paperbags_updations = DB::select('call sp_CRUDProductdevelopmentfields(2,'.$request->fieldeditID.',"'.$request->fieldname.'","'.$id.'",0)');  
	  $request->session()->flash('success', 'Fieldname Updated successfully');
	   return redirect(url(route('admin.listofproducts',['id'=>$id])));
	 }
	 
	
	 }
	
	public function updateallfieldnames(Request $request,$id)
	{
	$data=Input::all();
	//print_r($data);exit;
	
	//echo $id;exit;
	
	$tablefield=$data['tablefield']; 
	$tablefieldid=$data['tablefieldid']; 
	

	$tablename=$data['tablename'];
	$tablenamecolumn=$data['tablenamefield'];
	$length=count($data['tablecontent']);
	
	for($i=0;$i<$length;$i++)
	{
	
			if($data['tablecontent'][$i]!="" && $data['tablecontentid'][$i]!="")
			{	
			
			$dropdownoptionsupdations=DB::Select('call sp_commonupdateprocedure(1,'.$data['tablecontentid'][$i].',"'.$tablename.'","'.$tablenamecolumn.'",\'"'.$data['tablecontent'][$i].'"\')');
				  
			 }

			 if($data['tablecontent'][$i]!="" && $data['tablecontentid'][$i]=="")
			{	
			if($tablename=='language'){
			$lanvalue=$data['tablecontent'][$i];
			$languset=strtolower(substr($lanvalue, 0, 3));
     		$drytable='dry'.$languset;
     		$drycleaningtable='drycleaning'.$languset;
     		$bleachtable='bleach'.$languset;
     		$countryoforiginetable='countryoforigin'.$languset;
     		$fabriccompositiontable='fabriccomposition'.$languset;
     		$garmentcomponentstable='garmentcomponents'.$languset;
     		$irontable='iron'.$languset;
     		$sizestable='sizes'.$languset;
     		$washtable='wash'.$languset;
     		//Fieldname
     		$drytable_field='CareInstruction-Dry '.strtoupper($languset);
     		$drycleaningtable_field='Care Instruction - Dry Clean '.strtoupper($languset);
     		$bleachtable_field='Care Instruction - Bleach '.strtoupper($languset);
     		$countryoforiginetable_field='Country of Origin-'.strtoupper($languset);
     		$fabriccompositiontable_field='Fabric Composition - '.strtoupper($languset);
     		$garmentcomponentstable_field='Garment Components- '.strtoupper($languset);
     		$irontable_field='Care Instruction - Iron'.strtoupper($languset);
     		$sizestable_field='Sizes-'.strtoupper($languset);
     		$washtable_field='Care Instruction - Wash'.strtoupper($languset);


					DB::statement('CREATE TABLE '.$drytable.' LIKE `dryeng`');
					DB::statement("INSERT INTO productdevelopmentfields (ProductSubGroupID, fieldname,tablename,columnfieldname,isvalid,hide,dropdown,popup,status)
SELECT ProductSubGroupID, 
       '".$drytable_field."','".$drytable."',columnfieldname,isvalid,hide,dropdown,popup,status
  FROM productdevelopmentfields
 WHERE tablename  = 'dryeng'");

					DB::statement('CREATE TABLE '.$drycleaningtable.' LIKE `drycleaningeng`');
					DB::statement("INSERT INTO productdevelopmentfields (ProductSubGroupID, fieldname,tablename,columnfieldname,isvalid,hide,dropdown,popup,status)
SELECT ProductSubGroupID, 
       '".$drycleaningtable_field."','".$drycleaningtable."',columnfieldname,isvalid,hide,dropdown,popup,status
  FROM productdevelopmentfields
 WHERE tablename  = 'drycleaningeng'");

					DB::statement('CREATE TABLE '.$bleachtable.' LIKE `bleacheng`');
					DB::statement("INSERT INTO productdevelopmentfields (ProductSubGroupID, fieldname,tablename,columnfieldname,isvalid,hide,dropdown,popup,status)
SELECT ProductSubGroupID, 
       '".$bleachtable_field."','".$bleachtable."',columnfieldname,isvalid,hide,dropdown,popup,status
  FROM productdevelopmentfields
 WHERE tablename  = 'bleacheng'");

					DB::statement('CREATE TABLE '.$countryoforiginetable.' LIKE `countryoforigineng`');
					DB::statement("INSERT INTO productdevelopmentfields (ProductSubGroupID, fieldname,tablename,columnfieldname,isvalid,hide,dropdown,popup,status)
SELECT ProductSubGroupID, 
       '".$countryoforiginetable_field."','".$countryoforiginetable."',columnfieldname,isvalid,hide,dropdown,popup,status
  FROM productdevelopmentfields
 WHERE tablename  = 'countryoforigineng'");

					DB::statement('CREATE TABLE '.$fabriccompositiontable.' LIKE `fabriccompositioneng`');
					DB::statement("INSERT INTO productdevelopmentfields (ProductSubGroupID, fieldname,tablename,columnfieldname,isvalid,hide,dropdown,popup,status)
SELECT ProductSubGroupID, 
       '".$fabriccompositiontable_field."','".$fabriccompositiontable."',columnfieldname,isvalid,hide,dropdown,popup,status
  FROM productdevelopmentfields
 WHERE tablename  = 'fabriccompositioneng'");

					DB::statement('CREATE TABLE '.$garmentcomponentstable.' LIKE `garmentcomponentseng`');
					DB::statement("INSERT INTO productdevelopmentfields (ProductSubGroupID, fieldname,tablename,columnfieldname,isvalid,hide,dropdown,popup,status)
SELECT ProductSubGroupID, 
       '".$garmentcomponentstable_field."','".$garmentcomponentstable."',columnfieldname,isvalid,hide,dropdown,popup,status
  FROM productdevelopmentfields
 WHERE tablename  = 'garmentcomponentseng'");

					DB::statement('CREATE TABLE '.$irontable.' LIKE `ironeng`');
					DB::statement("INSERT INTO productdevelopmentfields (ProductSubGroupID, fieldname,tablename,columnfieldname,isvalid,hide,dropdown,popup,status)
SELECT ProductSubGroupID, 
       '".$irontable_field."','".$irontable."',columnfieldname,isvalid,hide,dropdown,popup,status
  FROM productdevelopmentfields
 WHERE tablename  = 'ironeng'");

					DB::statement('CREATE TABLE '.$sizestable.' LIKE `sizeseng`');
					DB::statement("INSERT INTO productdevelopmentfields (ProductSubGroupID, fieldname,tablename,columnfieldname,isvalid,hide,dropdown,popup,status)
SELECT ProductSubGroupID, 
       '".$sizestable_field."','".$sizestable."',columnfieldname,isvalid,hide,dropdown,popup,status
  FROM productdevelopmentfields
 WHERE tablename  = 'sizeseng'");

					DB::statement('CREATE TABLE '.$washtable.' LIKE `washeng`');
					DB::statement("INSERT INTO productdevelopmentfields (ProductSubGroupID, fieldname,tablename,columnfieldname,isvalid,hide,dropdown,popup,status)
SELECT ProductSubGroupID, 
       '".$washtable_field."','".$washtable."',columnfieldname,isvalid,hide,dropdown,popup,status
  FROM productdevelopmentfields
 WHERE tablename  = 'washeng'");

			}
			/*$dropdownoptionsupdations=DB::Select('call sp_commonupdateprocedure(1,'.$data['tablecontentid'][$i].',"'.$tablename.'","'.$tablenamecolumn.'",\'"'.$data['tablecontent'][$i].'"\')');*/

			$dropdownoptionsinsertions=DB::Select('call sp_commonupdateprocedure(2,0,"'.$tablename.'","'.$tablenamecolumn.'",\'"'.$data['tablecontent'][$i].'"\')');
			//$data=$dropdownoptionsinsertions;
			//$request->session()->flash('success', 'Dropdown Options added successfully.'); 
				  
			 }
	 
	}
	
	$checkfieldnames=ProductDevelopmentFields::where('id','=',$tablefieldid)->first();
	
	if($checkfieldnames->ProductGroupID > 0)
	  {
	 		$groupid = 1;
	   		$checkfortablename = ProductGroup::where('id','=',$checkfieldnames->ProductGroupID)->first();
	   		$tablename= $checkfortablename->ProductGroup;
	   		$tablename = strtolower(str_replace(' ', '', $tablename));
			  //return redirect(url(route('admin.viewgrouplist',['id'=>$id])));
	 
	  }
	else
	{
		$checkfortablename = ProductSubGroup::where('id','=', $checkfieldnames->ProductSubGroupID)->first();
	   		$checkfortablename = ProductGroup::where('id', '=', $checkfortablename->Product_groupID)->first();
	   		$tablename= $checkfortablename->ProductGroup;
	   		$tablename = strtolower(str_replace(' ','', $tablename));
	        $groupid = 0;
	}
	   
	
	 $columnsname= DB::select('SELECT a.COLUMN_NAME, a.COLUMN_TYPE FROM information_schema.COLUMNS a WHERE a.TABLE_NAME = "'.$tablename.'" and a.column_comment = "'.$checkfieldnames->fieldname.'"');
	 
	//echo 'SELECT a.COLUMN_NAME, a.COLUMN_TYPE FROM information_schema.COLUMNS a WHERE a.TABLE_NAME = "'.$tablename.'" and a.column_comment = "'.$checkfieldnames->fieldname.'"';exit;
	 
	  foreach($columnsname as $col)
        {
            $columnnames = $col->COLUMN_NAME;
        $columntype = $col->COLUMN_TYPE;
       
    
        $commentupdate = DB::select('ALTER TABLE '.$tablename.' CHANGE COLUMN '.$columnnames.' '.$columnnames.' '.$columntype.' COMMENT "'.$request->tablefield.'"');     
                              

        }     
	 if($groupid == 1)
	 {
	
	 	$paperbags_updations = DB::select('call sp_CRUDProductdevelopmentfields(3,'.$tablefieldid.',"'.$request->tablefield.'","'.$id.'",0)');  
	
	 }
	 else
	 {
	 	//$paperbags_updations = DB::select('call sp_CRUDProductdevelopmentfields(2,'.$request->fieldeditID.',"'.$request->fieldname.'","'.$id.'",0)');  
	 // $request->session()->flash('success', 'Fieldname Updated successfully');
	   //return redirect(url(route('admin.listofproducts',['id'=>$id])));
	   $paperbags_updations = DB::select('call sp_CRUDProductdevelopmentfields(2,'.$tablefieldid.',"'.$request->tablefield.'","'.$id.'",0)');  
	 }
	 
	
	
	 $checkproductgroup=ProductDevelopmentFields::where('id','=',$tablefieldid)->first();
	
	if($checkproductgroup->ProductGroupID>0)
	 {
	
	  $request->session()->flash('success','updated successfully.');
	   return redirect(url(route('admin.viewgrouplist',['id'=>$checkproductgroup->ProductGroupID])));	
	 
	 }
	 else
	 {
	 return redirect(url(route('admin.listofproducts',['id'=>$checkproductgroup->ProductSubGroupID])));
	 }
	 
	
	
	
	
	}
	  public function delete(Request $request,$id)
     {
         $user = Auth::user();
		 
         $product_delete = DB::select('call sp_commonprocedure(2,'.$id.',"productdevelopmentfields")'); 
         $request->session()->flash('error', 'Field Name removed from product development successfully.');   
		 
		$checkproductdevelopmentfieldID =ProductDevelopmentFields::where('id', '=', $id)->first();
	  if($checkproductdevelopmentfieldID->ProductGroupID > 0)
	  {
	  return redirect(url(route('admin.viewgrouplist',['id'=>$checkproductdevelopmentfieldID->ProductGroupID])));
	  }
	  else
	  {
	  return redirect(url(route('admin.listofproducts',['id'=>$checkproductdevelopmentfieldID->ProductSubGroupID])));
	  }
          	
    }
	
	public function deletedropdownvalue(Request $request)
     {
       
    $editid=$request->id;
   $columnvalues=$request->value;
   $tablename=$request->table;
   $tablenamecolumn=$request->tablefield;
   //print_r($editid); print_r($tablename);exit;
    $productgroup_delete = DB::select('call sp_commonprocedure(3,'.$editid.',"'.$tablename.'")'); 
    
    $data=$productgroup_delete;
    
    return json_encode($data);
    }
	
	public function deletedropdownvaluetablename(Request $request)
     {
       
    $editid=$request->id;
	
   $product_delete = DB::select('call sp_commonprocedure(2,'.$editid.',"productdevelopmentfields")'); 
    
    $data=$product_delete;
    
    return json_encode($data);
    }
	
	public function FieldnamesSelect(Request $request,$id)
	{
	
    $fieldnames=ProductDevelopmentFields::where('id','=',$id)->where('status','=',1)->first();
	$data=$fieldnames;
	return json_encode($data);
	
   }
   public function ProductDevelopmentSelect(Request $request, $id)
    {
       $editid=$request->id;
        $columnvalues=$request->value;		
		$productname=ProductDevelopmentFields::where('id', '=', $editid)->where('fieldname','=',$columnvalues)->first();
		$editproductname=$productname->fieldname;
		$productid=$id;
     
      if (preg_match('/^[0-9]+$/', $columnvalues)) {
  $productdetails_data = ProductDevelopmentFields::where('id', '=', $id)->first();
       $data = $productdetails_data;
       $contenttype='number';
       $columnfield='';
       $currtablename = '';
} else {


$product=ProductDevelopmentFields::where('popup','=',1)->where('status','=',1)->first();

$contenttype='string';

    $columnvalues = strtolower(str_replace(' ', '', $productname->tablename));
    $currtablename = $columnvalues;
	$columnfield = $productname->columnfieldname;
  
    $columnsname= DB::select('SELECT * FROM '.$columnvalues.'');
    foreach ($columnsname as $fieldvalue) {
        $processdata[]=$fieldvalue;
    }
		
		
  $data = $processdata;
			return json_encode(["success" => true,'processtype'=>$contenttype,'currtablename'=>$currtablename,'columnfield'=>$columnfield,'productname'=>$editproductname,"editproductid"=>$productid,"deleteproductid1"=>$productid,$data]);
			 
			 }
    
    }




}
?>
