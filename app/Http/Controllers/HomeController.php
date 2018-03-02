<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input;
use Session;

//Auth facade
use Auth;

use App\UserType;

use App\Chain;
use App\ProductGroup;
use App\ProductSubGroup;
use App\ProductDevelopmentFields;

class HomeController extends Controller

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

    public function index()

    {

      $user = Auth::user();

      $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	  
	 // print_r($user);
	 // exit;
      $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();

      $productsubgr = ProductSubGroup::where('Product_groupID','=',1)->get();

      //$productsubgroupdetails=App\ProductSubGroup::where('Product_groupID','=',$productgroupid)->get();
    
       
      if ($user->is_sys_admin && ($user->userTypeID==1 || $user->userTypeID==9)) {

          return redirect(url(route('admin.home')));
          //return view('admin.home', compact('user'));

      }else{
        $chainSessionData=Session::get('chainData');
       // $chains = Chain::where('id', $chainID)->first();
        return view('users.home', compact('user','usertype','chainSessionData','productgrouplist','productsubgr'));
      }
    

    }
 public function viewgrouplist(Request $request,$id) 
   {
         $user = Auth::user();
  
    //$materiallist=PaperMaterial::all();
	    $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    $productgroupdetails=ProductGroup::where('id','=',$id)->where('status','=',1)->first();

     $columnsname=ProductDevelopmentFields::where('ProductGroupID','=',$productgroupdetails->id)->where('status','=',1)->get();
    $productsubgroupid=$productgroupdetails->id;
    
    $productsubgroupdetails=ProductSubGroup::where('Product_groupID','=',$productsubgroupid)->where('status','=',1)->first();
    
    
    //$columnsname=ProductDevelopmentFields::where('ProductSubGroupID','=',$id)->where('status','=',1)->get();
     
       return view('users.pdmproducts', compact('user','columnsname','productsubgroupdetails','productgroupdetails','usertype'));
    }
    
 public function indexdemo()

    {

      $user = Auth::user();

      $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	  
	 // print_r($user);
	 // exit;

      if ($user->is_sys_admin && $user->userTypeID==1) {

          return redirect(url(route('admin.home')));
          //return view('admin.home', compact('user'));

      }else{
        $chainSessionData=Session::get('chainData');
       // $chains = Chain::where('id', $chainID)->first();
        return view('users.home1', compact('user','usertype','chainSessionData'));
      }
    

    }
    

 public function developmentindex() 
   {

         $user = Auth::user();

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
     
     $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
    
        return view('users.home', compact('user','productgrouplist','usertype'));
    }
    public function viewproductlist(Request $request,$id) 
   {
    //echo "fghfhb";exit;
         $user = Auth::user();
  $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    //$materiallist=PaperMaterial::all();
    
    $columnsname=ProductDevelopmentFields::where('ProductSubGroupID','=',$id)->where('status','=',1)->get();
    
    $productsubgroupid=$id;
    
    $productsubgroupdetails=ProductSubGroup::where('id','=',$productsubgroupid)->where('status','=',1)->first();
    
    $productgroupdetails=ProductGroup::where('id','=',$productsubgroupdetails->Product_groupID)->where('status','=',1)->first();
     
        return view('users.pdmproducts', compact('user','columnsname','productsubgroupdetails','productgroupdetails','usertype'));
    }

    public function ProductDevelopmentSelect(Request $request, $id)
    { 
      //echo "dfgdfg";exit;
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

    public function FieldnamesSelect(Request $request,$id)
  {
    //echo "ddffdf"; exit;
    $fieldnames=ProductDevelopmentFields::where('id','=',$id)->where('status','=',1)->first();
  $data=$fieldnames;
  return json_encode($data);
  
   }

   public function updateallfieldnames(Request $request,$id)
  {
  $data=Input::all();
  
  
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
     return redirect(url(route('users.viewgrouplist',['id'=>$checkproductgroup->ProductGroupID]))); 
   
   }
   else
   {
   return redirect(url(route('users.listofproducts',['id'=>$checkproductgroup->ProductSubGroupID])));
   }
   
  
  
  
  
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
       return redirect(url(route('users.viewgrouplist',['id'=>$id])));
   }
   else
   {
    $paperbags_updations = DB::select('call sp_CRUDProductdevelopmentfields(2,'.$request->fieldeditID.',"'.$request->fieldname.'","'.$id.'",0)');  
    $request->session()->flash('success', 'Fieldname Updated successfully');
     return redirect(url(route('users.listofproducts',['id'=>$id])));
   }
   
  
   }
  public function delete(Request $request,$id)
     {
         $user = Auth::user();
     
    // echo $id;exit;
    
         $product_delete = DB::select('call sp_commonprocedure(2,'.$id.',"productdevelopmentfields")'); 
         $request->session()->flash('error', 'Field Name removed from product development successfully.');   
     
    $checkproductdevelopmentfieldID =ProductDevelopmentFields::where('id', '=', $id)->first();
    if($checkproductdevelopmentfieldID->ProductGroupID > 0)
    {
    return redirect(url(route('users.viewgrouplist',['id'=>$checkproductdevelopmentfieldID->ProductGroupID])));
    }
    else
    {
    return redirect(url(route('users.listofproducts',['id'=>$checkproductdevelopmentfieldID->ProductSubGroupID])));
    }
            
    }
   

}

