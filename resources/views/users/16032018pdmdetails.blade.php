@extends('users.layouts.pdmsteps')


@section('content')

<style>

.dashboard-mainimg {

    width: 100%;

    height: auto;

}

.dropbtn {

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



.dropdown {

    position: relative;

    display: inline-block;

}



.dropdown-content {

    display: none;

    position: absolute;

    background-color: #0095cd;

    min-width: 160px;

    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

    z-index: 1;

	color:white;

}



.dropdown-content a {

    color: black;

    padding: 4px 16px;

    text-decoration: none;

    display: block;

	font-size: 13px;

}



.dropdown-content a:hover {background-color: #00AEEF}



.dropdown:hover .dropdown-content {

    display: block;

}



.dropdown:hover .dropbtn {

    background-color: #00AEEF;

}

.dropdown-content.drop a {

    color: #fff;

}

.dropdown-content.drop a:hover{

	background-color:#457093;

}

</style>

<div class="row border-bottom white-bg">

                    
                    <div class="col-lg-12">
                   <br />
                    <?php
                      $productgroupid=1;
                       $productgroupdetails=App\ProductGroup::where('status','=',1)->where('id','=',$productgroupid)->first();
                       
                       $productsubgroupdetails=App\ProductSubGroup::where('Product_groupID','=',$productgroupid)->first();
                       
                      ?>
                    <ol class="breadcrumb">
                     
                      <li>New Development<strong></strong></li>
                      <li>
                     Packaging
                      </li>
                    </ol>
                  </div>
               
                  <div class="col-lg-12">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>PRODUCT DETAILS</strong></h4>
                  </div>
                   <div class="col-lg-12">
                    <div class="logoutSucc">

                     @if (session('success'))
                    <div class="alert alert-success" role="success">
                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                    {{ session('success') }}
                    </div>
                    @endif

                    @if (session('failure'))
                    <div class="alert alert-danger" role="danger">
                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                    {{ session('failure') }}
                    </div>
                    @endif
                 
                    

                    </div>
                </div>  

            </div>

<div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        
                        <div class="ibox-content">
                            
                            
<div class="col-lg-12">
       <input type="button" name="productmaintenance" id="productmaintenance" value="Save" class="button" style="float: right; margin-bottom: 25px;">
                 </div>
<!-- <div class="wizard">
                 <div class="actions clearfix">
                    <ul role="menu" aria-label="Pagination">
                        <li class="disabled" aria-disabled="true"><a href="javascript:;" id="check_previous" role="menuitem">Previous</a></li>
                        <li aria-hidden="false" aria-disabled="false"><a href="javascript:;" id="check_next" role="menuitem">Next</a></li>
                        <li class="hidefinish" aria-hidden="false"><a href="javascript:;" id="check_finish" role="menuitem">Finish</a></li>
                        <li><a href="javascript:;" id="check_cancel" role="menuitem">Cancel</a>
                        </li>
                    </ul>
                </div>
             </div> -->
                          
                                 <form name="productsadd" id="productsadd" method="post" action="{{ url(route('user.add_processproductsdetails')) }}" class="form-horizontal wizard-big" enctype="multipart/form-data">
{{ csrf_field() }}
                                    <input type="hidden" name="ProductGroup" id="ProductGroup" value="{{$productgroupid}}" />
         
      <input type="hidden" name="productsubgroupurl" id="productsubgroupurl" value="<?php echo url('/');?>" />

      



          <!-- Selling price -->
          

          
                                <h1>Product Information</h1>
                                <fieldset>


                                    
                                    <div class="row">

                                        <div class="col-sm-12 b-r">
             <?php
                $i=1;
                $j=1;
                ?>
            @foreach($productfielddetails as $list)
              
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
                $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                
  // $productdetailsfields=App\ProductDetailFields::where('status','=',1)->where('columnfieldname','=',"ProductionRegions")->get();
        
        //print_r($fielddetailslist);
                ?>
                 @if($fieldname=="ProductionRegions")
               
                   <?php if($i<=3) {?>
                  <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                
                <select id="{{$fieldname}}<?php echo $i; ?>" name="{{$fieldname}}<?php echo $i; ?>" class="form-control regionselect dropdownwidth" <?php if($list->isvalid==1){ echo 'required'; } ?>>
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                <?php
                   }
                   else
                   {
                       ?>
                       <div class="form-group" style="display:none;">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                
                <select id="{{$fieldname}}<?php echo $i; ?>" name="{{$fieldname}}<?php echo $i; ?>" class="form-control regionselect dropdownwidth" <?php if($list->isvalid==1){ echo 'required'; } ?>>
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                       <?php }
                $i++;
                ?>
               
                @elseif($fieldname=="factoryName")
                 <?php if($j<=3) {?>
                <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory<?php echo $j; ?> factoryselect">
                
                <select id="uniquefactory<?php echo $j; ?>" name="uniquefactory<?php echo $j; ?>[]" class="form-control dropdownwidth" <?php if($list->isvalid==1){ echo 'required'; } ?>>
                <option value="">Please Select</option>
               
                                    
                </select>
                 
                </div>
                </div>
                 <?php
                   }
                   else
                   {
                       ?>
                   <div class="form-group" style="display:none;">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory<?php echo $j; ?> factoryselect">
                
                <select id="uniquefactory<?php echo $j; ?>" name="uniquefactory<?php echo $j; ?>[]" class="form-control dropdownwidth" <?php if($list->isvalid==1){ echo 'required'; } ?>>
                <option value="">Please Select</option>
               
                                    
                </select>
                 
                </div>
                </div>
                <?php
                   }
                $j++;
                ?>
                
                
                 @elseif($fieldname=="Season")
                 <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5 addr_field3">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth" <?php if($list->isvalid==1){ echo 'required'; } ?>>
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                
                 @elseif($fieldname=="ProductSubGroupName")
                 @if(count($productsubgroupdetails)>0)
                 <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth"<?php if($list->isvalid==1){ echo 'required'; } ?>>
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        </div>
                        <div class="col-lg-5 productsubgroupnotification"></div>
                        </div>
                        @endif
                     @elseif($fieldname=="CustomerName")
                     <div class="form-group">
                      <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth" <?php if($list->isvalid==1){ echo 'required'; } ?>>
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        </div>
                        </div>
                         @elseif($fieldname=="Warehouse_Name")
                     <div class="form-group">
                      <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <?php //echo $table;print_r($fielddetailslist); ?>
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth" <?php if($list->isvalid==1){ echo 'required'; } ?>>
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        </div>
                        </div>
                        
                @elseif($fieldname=="StatusName")
                <div class="form-group">
                <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth" <?php if($list->isvalid==1){ echo 'required'; } ?>>
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($fielddetails->id==1) selected="selected"  @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                @else
                <div class="form-group">
                <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth" <?php if($list->isvalid==1){ echo 'required'; } ?>>
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                    
                
                      @endif
                      
                      
                      
                      
                
                                      
                
                
                @else
                <div class="form-group">
                 <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 @if($list->columnfieldname=="version")
                
                         
                       
                       <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="1" class="form-control" <?php if($list->isvalid==1){ echo 'required'; } ?> readonly="readonly"/>       
                       
                 @elseif($list->columnfieldname=="sampleandquote") 
                
                <input type="radio" required name="samplequote" id="samplequote"  class="chkbox1 samplequote" value="1"/>
                
                @elseif($list->columnfieldname=="onlyquote") 
                
                 <input type="radio" required="required" name="samplequote" id="onlyquote"  class="chkbox1 samplequote" value="2"/>
                       
                 @else
                 
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" <?php if($list->isvalid==1){ echo 'required'; } ?> class="form-control" />
                 
                 @endif
                 
                 </div>
                 </div>
                 
                 @endif
                 <!--end here-->
                 
               
                 
              
            @endforeach
              
              
                
              
            </div>
                                        
                                        
                                    </div>

        

                                </fieldset>
                                <h1>Product Details</h1>
                                <fieldset>
                                    
                                    <div class="row">


           <!--Boxes-->
       

<div class="row wrapper wrapper-content animated fadeInRight" id="boxform" style="display:block;">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        <!--form name="productdetailsadd" id="productdetailsadd" method="post" action="{{ url(route('user.add_productsgroupdetails')) }}" class="form-horizontal" enctype="multipart/form-data"-->
        
            <div class="modal-body">
            <div class="col-sm-12 b-r">
            
             <div class="productdetailsblock">
              
             </div>
              
              
              
              
       
              
            </div>
            
           
            
          </div>
        
     
        
        
   
                
                   
                   
           </div>
      
      </div>

    </div>
</div>

                                        
                                        
                                    </div>
                                </fieldset>

                                <h1>Other Product Details</h1>
                                <fieldset>
                                    <div class="row wrapper wrapper-content animated fadeInRight" id="productgroups">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        
         
         <div id="imgcpy" style="display:none">
                No 
                </div>
               <!-- <input type="hidden" name="Version" id="Version" value="1" />-->
         
          <div class="col-lg-12" id="hookform">
          
                     <br />
                      
                  <h4 style="color:#00ADEF;"><strong>HOOK DETAILS</strong></h4>
                 
            <div class="modal-body">
            <div class="col-sm-12 b-r">
            <?php
                $i=1;
                $j=1;
                ?>
             @foreach($producthookfields as $list)
             
              <div class="form-group frmgroup">
               
                  <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                <?php
                $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                ?>
                 @if($fieldname=="ProductionRegions")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
         <select id="Hooks_{{$fieldname}}<?php echo $i; ?>" name="Hooks_{{$fieldname}}<?php echo $i; ?>" class="form-control regionselect dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                <?php
                 $i++;  
                ?>
                @elseif($fieldname=="factoryName")
                  
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory_hooks<?php echo $j; ?> factoryselect">
                
                         <select id="uniquefactory_hooks<?php echo $j; ?>" name="uniquefactory_hooks<?php echo $j; ?>[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
               
                                    
                </select>
                       
                </div>   
                 
                </div>
                
                       
                 <?php
                
                $j++;
                ?>
              
               
                @elseif($fieldname=="StatusName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Hook_StatusName" name="Hook_StatusName" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($fielddetails->id==1) selected="selected"  @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($fieldname=="Currency")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth" 
                        @if($usertype->id==9)disabled="disabled" @endif>
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                        <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                        
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                
                @else
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @endif
                 
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
             <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" class="form-control qty_refbtn"/>                   
                    <input type="checkbox" name="qty_chk" id="qty_chk" class="qty_checkbox" value="1"/>
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif
                   
                 
                </div>
                </div>
                
                   @elseif($list->checkbox!="" && $list->columnfieldname=="Thickness")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 Thicknessdiv">
                
                      <input type="text" name="hook_Thickness" id="hook_Thickness" class="form-control"/>                   
              
                </div>
                
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                  <?php
                  $chkval=$list->checkboxvalue;
                  $chkvalexp=explode(",",$chkval);
                  ?>
                  @foreach($chkvalexp as $chkbox)
                  <input type="radio" name="hook_measurement" id="{{$chkbox}}" value="{{$chkbox}}" @if($chkbox=='pt') checked="checked" @endif class="thicknesschkbox"/><p class="spanval"> {{$chkbox}}</p>
                  @endforeach
                  @endif
                  </div>
                  </div>
                   
                   
                   
                    @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile" name="imgInp" id="imgInp" onchange="uploadimageselect(this,'printcolorimg');"/>
                 <input type="hidden" name="selectimage" id="selectimage" class="form-control selectimage" readonly="readonly">
                  <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
               
                </div>
                 <div class="printcolorhidden">
                 
                 <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 
                 <div class="col-lg-5" id="selimage">
                     
                <img id="" src="storage/data/product/" alt="" width="80" height="80" /> <img id="printcolorimg" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="80" height="80" />
                </div>
                 
                 
                 </div>
                  @elseif($list->columnfieldname=="MoldCosting")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value=""  class="form-control"  @if($usertype->id==9) readonly="readonly" @endif/>
                 </div>
                </div>
                 
                  
                  
                  @else
                  
                  
                  
  
                     
                   <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
                </div>
               
                @endif
                
                
                
              </div>
              @endforeach
              
             
              
              
              
              
       
              
            </div>
            
             </div>
            
            <div class="col-lg-12" id="tissuepaperform">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>TISSUE PAPER DETAILS</strong></h4>
                 
            <div class="modal-body">
            <div class="col-sm-12 b-r">
             <?php
                $k=1;
                $l=1;
                ?>
             @foreach($productdevelopmentsubgroupdetails as $list)
             
              <div class="form-group frmgroup">
               
                  <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                <?php
                $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                ?>
              @if($fieldname=="ProductionRegions")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
         <select id="TissuePaper_{{$fieldname}}<?php echo $k; ?>" name="TissuePaper_{{$fieldname}}<?php echo $k; ?>" class="form-control dropdownwidth regionselect">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                <?php
                 $k++;  
                ?>
                @elseif($fieldname=="factoryName")
                  
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory_tissuepaper<?php echo $l; ?> factoryselect">
                
                         <select id="uniquefactory_tissuepaper<?php echo $l; ?>" name="uniquefactory_tissuepaper<?php echo $l; ?>[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
               
                                    
                </select>
                       
                </div>   
                 
                </div>
                
                       
                 <?php
                
                $l++;
                ?>
                 @elseif($fieldname=="StatusName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Tissuepaper_StatusName" name="Tissuepaper_StatusName" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($fielddetails->id==1) selected="selected"  @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->columnfieldname=="RawMaterial")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Tissuepaper_RawMaterial" name="Tissuepaper_RawMaterial" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->columnfieldname=="PrintType")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Tissuepaper_PrintType" name="Tissuepaper_PrintType" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->columnfieldname=="CuttingName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Tissuepaper_Cutting" name="Tissuepaper_Cutting" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->columnfieldname=="PrintingFinishingProcessName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        @foreach ($fielddetailslist as $fielddetails)
                         <div class="col-lg-12">
              <input type="checkbox" name="Tissuepaper_PrintingFinishingProcess[]" id="Tissuepaper_PrintingFinishingProcess" value="{{$fielddetails->id}}" class="thicknesschkbox printing"/><p class="spanval label_font"> {{$fielddetails->$fieldname}}</p>
              </div>
                         @endforeach
                       
                </div>   
                 
                </div>
                  @else
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @endif
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
             <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Tissuepaper_QualityReference" id="Tissuepaper_QualityReference" class="form-control qty_refbtn"/>                   
                    <input type="checkbox" name="tissueqty_chk" id="tissueqty_chk" class="qty_checkbox" value="1"/>
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif
                   
                 
                </div>
                </div>
                
                   @elseif($list->checkbox!="" && $list->columnfieldname=="Thickness")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 Thicknessdiv">
                
                      <input type="text" name="Tissuepaper_Thickness" id="Tissuepaper_Thickness" class="form-control"/>                   
              
                </div>
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                  <?php
                  $chkval=$list->checkboxvalue;
                  $chkvalexp=explode(",",$chkval);
                  ?>
                  @foreach($chkvalexp as $chkbox)
                  <input type="radio" name="tissue_measurement" id="{{$chkbox}}" value="{{$chkbox}}" @if($chkbox=='pt') checked="checked" @endif class="thicknesschkbox"/><p class="spanval"> {{$chkbox}}</p>
                  @endforeach
                  @endif
                  </div>
                  </div>
                    @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <input type="radio" name="tissueprintcolor" id="tissuecmykyes"  class="tissuechkbox cmyk" value="1"/>
                 <span class="1cmykyes 1cmykcheckbox">Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5">
                 <input type="radio" name="tissueprintcolor" id="tissuecmykno" class="tissuechkbox cmyk" value="0" checked="checked"  onclick="printcolor();" />
                 <span class="1cmykno 1cmykcheckbox">No</span>
                </div>
                </div>
                 @elseif($list->columnfieldname=="tissuepaper_print_color1")
              <div class="printcolorhidden" style="display:block;" id="tissueprintcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="tissuepaper_print_color2")
              <div class="printcolorhidden" style="display:block;" id="tissueprintcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="tissuepaper_print_color3")
              <div class="printcolorhidden" style="display:block;" id="tissueprintcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
               @elseif($list->columnfieldname=="tissuepaper_print_color4")
              <div class="printcolorhidden" style="display:block;" id="tissueprintcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
             @elseif($list->columnfieldname=="tissuepaper_print_color5")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="tissueprintcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
            @elseif($list->columnfieldname=="tissuepaper_print_color6")
              <div  class="printcolorhidden" style="display:none;overflow:hidden;" id="tissueprintcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="tissuepaper_print_color7")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="tissueprintcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
               @elseif($list->columnfieldname=="tissuepaper_print_color8")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="tissueprintcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
                    @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile1" name="imgInp1" id="imgInp1" onchange="uploadimageselect(this,'tissuecolorimg');"/>
                 <input type="hidden" name="selectimage1" id="selectimage1" class="form-control selectimage1" readonly="readonly">
                  <input type="hidden" name="selectimageid1" id="selectimageid1" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
               
                </div>
                
                  <div class="printcolorhidden">
                   <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                   
                   <div class="col-lg-5" id="selimage1">
                     
                <img id="" src="storage/data/product/" alt="" width="80" height="80" /> <img id="tissuecolorimg" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="80" height="80" />
                </div>
                  
                  </div>
                
                 
                  @else
                   <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
                </div>
                @endif
                
                
                
              </div>
              @endforeach
              
             
              
              
              
              
       
              
            </div>
            
             </div>
             
             
              <div class="col-lg-12" id="Packagingstickersform">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>PACKAGING STICKERS DETAILS</strong></h4>
             <div class="modal-body">
            <div class="col-sm-12 b-r">
             <?php
                $m=1;
                $n=1;
                ?>
             @foreach($prddevsubgrouppackagingdetails as $list)
             
              <div class="form-group frmgroup">
               
                  <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                <?php
        $table=$list->tablename;
        $fielddetailslist = DB::table($table)->get();
        $fieldname=$list->columnfieldname;
        $listoffieldname=$list->fieldname;
        ?>
               @if($fieldname=="ProductionRegions")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
         <select id="PackagingStickers_{{$fieldname}}<?php echo $m; ?>" name="PackagingStickers_{{$fieldname}}<?php echo $m; ?>" class="form-control dropdownwidth regionselect">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                <?php
                 $m++;  
                ?>
                @elseif($fieldname=="factoryName")
                  
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory_packagingstickers<?php echo $n; ?> factoryselect">
                
                         <select id="uniquefactory_packagingstickers<?php echo $n; ?>" name="uniquefactory_packagingstickers<?php echo $n; ?>[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
               
                                    
                </select>
                       
                </div>   
                 
                </div>
                
                       
                 <?php
                
                $n++;
                ?>
                 @elseif($fieldname=="StatusName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Package_StatusName" name="Package_StatusName" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($fielddetails->id==1) selected="selected"  @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       


                </div>   
                 
                </div>
                @elseif($list->columnfieldname=="RawMaterial")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Package_RawMaterial" name="Package_RawMaterial" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->columnfieldname=="PrintType")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Package_PrintType" name="Package_PrintType" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->columnfieldname=="CuttingName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Package_Cutting" name="Package_Cutting" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->columnfieldname=="PrintingFinishingProcessName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        @foreach ($fielddetailslist as $fielddetails)
                         <div class="col-lg-12">
              <input type="checkbox" name="Package_PrintingFinishingProcess[]" id="Package_PrintingFinishingProcess" value="{{$fielddetails->id}}" class="thicknesschkbox printing"/><p class="spanval label_font"> {{$fielddetails->$fieldname}}</p>
              </div>
                         @endforeach
                       
                </div>   
                 
                </div>
                  @else
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @endif

                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
             <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Package_QualityReference" id="Package_QualityReference" class="form-control qty_refbtn"/>                   
                  <input type="checkbox" name="packageqty_chk" id="packageqty_chk" class="qty_checkbox" value="1"/>
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif
                   
                 
                </div>
                </div>
                
                   @elseif($list->checkbox!="" && $list->columnfieldname=="Thickness")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 Thicknessdiv">
                
                      <input type="text" name="PackageThickness" id="PackageThickness" class="form-control"/>                   
              
                </div>
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                  <?php
          $chkval=$list->checkboxvalue;
          $chkvalexp=explode(",",$chkval);
          ?>
                  @foreach($chkvalexp as $chkbox)
                  <input type="radio" name="package_measurement" id="{{$chkbox}}" value="{{$chkbox}}" @if($chkbox=='pt') checked="checked" @endif class="thicknesschkbox"/><p class="spanval"> {{$chkbox}}</p>
                  @endforeach
                  @endif
                  </div>
                  </div>

                   @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <input type="radio" name="packageprintcolor" id="packagecmykyes"  class="packagechkbox cmyk" value="1"  onclick="printcolor();"/>
                 <span class="1cmykyes 1cmykcheckbox">Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5">

                 <input type="radio" name="packageprintcolor" id="packagecmykno" class="packagechkbox cmyk" value="0" checked="checked"  onclick="printcolor();" />
                 <span class="1cmykno 1cmykcheckbox">No</span>
                </div>
                </div>
                 @elseif($list->columnfieldname=="packageprint_color1")
              <div class="printcolorhidden" style="display:block;" id="packageprintcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="packageprint_color2")
              <div class="printcolorhidden" style="display:block;" id="packageprintcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="packageprint_color3")
              <div class="printcolorhidden" style="display:block;" id="packageprintcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="packageprint_color4")
              <div class="printcolorhidden" style="display:block;" id="packageprintcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
           @elseif($list->columnfieldname=="packageprint_color5")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="packageprintcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
           @elseif($list->columnfieldname=="packageprint_color6")
              <div  class="printcolorhidden" style="display:none;overflow:hidden;" id="packageprintcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
             @elseif($list->columnfieldname=="packageprint_color7")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="packageprintcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
             @elseif($list->columnfieldname=="packageprint_color8")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="packageprintcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div> 

                  
                    @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile2" name="imgInp2" id="imgInp2" onchange="uploadimageselect(this,'packagecolorimg');"/>
                 <input type="hidden" name="selectimage2" id="selectimage2" class="form-control selectimage2" readonly="readonly">
                  <input type="hidden" name="selectimageid2" id="selectimageid2" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
               
                </div>
                
                  <div class="printcolorhidden">
                   <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                  <div class="col-lg-5" id="selimage2">
                     
                 <img id="packagecolorimg" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="80" height="80" />
                </div>
                  
                  </div>
                
                 
                  @else
                   <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
                </div>
                @endif
                
                
                
              </div>
              @endforeach
            

             
             
              
              
              
              
       
              
            </div>
               </div>
                
              
            </div>
            
            </div>
            </div>
            </div>
                                </fieldset>

                                <h1>Inventory Information</h1>
                                <fieldset>
                                    <div class="modal-body" id="inventorycontentblock">
            <div class="col-sm-12 b-r">
            <?php
                $i=1;
                $j=1;
                ?>
            @foreach($inven_productfielddetails as $list)
            
           
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
                 
                $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                ?>
                @if($fieldname=="ProductionRegions")
                
                 <div class="form-group printcolorhidden inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="inventory{{$fieldname}}<?php echo $i; ?>" id="{{$fieldname}}<?php echo $i; ?>" class="form-control regionselect">
                                <option value="">Please Select</option>
                               @foreach ($fielddetailslist as $fielddetails)  
                               <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                               @endforeach
                                
                                </select>
                     </div>
                     </div>
                   
                <?php
                 $i++;  
                ?>
                 @elseif($fieldname=="factoryName")
                  
                    <div class="form-group printcolorhidden inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  uniquefactory<?php echo $j; ?> factoryselect">
                       <select id="uniquefactory<?php echo $j;?>" name="inventoryuniquefactory<?php echo $j;?>" class="form-control dropdownwidth">
                              
                                
                                </select>
                     </div>
                     </div>
                
                       
                 <?php
                
                $j++;
                ?>
                @endif
                
                      
                
                
                @else
                
                    @if($list->columnfieldname=="Inventory")
                   
                     <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="Inventory" id="Inventory" class="form-control">
                                <option value="">Please Select</option>
                                @foreach($inventorydetails as $inventorylist)
                               <option value="{{$inventorylist->id}}">{{$inventorylist->InventoryName}}</option>
                                @endforeach
                                </select>
                     </div>
                     </div>
                    
                    @else
                     <div class="form-group inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5 inventorycontent" style="display:none">
                     <input type="text" name="inventory{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                     </div>
                     </div>
                     @endif
                 
                 @endif
                 <!--end here-->
                
                 
                 
                 
              
            @endforeach
              
              
                
              
            </div>
            
            
            
          </div>
                                </fieldset>
                                <h1>Quote Costing</h1>
                                <fieldset>
                                    <div class="modal-body">
            <div class="col-sm-12 b-r">
            @foreach($invendetails_productfielddetails as $list)
             
                
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
                $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                ?>
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach     
                </select>
                 
                </div>
             </div>   
                 @else
                  @if($list->columnfieldname=="quantity")
                 <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
               
                 <div class="col-lg-2">
                 <label class="col-lg-1 control-label font-noraml text-left label_font"><b>Quantity</b></label>
                 
                  @foreach($quantitydetails as $list)
                                                
                 <div class="col-sm-12 quantitychkdiv inventorypricechk">      
              {{$list->Quantity}}<input type="checkbox" name="quantitychk1[]"  class="costotherprice quantitychk @if($usertype->id==9) notallowed @endif" id="quantitychk" value="{{$list->Quantity}}" />
                </div>
                
                
             @endforeach
                 </div>
                
                 
                 <div class="col-lg-5">
                 <label class="col-lg-1 control-label font-noraml text-left label_font"><b>&nbsp;&nbsp;Cost</b></label>
                   <div class="col-sm-12 quantitychksec">
                                            @foreach($quantitydetails as $list)      
                               <div class="col-sm-12 quantitychkdiv">
              <input type="text" name="quantitychk1[]"  class="quantitychk1 inventoryprice" id="quantitychk" @if($usertype->id==9) readonly="readonly" @endif />  
              </div>
              @endforeach
              <div class="col-sm-12">
              
              <input type="text" name="otherqty" id="otherqty" class="otherqtyclass" placeholder="Quantity" style="display:none"/>
              
              <input type="text" name="othercost" id="othercost" class="otherqtycost" placeholder="Cost" style="display:none"/>
              </div>
              
              
                                                </div>
                 </div>
             </div>
                   
              @elseif($list->columnfieldname=="MinQuantity")
              
               <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" @if($usertype->id==9) readonly="readonly" @endif/><span><b>&nbsp;Units</b></span>
                     </div>
                   </div>  
                   @elseif($list->columnfieldname=="packsize")
              
               <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" /><span><b>&nbsp;Units</b></span>
                     </div>
                   </div>  
                    @elseif($list->columnfieldname=="exworks")
                      <h4 style="color:#00ADEF;"><strong>COSTING REQUIREMENTS</strong></h4>
                     <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                
                 <div class="col-lg-5 divwidthforexworks" >
                <input type="checkbox" class="quantitychk" name="exworks" id="exworks" value="1" />
                
                    </div>
                     <label class="col-lg-2 control-label font-noraml text-left label_font">Fright Cost</label>
                     <div class="col-lg-5 divwidthforexworks">
                <input type="text"  name="frightcost" id="frightcost"  class="frightcost" @if($usertype->id==9) readonly="readonly" @endif" />
              
                
                    </div>
                     <label class="col-lg-2 control-label font-noraml text-left label_font">Currency</label>
                    <div class="col-lg-5 divwidthforexworks">
                    <select style="margin-top: 13%;" disabled="disabled">
                    <option></option>
                    </select>
              
                
                    </div>
                   
                   
                    </div>
                     @elseif($list->columnfieldname=="fob")
                     <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 divwidthforexworks">
                <input type="checkbox" class="quantitychk3" name="fob" id="fob" value="2" />
                    </div>
                    <label class="col-lg-2 control-label font-noraml text-left label_font">Fright Cost</label>
                     <div class="col-lg-5 divwidthforexworks">
                <input type="text"  name="frightcost" id="frightcost"  @if($usertype->id==9) readonly="readonly" @endif class="frightcost" />
              
                
                    </div>
                     <label class="col-lg-2 control-label font-noraml text-left label_font">Currency</label>
                    <div class="col-lg-5 divwidthforexworks">
                    <select style="margin-top: 13%;" disabled="disabled">
                    <option></option>
                    </select>
              
                
                    </div>
                    
                   
                   
                    </div>
                    @elseif($list->columnfieldname=="Minordervalue" || $list->columnfieldname=="samplecost")
                    <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                        <div class="input-group m-b"><span class="input-group-addon currencytype">$</span>
<input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"   class="form-control"  @if($usertype->id==9) readonly="readonly" @endif/>
                        </div>
                     
                     </div>
                   </div>
                      @else
                       
                       
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                     </div>
                   </div>  
                  
                     
                     @endif
                 
                 @endif
                 <!--end here-->
                 
                 
                 
                 
                 
             <!-- </div>-->
            @endforeach
              
              
                
              
            </div>
            
            
            
          </div>
                                </fieldset>
                                <h1>Selling Price</h1>
                                <fieldset>
                                    <div class="col-sm-12 b-r">
              Margin :<span class="required">*</span><input type="text" class="quantitychk1 margin123" name="input0" id="input0"  onkeyup="margin(this)" value="35">%
            @foreach($invendetails_productfielddetails as $list)
             
                
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
                $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                ?>
               
               @if($list->columnfieldname=="PricingMethod")
                <!-- <div class="form-group">
                <label class="col-lg-12 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                
                 
                </div>
             </div> -->
            @endif
                 @else
                  @if($list->columnfieldname=="quantity")
                 <div class="form-group calculate">
               
               
                 <div class="col-lg-3 quantitychkblock">
                 <label class="col-lg-12 control-label font-noraml text-left label_font"><b>Quantity</b></label>
                 
                  @foreach($quantitydetails as $list)
                                                
                 <div class="col-sm-12 quantitychkdiv sellingquantitychkdiv" data-qtytype="<?php echo $list->Quantity; ?>"> 
              
                
              {{$list->Quantity}}<input type="checkbox" name="quantitychk[]"  class="quantitychk @if($usertype->id==9) notallowed @endif" id="quantitychk" value="{{$list->Quantity}}"  />
              
                 
              
                </div>
             @endforeach
                 </div>
                 
                 
                 <div class="col-lg-3">
                 <label class="col-lg-12 control-label font-noraml text-left label_font"><b>&nbsp;&nbsp;Cost</b></label>
                   <div class="col-sm-12 quantitychksec">
                   <?php   $cost_i=0; ?>
                                            @foreach($quantitydetails as $list) 


                               <div class="col-sm-12 quantitychkdiv costblock">
                    
                      <div class="input-group"><span class="input-group-addon currencytype">$</span> <input type="text" class="multiple quantitychk1 cost" value="" name="input1[]" id="input1" @if($usertype->id==9) readonly="readonly" @endif /></div> 
                  
               
                   

               
                                </div>
                           
                           <?php $cost_i+=1;  ?>
                          @endforeach
                                                </div>
                 </div>
                 <div class="col-lg-3">
                 <label class="col-lg-12 control-label font-noraml text-left label_font"><b>&nbsp;&nbsp;Selling Price</b></label>
                   <div class="col-sm-12 quantitychksec">
                                            @foreach($quantitydetails as $list)      
                               <div class="col-sm-12 quantitychkdiv suggestedpriceblock">
                      

                      <div class="input-group"><span class="input-group-addon currencytype">$</span><input type="text" name="input2[]" id="input2" 1onkeyup="calc(this)" class="suggestedprice" value="" @if($usertype->id!=9) readonly="readonly" @endif></div>
                               </div>
                           
                                             @endforeach
                                                </div>
                 </div>
                 <div class="col-lg-3">
                 <label class="col-lg-12 control-label font-noraml text-left label_font"><b>&nbsp;&nbsp;Margin %</b></label>
                   <div class="col-sm-12 quantitychksec">
                                            @foreach($quantitydetails as $list)      
                               <div class="col-sm-12 quantitychkdiv marginpriceblock">
                      <!-- <input type="text" name="margin[]"  class="margin" id="quantitychk"/> --> 
                      <input type="text" name="output" id="output" class="margin" value="">
               
                           </div>
                           
              @endforeach
                                                </div>
                 </div>
                 
             </div>
                   
             
                 
                   
                    
                     
                  
                     
                     @endif
                 
                 @endif
                 <!--end here-->
                 
                 
                 
                 
                 
             <!-- </div>-->
            @endforeach
              
              
                
              
            </div>
                                </fieldset>
                                <h1>Sample Details</h1>
                                <fieldset>
                                    <div class="modal-body">
            <div class="col-sm-12 b-r">
            @foreach($cost_productfielddetails as $list)
             
                
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
                $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                ?>
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach     
                </select>
                 
                </div>
             </div>   
               
                   
                 @elseif($list->uploadimage!="")
                  <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile" name="imgInpsample" id="imgInpsample" onchange="uploadimageselect(this,'samplecolorimg');"/>
                 <input type="hidden" name="selectimage" id="selectimage" class="form-control selectimage" readonly="readonly">
                  <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" readonly="readonly">
                  </div>
                  </div>
                   <div class="form-group">
                       <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                        <div class="col-lg-5" id="selimage">
                 <img id="samplecolorimg" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="80" height="80" />
                </div> 
               </div>
                @else
                   @if($list->fieldname=="Sample Requested Date")
              <div class="form-group" id="data_1">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                <div class="col-lg-5">
                  <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" placeholder="MM/DD/YYYY" class="search_upload" onclick="dateval();">
                 <!-- <i class="fa fa-calendar fa-color input-group date"  aria-hidden="true" ></i>--> 
               </div>
             </div>
             @elseif($list->fieldname=="Quote Required")
             
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5" style="width:31%;">
                <input type="radio"  name="quoterequired" id="yes"  class="radiobtn quoterequiredchk" value="1" />
                <span class="quoterequiredyes">Yes</span>
               
                <br />
                  <input type="radio"  name="quoterequired" id="yes"  class="radiobtn quoterequiredchk" value="0" />
                <span class="quoterequiredno">No</span>
                 </div>
                 
                 <div class="col-lg-5 quotediv" style="display:none">
                 <select id="quote" name="quote" class="form-group" style="width:45%;">
                <option value="">Please select</option>
                <option value="1"> Quantity(MOQ)</option>
                <option value="2"> Costing</option>
                </select>
                 </div>
                 
                
             </div>
              @elseif($list->fieldname=="Sample Lead Time")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" <?php if($usertype->id==9){ echo 'readonly="readonly";';} ?>  class="form-control"
                 style="width:20%;" />&nbsp;<span>Days</span>
                 </div>
                 
                
             </div>
              @elseif($list->fieldname=="Production Lead Time")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <input type="text" <?php if($usertype->id==9){ echo 'readonly="readonly";';} ?> name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control"
                 style="width:20%;" />&nbsp;<span>Days</span>
                 </div>
             </div>
              @elseif($list->fieldname=="Remarks / Special Instructions")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <textarea name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"></textarea>
                 </div>
             </div>
             
                       @else
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                     </div>
                   </div>  
                      @endif
                     
                 
                 @endif
                 <!--end here-->
                 
                 
                 
                 
                 
             <!-- </div>-->
            @endforeach
              
              
                
              
            </div>
            
            
            
          </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
           




         

@endsection



