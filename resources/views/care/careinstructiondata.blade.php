@extends('care.layouts.care')
<?php
error_reporting(0);
?>

@section('content')
<style>
.productibox-title{float:left; /*background-color:#CCCCCC;*/ width:100%;}
.clsdropbtn {
     background-color: #00AEEF;
    color: white;
    padding: 4px;
    font-size: 13px;
    border: none;
    cursor: pointer;
	width: 160px;
	height:32px;
	border-radius: 5px;
	padding: 4px;
	margin-top: 12px;
}

.clsdropdown {
    position: relative;
    display: inline-block;
}

.clsdropdown-content {
    display: none;
    position: absolute;
    background-color: #0095cd;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	color:white;
}

.clsdropdown-content a {
   color: black;
    padding: 4px 16px;
    text-decoration: none;
    display: block;
	font-size: 13px;
}

.clsdropdown-content a:hover {background-color: #457093}

.clsdropdown:hover .clsdropdown-content {
    display: block;
}

.clsdropdown:hover .clsdropbtn {
    background-color: #00AEEF;
}


.clsprodhomedd {
    float: left;
    width: 100%;
    text-align: center;
}
.headerlink
{
 width:100%;
 float:left;
}
span.fa.fa-chevron-down {
    float: right;
    margin-right: 2px;
}
.actionspace{width:60px; float:left;}
.fieldsetcls
{
width:100%; overflow-x:scroll;	
}
label.col-lg-5.control-label.font-noraml.text-left {
    float: left;
    width: 41.66%;
    font-size: 13px;
    color: #555;
}
</style>



<div class="ibox-title productibox-title">
<div class="col-lg-12 clsprodhomedd">



</div>
<div class="col-lg-12 clsprodhomedd">
  
 <?php
 //print_r($productlist);
 ?>
<div class="ibox-content">
                           
<?php 

//echo "customerid".$customerID; exit;

//echo '<pre>';print_r($FabricCompositionarray);echo '</pre>';
?>
                            <form id="form" action="{{url(route('order.addneworder'))}}" method="post" class="wizard-big">
                                {{ csrf_field() }}
                                <h1>Language Maintenance</h1>
                                <fieldset>
                                    
                                    
                    <div class="form-group col-lg-12">
                                      <div class="form-group col-lg-12" >
                                       <table id="example1" class="table table-striped table-bordered table-hover dataTables-example1 unique_user_detail_table">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->

                    @if (count($carelanguage) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
<th>Language</th>
                        <th class="customer_th">Action</th>                        

                        <th class="contact_first_th">Status</th>

                       

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($carelanguage as $languagelist)                        
<tr>
    <td>{{ $languagelist->LanguageName }}</td>
                    <td>
                          

                        <a data-href="" data-selecthref="" data-valueid="Language options" href="javascript:;" class="showfieldnames" data-id="" data-toggle="modal" data-target="#myModal1"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

           @if ($languagelist->status==0)
                        
                        <span class="activatcustomeruser"><a data-href="{{ url(route('customeruser.activate',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
                        @else
                         <span class="deactivatecustomeruser"><a data-href="{{ url(route('customeruser.deactivate',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="DeActivate"/></a></span> 
                         @endif

                    </td>
                    
                    <td>
                        @if ($languagelist->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif 
                    </td>
                    
</tr>
                    @endforeach

                    

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="4">No Languages(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>
                                       
                                    </div> 
                                       
                                    </div>

                                </fieldset>
                               
                                <h1>Size Maintenance</h1>
                                <fieldset>
                                    

                                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example1 unique_user_detail_table">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->

                    @if (count($carelanguage) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
<th></th>
                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                        <th class="customer_th">{{$languagelist->LanguageName}}</th>    
                        @endif                    
                        @endforeach
                        <th class="contact_first_th">Action</th>
                        <th class="contact_first_th">Status</th>

                       

                        

                    </tr>

                    </thead>

                    <tbody>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
<td></td>
                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                       <?php $processlan=explode('/', $languagelist->LanguageName);$languset='';
foreach ($processlan as $lanvalue) {
    $languset.=strtolower(substr($lanvalue, 0, 3));
    $table='sizes'.$languset;
    if (Schema::hasTable($table)) {
     $fielddetailslist[] = DB::table($table)->get();
}
   

}

?>
                        <td class="customer_th">{{$languagelist->LanguageName}}</td>    
                        @endif                    
                        @endforeach
                        <td class="contact_first_th">Action</td>
                        <td class="contact_first_th">Status</td>

                       

                        

                    </tr>

                    

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="4">No Product(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>

                                    
                                </fieldset>

                                <h1>Country Of Origin Maintenance</h1>
                                <fieldset class="fieldsetcls">
                                    

                                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example1 unique_user_detail_table" style="overflow:auto; height:auto">

                      <h5><a href="" class="btn btn-primary fa fa-plus addnewlabelprint" data-toggle="modal" data-target="#myModal2"> addnewcountryoforigin</a></h5>

                      <?php
                       //print_r($carelanguage);

                      ?>

                    @if (count($carelanguage) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                        <th class="customer_th">{{$languagelist->LanguageName}}</th>    
                        @endif                    
                        @endforeach
                        <th class="contact_first_th actionspace">Action</th>
                       
                        <th class="contact_first_th">Status</th>

                       

                        

                    </tr>

                    </thead>

                    <tbody>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                       <?php $processlan=explode('/', $languagelist->LanguageName);$languset='';
                      
foreach ($processlan as $lanvalue) {
     $languset.=strtolower(substr($lanvalue, 0, 3));
    $table='countryoforigin'.$languset;
    if (Schema::hasTable($table)) {
      //echo "/";
    $countryfielddetailslist[] = DB::table($table)->get();
}else{
    $countryfielddetailslist[]='';
}
}

?>
                          
                        @endif                    
                        @endforeach
                        <?php //echo '<pre>';print_r($countryfielddetailslist);echo '</pre>';

$i=0;
foreach ($countryfielddetailslist as $typekey => $typevalue) {
   
     if(is_object($typevalue)){
        foreach ($typevalue as $key => $value) {
         $processdetails[$i][]=$value->CountryofOriginName;
         //echo "----";
        }
    

    $i++;
}
    
}
//echo '<pre>';print_r($processdetails);echo '</pre>';

$arraylen=0;
for ($i=0; $i <count($processdetails) ; $i++) { 
    if(count($processdetails[$i])>$arraylen){$arraylen=count($processdetails[$i]);}
}

for ($i=0; $i < $arraylen; $i++) { 
    $j=0;?>
    <tr>
    @foreach($carelanguage as $languagelist)
   
                       @if($languagelist->status==1)
                       <td><?php echo isset($processdetails[$j][$i])?$processdetails[$j][$i]:''; ?></td>
                        <?php $j++; ?>

                       @endif
                      
                      
                       @endforeach
                        <td><a data-href="{{ url('/') }}" data-selecthref="{{ url(route('admin.drysymbolselect', ['id' => $languagelist->id])) }}"  href="javascript:;" class="editSymbol" data-valueid="{{ $languagelist->id }}" data-toggle="modal" data-target="#myModal2"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                  
                   @if ($languagelist->status==0)
                        
                        <span class="activatecoo"><a data-href="{{ url(route('ecommercemaintenance.cooactivenew',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
                        @else
                         <span class="deactivatecoo"><a data-href="{{ url(route('ecommercemaintenance.coodeactivenew',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 
                         @endif
                  
                  
                  
                  </td>
                  <td>
                  @if ($languagelist->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif 
                    </td>

                   </tr>
                   
                   <?php } ?>
                   
                


                    

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="4">No Country Of Origin(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>

                                    
                                </fieldset>

                                <h1>Care Instruction Maintenance</h1>
                               <fieldset class="fieldsetcls">
<input type="hidden" name="pageurl" id="pageurl" value="<?php echo url('/'); ?>">
<input type="hidden" name="customerID" id="customerID" value="<?php echo $customerID; ?>">
                                <div class="row">
                                        <div class="form-group">
                                            <input type="hidden" name="userID" value="1">
                  <label class="col-lg-12 control-label font-noraml text-left label_font">Care Instruction:<span class="required" aria-required="true">*</span></label>
                <input type="hidden" name="pageurl" id="pageurl" value="http://aitechindia.com/laravel/uniquegroup/public">
                                                   <div class="col-lg-5 productsubgroup">
                        <select id="Careinstruction" name="Careinstruction" class="form-control dropdownwidth">
                            <option></option>
                             @foreach($Careinstruction as $Care)

                                <option value="{{ $Care->Instruction}}">{{$Care->Instruction}}</option>

                              @endforeach                              

                                                    </select>
                        </div>
                       
                        </div>
                    </div>
<table id="example1" class="table table-striped table-bordered table-hover Careinstructiontable dataTables-example1 unique_user_detail_table">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->

                    @if (count($carelanguage) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                        <th class="customer_th">{{$languagelist->LanguageName}}</th>    
                        @endif                    
                        @endforeach
                        <th class="contact_first_th actionspace">Action</th>
                        <th class="contact_first_th">Status</th>

                       

                        

                    </tr>

                    </thead>

                    <tbody>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                       <?php $processlan=explode('/', $languagelist->LanguageName);$languset='';
                      
foreach ($processlan as $lanvalue) {
     $languset.=strtolower(substr($lanvalue, 0, 3));
     $table='dry'.$languset;
    if (Schema::hasTable($table)) {
    $fabricfielddetailslist[] = DB::table($table)->get();
}else{
    $fabricfielddetailslist[]='';
}
}

?>
                          
                        @endif                    
                        @endforeach
                        <?php //echo '<pre>';print_r($countryfielddetailslist);echo '</pre>';

$i=0;
foreach ($fabricfielddetailslist as $typekey => $fabtypevalue) {
   
     if(is_object($fabtypevalue)){
        foreach ($fabtypevalue as $key => $fabvalue) {

            //echo '<pre>';print_r($value->FabricComposition);echo '</pre>';
         $fabprocessdetails[$i][]=$fabvalue->DryNames;
        }
    

    $i++;
}
    
}
//echo '<pre>';print_r($processdetails);echo '</pre>';
$arraylen=0;
for ($i=0; $i <count($fabprocessdetails) ; $i++) { 
    if(count($fabprocessdetails[$i])>$arraylen){$arraylen=count($fabprocessdetails[$i]);}
}

for ($i=0; $i < $arraylen; $i++) { 
    $j=0;?>
    <tr>
    @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                       <td><?php echo isset($fabprocessdetails[$j][$i])?$fabprocessdetails[$j][$i]:''; ?></td>
                       @endif
                       <?php $j++; ?>
                  
                       @endforeach
                       <td><a data-href="{{ url('/') }}" data-selecthref="{{ url(route('admin.drysymbolselect', ['id' => $languagelist->id])) }}"  href="javascript:;" class="editSymbol" data-valueid="{{ $languagelist->id }}" data-toggle="modal" data-target="#myModal3"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                  
                   @if ($languagelist->status==0)
                        
                        <span class="activatecoo"><a data-href="{{ url(route('ecommercemaintenance.cooactivenew',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
                        @else
                         <span class="deactivatecoo"><a data-href="{{ url(route('ecommercemaintenance.coodeactivenew',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 
                         @endif
                  
                  </td>

<td>
                  @if ($languagelist->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif 
                    </td>
                   </tr>
                   
                   <?php } ?>


                    

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="4">No Fabric Composition(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>

                                </fieldset>

                                <h1>Fabric Composition Maintenance</h1>
                                  <fieldset class="fieldsetcls">
<table id="example1" class="table table-striped table-bordered table-hover dataTables-example1 unique_user_detail_table">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->

                    @if (count($carelanguage) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                        <th class="customer_th">{{$languagelist->LanguageName}}</th>    
                        @endif                    
                        @endforeach
                        <th class="contact_first_th actionspace">Action</th>
                        <th class="contact_first_th">Status</th>

                       

                        

                    </tr>

                    </thead>

                    <tbody>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                       <?php $processlan=explode('/', $languagelist->LanguageName);$languset='';
                      
foreach ($processlan as $lanvalue) {
     $languset.=strtolower(substr($lanvalue, 0, 3));
     $table='fabriccomposition'.$languset;
    if (Schema::hasTable($table)) {
    $fabricfielddetailslist[] = DB::table($table)->get();
}else{
    $fabricfielddetailslist[]='';
}
}

?>
                          
                        @endif                    
                        @endforeach
                        <?php //echo '<pre>';print_r($countryfielddetailslist);echo '</pre>';

$i=0;
foreach ($fabricfielddetailslist as $typekey => $fabtypevalue) {
   
     if(is_object($fabtypevalue)){
        foreach ($fabtypevalue as $key => $fabvalue) {

            //echo '<pre>';print_r($value->FabricComposition);echo '</pre>';
         $fabprocessdetails[$i][]=$fabvalue->FabricComposition;
        }
    

    $i++;
}
    
}
//echo '<pre>';print_r($processdetails);echo '</pre>';
$arraylen=0;
for ($i=0; $i <count($fabprocessdetails) ; $i++) { 
    if(count($fabprocessdetails[$i])>$arraylen){$arraylen=count($fabprocessdetails[$i]);}
}

for ($i=0; $i < $arraylen; $i++) { 
    $j=0;?>
    <tr>
    @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                       <td><?php echo isset($fabprocessdetails[$j][$i])?$fabprocessdetails[$j][$i]:''; ?></td>
                       
                     
                       @endif
                       <?php $j++; ?>
                       @endforeach
                         <td><a data-href="{{ url('/') }}" data-selecthref="{{ url(route('admin.drysymbolselect', ['id' => $languagelist->id])) }}"  href="javascript:;" class="editSymbol" data-valueid="{{ $languagelist->id }}" data-toggle="modal" data-target="#myModal4"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                  
                   @if ($languagelist->status==0)
                        
                        <span class="activatecoo"><a data-href="{{ url(route('ecommercemaintenance.cooactivenew',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
                        @else
                         <span class="deactivatecoo"><a data-href="{{ url(route('ecommercemaintenance.coodeactivenew',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 
                         @endif
                  
                  </td>
                         <td>
                  @if ($languagelist->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif 
                    </td>
                   </tr>
                   
                   <?php } ?>


                    

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="4">No Fabric Composition(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>

                                </fieldset>

                                 <h1>Garment Components Maintenance</h1>
                                <fieldset class="fieldsetcls">
<table id="example1" width="100%" class="table table-striped table-bordered table-hover dataTables-example1 unique_user_detail_table">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->

                    @if (count($carelanguage) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                        <th class="customer_th">{{$languagelist->LanguageName}}</th>    
                        @endif                    
                        @endforeach
                        <th class="contact_first_th actionspace">Action</th>
                        <th class="contact_first_th">Status</th>

                       

                        

                    </tr>

                    </thead>

                    <tbody>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                       @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                       <?php $processlan=explode('/', $languagelist->LanguageName);$languset='';
                      
foreach ($processlan as $lanvalue) {
     $languset.=strtolower(substr($lanvalue, 0, 3));
     $table='garmentcomponents'.$languset;
    if (Schema::hasTable($table)) {
    $garmefielddetailslist[] = DB::table($table)->get();
}else{
    $garmefielddetailslist[]='';
}
}

?>
                          
                        @endif                    
                        @endforeach
                        <?php //echo '<pre>';print_r($countryfielddetailslist);echo '</pre>';

$i=0;
foreach ($garmefielddetailslist as $typekey => $gartypevalue) {
   
     if(is_object($gartypevalue)){
        foreach ($gartypevalue as $key => $garvalue) {

            //echo '<pre>';print_r($value->FabricComposition);echo '</pre>';
         $garprocessdetails[$i][]=$garvalue->GarmentComponents;
        }
    

    $i++;
}
    
}
//echo '<pre>';print_r($processdetails);echo '</pre>';echo count($garprocessdetails);
$arraylen=0;
for ($gi=0; $gi<count($garprocessdetails);$gi++) { 
   
    if(isset($garprocessdetails[$gi])){
    if(count($garprocessdetails[$gi])>$arraylen){$arraylen=count($garprocessdetails[$gi]);}
}
}


for ($i=0; $i < $arraylen; $i++) { 
    $j=0;?>
    <tr>
    @foreach($carelanguage as $languagelist)
                       @if($languagelist->status==1)
                       <td><?php echo isset($garprocessdetails[$j][$i])?$garprocessdetails[$j][$i]:''; ?></td>
                      
                       @endif
                       <?php $j++; ?>
                       @endforeach
                        <td><a data-href="{{ url('/') }}" data-selecthref="{{ url(route('admin.drysymbolselect', ['id' => $languagelist->id])) }}"  href="javascript:;" class="editSymbol" data-valueid="{{ $languagelist->id }}" data-toggle="modal" data-target="#myModal5"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                  
                   @if ($languagelist->status==0)
                        
                        <span class="activatecoo"><a data-href="{{ url(route('ecommercemaintenance.cooactivenew',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
                        @else
                         <span class="deactivatecoo"><a data-href="{{ url(route('ecommercemaintenance.coodeactivenew',['id' => $languagelist->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 
                         @endif
                  
                  </td>
                        <td>
                  @if ($languagelist->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif 
                    </td>
                   </tr>
                   <?php } ?>


                    

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="4">No Garment Component(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>

                                </fieldset>
                                
                            </form>
                        </div>
                    </div>
</div>

                             <!--language-Edit-->
                           @include('care.modal_language')
                            
                            <!--CountryofOrigin-Edit-->
                           
                           @include('care.modal_countryoforigin')
                             <!--CareInsttruction-Edit-->
                           @include('care.modal_careinstructions')
                            <!--fabric composition-Edit-->
                           @include('care.modal_fabriccomposition')
                           <!--Garment Components-Edit-->
                           @include('care.modal_garmentcomponents')

@endsection 