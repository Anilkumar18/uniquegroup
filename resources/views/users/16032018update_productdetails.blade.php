@extends('users.layouts.updateproductgroups')
<?php
error_reporting(0);
?>
@section('content')

<div class="row border-bottom white-bg notificationdiv">

                    <div class="col-lg-12">
                        <img class="dashboard-mainimg"  src="{{ asset("/img/test2.png")}} " />
                        
                    </div>
                    <div class="col-lg-12">
                   <br />
                    <ol class="breadcrumb">
                     
                      <li>New Development<strong></strong></li>
                      <li>Product details</li>
                      <li>
                      @foreach($productgroupdetails as $productgroup)
                     {{$productgroup->ProductGroup}}
                     @endforeach
                      </li>
                       <li>
                        @foreach($productsubgroupdetails as $productsubgroup)
                     {{$productsubgroup->ProductSubGroupName}}
                     @endforeach
                      
                      </li>
                    </ol>
                  </div>
               
                  <div class="col-lg-12">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>PRODUCT DETAILS</strong></h2>
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
          
           <!--Boxes-->
       

<div class="row wrapper wrapper-content animated fadeInRight" id="boxform" style="display:block;">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        <!--form name="productdetailsadd" id="productdetailsadd" method="post" action="{{ url(route('user.add_productsgroupdetails')) }}" class="form-horizontal" enctype="multipart/form-data"-->
         <form name="productdetailsadd" id="productdetailsadd" method="post"  class="form-horizontal" enctype="multipart/form-data">
         {{ csrf_field() }}
         
          <input type="hidden" name="editID" id="editID" value="{{$boxesdetails->id}}"  />
          
           <input type="hidden" name="region_url" id="region_url" value="<?php echo url('/');?>" />
           
            <div class="modal-body">
            <div class="col-sm-12 b-r">
             <?php
				$i=1;
				$j=1;
				?>
             @foreach($productdevelopmentfields as $list)
             
              <div class="form-group frmgroup">
               
                  <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                <?php
				$table=$list->tablename;
				$fielddetailslist = DB::table($table)->get();
				$fieldname=$list->columnfieldname;
				$listoffieldname=$list->fieldname;
				?>
                
                @if($list->columnfieldname=="RawMaterial")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($boxesdetails->RawMaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                  @elseif($list->columnfieldname=="PrintType")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($boxesdetails->PrintTypeID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                  @elseif($list->columnfieldname=="CuttingName")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($boxesdetails->CuttingID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                   @elseif($list->columnfieldname=="PrintingFinishingProcessName")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                       <?php
						$boxesselecteddetails=$boxesdetails->PrintingFinishingProcessID;
						$chkvalboxexp=explode(",",$boxesselecteddetails);
						?>
                           @foreach ($fielddetailslist as $fielddetails)
                          <div class="col-lg-12">
              <input type="checkbox" name="{{ $fielddetails->$fieldname }}" id="{{$fielddetails->id}}" value="{{$fielddetails->id}}" class="thicknesschkbox printing"
             @foreach($chkvalboxexp as $chkvalbox)
             @if($chkvalbox==$fielddetails->id)
             checked="checked"
              @endif
             @endforeach
              
               /><p class="spanval label_font"> {{$fielddetails->$fieldname}}</p>
               
               </div>
                         @endforeach
               
              
                        
                       
                </div>   
                 
                </div>
                    @elseif($list->columnfieldname=="PricingMethod")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($boxesdetails->PrincingMethodID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->columnfieldname=="UnitofMeasurement")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($boxesdetails->UnitofMeasurementID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                  @elseif($list->columnfieldname=="Currency")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($boxesdetails->CurrencyID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
             
                @elseif($listoffieldname=="Production Region 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}1" name="{{$fieldname}}1" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($boxesdetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 <input type="hidden" id="SelUniquefactory1" name="SelUniquefactory1" value="{{$boxesdetails->UniqueFactory1}}" />
                 @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory1">
                
                   <select id="uniquefactory1" name="uniquefactory1" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}2" name="{{$fieldname}}2" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($boxesdetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 <input type="hidden" id="SelUniquefactory2" name="SelUniquefactory2" value="{{$boxesdetails->UniqueFactory2}}" />
                 @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory2">
                
                 <select id="uniquefactory2" name="uniquefactory2" class="form-control dropdownwidth">
                <option value="">Please Select</option>  
                </select>
                       
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}3" name="{{$fieldname}}3" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($boxesdetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 <input type="hidden" id="SelUniquefactory3" name="SelUniquefactory3" value="{{$boxesdetails->UniqueFactory3}}" />
                 @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory3">
                
                 <select id="uniquefactory3" name="uniquefactory3" class="form-control dropdownwidth">
                <option value="">Please Select</option>  
                </select>
                       
                </div>   
                 
                </div>
                
                @endif
               
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="qty_ref" id="qty_ref" value="{{$boxesdetails->QualityReference}}" class="form-control qty_refbtn"/>                   
                	<input type="checkbox" name="qty_chk" id="qty_chk" class="qty_checkbox" value="1" @if($boxesdetails->QualityReferencem==1) checked="checked" @endif/>
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif
                   
                 
                </div>
                </div>
                
                 @elseif($list->checkbox!="" && $list->columnfieldname=="Thickness")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 Thicknessdiv">
                
                 <input type="text" name="Thickness" id="Thickness" value="{{$boxesdetails->Thickness}}" class="form-control"/>                   
              
                </div>
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                  <?php
				  $chkval=$list->checkboxvalue;
				  $chkvalexp=explode(",",$chkval);
				  ?>
                 
    <input type="radio" name="boxes_thickness" id="pt" value="pt" @if($boxesdetails->measurement1=="pt")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">pt</p>
   <input  type="radio" name="boxes_thickness" id="gms" value="gms" @if($boxesdetails->measurement2=="gms")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">gms</p>
    <input  type="radio" name="boxes_thickness" id="mm" value="mm" @if($boxesdetails->measurement3=="mm")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">mm</p>
                 
                  @endif
                  </div>
                  </div>
                 @elseif($list->columnfieldname=="Width")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Width" id="Width" value="{{$boxesdetails->Width}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="Height")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Height" id="Height" value="{{$boxesdetails->Height}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="Length")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Length" id="Length" value="{{$boxesdetails->Length}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <input @if($boxesdetails->CMYK==1) checked="checked" @endif type="radio" name="printcolor" id="cmykyes"  class="boxchkbox cmyk" value="1" @if($boxesdetails->CMYK==1) checked="checked" @endif/>
                 <span class="cmykyes cmykcheckbox">Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5">
                 <input @if($boxesdetails->CMYK==0) checked="checked" @endif type="radio" name="printcolor" id="cmykno" class="boxchkbox cmyk" value="0" />
                 <span class="cmykno cmykcheckbox">No</span>
                </div>
                </div>
                 @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                 <input type="file" class="fbfile3" name="imgInp3" id="imgInp3" value="{{$boxesdetails->Artwork}}" onchange="imageselect3();"/>
                 <input type="hidden" name="selectimage3" id="selectimage3" class="form-control selectimage" value="{{$hookdetails->Artwork}}" readonly="readonly">
                  <input type="hidden" name="selectimageid3" id="selectimageid3" class="form-control" value="{{$boxesdetails->id}}" readonly="readonly">
                  </div>
                   
                   
               </div>
             
                
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 
                  <div class="col-lg-5" id="selimage3">
                  
                  <input type="hidden" id="existingboximage" name="existingboximage" value="{{$boxesdetails->Artwork}}" />
                  
                     
                <img id="blah3" src="storage/data/product/" alt="" width="80" height="80" /> 
               
              
           <!--  <img id="blah3" src="http://localhost/laravel/uniquegroup/storage/app/{{$boxesdetails->Artwork}}" alt="your image" width="80" height="80" />-->
           <img id="blah3" src="{{ route('user.productpic', ['id' => $boxesdetails->id]) }}" alt="your image" width="80" height="80" />
                 
                 
               
                </div> 
                   
               </div>
             
             @elseif($list->columnfieldname=="print_color1")
              <div class="printcolorhidden" style="display:block;" id="printcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$boxesdetails->PrintColor1}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color2")
              <div class="printcolorhidden" style="display:block;" id="printcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                     value="{{$boxesdetails->PrintColor2}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color3")
              <div class="printcolorhidden" style="display:block;" id="printcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                      value="{{$boxesdetails->PrintColor3}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color4")
              <div class="printcolorhidden" style="display:block;" id="printcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$boxesdetails->PrintColor4}}"  class="form-control" />
                 </div>
             </div>
            @elseif($list->columnfieldname=="print_color5")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                     value="{{$boxesdetails->PrintColor5}}" class="form-control" />
                 </div>
             </div>
           @elseif($list->columnfieldname=="print_color6")
              <div  class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                     value="{{$boxesdetails->PrintColor6}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color7")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"
                     value="{{$boxesdetails->PrintColor7}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color8")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"
                     value="{{$boxesdetails->PrintColor8}}"   class="form-control" />
                 </div>
             </div>
            
                 @elseif($list->checkbox!="" && $list->columnfieldname=="Hook")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}" value="{{$list->fieldname}}" @if($boxesdetails->HookID!="0") checked="checked" @endif class="chkselectionproducts" />
                </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="TissuePaper")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}"  value="{{$list->fieldname}}"@if($boxesdetails->TissuePaperID!="0") checked="checked" @endif  class="chkselectionproducts"/>
                </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="PackagingStickers")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}" value="{{$list->fieldname}}" @if($boxesdetails->PackagingStickersID!="0") checked="checked" @endif class="chkselectionproducts" />
                </div>
                 
                @else
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
                
                @endif
                
                
              </div>
              @endforeach
              
             
              
              
              
              
       
              
            </div>
            
           
            
          </div>
        
     
        
        
    <div class="form-group">
                
                 <div class="col-lg-12 submitbtndiv">
             <!-- <a data-href="{{ url('/') }}" data-selecthref="" value="1"  title="test"
                  data-id="1" class="button"/>Next</a>-->
                  <input type="hidden" name="addboxurl" id="addboxurl" value="{{ url(route('user.add_productsgroupdetails')) }}" />
                  <input type="button" name="submit" id="addboxesdetails"  value="Next" class="button" style="width: 12%;"/>
                  
                  
                 <!-- <input type="submit" id="submit" value="Next"  class="button" style="width: 12%;"/>-->
                </div>
                 <div class="col-lg-8">
                 
                 </div>
                </div>
                
                   </form>
                   
           </div>
      
      </div>

    </div>
</div>






 <!--paper bags End-->
 
 <!--Hook-->

<div class="row wrapper wrapper-content animated fadeInRight" id="productgroups" style="display:none;">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        <form name="hooksadd" id="hooksadd" method="post" action="{{ url(route('user.addproductgroups')) }}" class="form-horizontal" enctype="multipart/form-data">
         {{ csrf_field() }}
         
         <div id="imgcpy" style="display:none"></div>
         
         <div id="hiddenimgurlcpy" style="display:none"></div>
                
               
         
          <input type="hidden" name="editID" id="editID" value="{{$hookdetails->id}}"  />
          <div class="col-lg-12" id="hookform" style="display:none">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>HOOK DETAILS</strong></h4>
                 
            <div class="modal-body">
            <div class="col-sm-12 b-r">
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
                 @if($fieldname=="HooksMaterial")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($hookdetails->HooksMaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($fieldname=="StatusName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Hook_StatusName" name="Hook_StatusName" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($hookdetails->Productstatus==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                  @elseif($fieldname=="Currency")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth" disabled="disabled">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($hookdetails->MoldCostingCurrency==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
               
                @elseif($listoffieldname=="Production Region 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Hooks_{{$fieldname}}1" name="Hooks_{{$fieldname}}1" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($hookdetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                
       <input type="hidden" id="SelHooksUniquefactory1" name="SelHooksUniquefactory1" value="{{$hookdetails->UniqueFactory1}}" />
        @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_hooks1">
                
                   <select id="uniquefactory_hooks1" name="uniquefactory_hooks1" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Hooks_{{$fieldname}}2" name="Hooks_{{$fieldname}}2" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($hookdetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{$fielddetails->$fieldname}}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 <input type="hidden" id="SelHooksUniquefactory2" name="SelHooksUniquefactory2" value="{{$hookdetails->UniqueFactory2}}" />
        @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_hooks2">
                
                   <select id="uniquefactory_hooks2" name="uniquefactory_hooks2" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Hooks_{{$fieldname}}3" name="Hooks_{{$fieldname}}3" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($hookdetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{$fielddetails->$fieldname}}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 <input type="hidden" id="SelHooksUniquefactory3" name="SelHooksUniquefactory3" value="{{$hookdetails->UniqueFactory3}}" />
                 @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_hooks3">
                
                   <select id="uniquefactory_hooks3" name="uniquefactory_hooks3" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   
                 
                </div>
       
                 @endif
                 
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
             <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->QualityReference}}" class="form-control qty_refbtn"/>                   
                	<input type="checkbox" name="qty_chk" id="qty_chk" class="qty_checkbox" value="1" @if($hookdetails->QualityReferencem==1) checked="checked" @endif/>
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif
                   
                 
                </div>
                </div>
                
                   @elseif($list->checkbox!="" && $list->columnfieldname=="Thickness")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 Thicknessdiv">
                
                      <input type="text" name="Thickness" id="Thickness"  value="{{$hookdetails->Thickness}}" class="form-control"/>                   
              
                </div>
                
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                  <?php
				  $chkval=$list->checkboxvalue;
				  $chkvalexp=explode(",",$chkval);
				  ?>
                  <input type="radio" name="hook_thickness" id="pt" value="pt" @if($hookdetails->measurement1=="pt")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">pt</p>
   <input type="radio" name="hook_thickness" id="gms" value="gms" @if($hookdetails->measurement2=="gms")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">gms</p>
    <input type="radio" name="hook_thickness" id="mm" value="mm" @if($hookdetails->measurement3=="mm")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">mm</p>
                  @endif
                  </div>
                  </div>
                   
                   
                   
                    @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                 <input type="file" class="fbfile" name="imgInp" id="imgInp" value="{{$hookdetails->Artwork}}"  onchange="imageselect();"/>
                 <input type="hidden" name="selectimage" id="selectimage" class="form-control selectimage" value="{{$hookdetails->Artwork}}"   readonly="readonly">
                  <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" value="{{$hookdetails->Artwork}}"  readonly="readonly">
                  </div>
                   
                   
               </div>
                </div>
                
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 
                  <div class="col-lg-5" id="selimage">
                 
                     
                 <img id="blah" src="storage/data/product/" alt="" width="80" height="80" /> 
                 
                <input type="hidden" id="existingimage" name="existingimage" value="{{$hookdetails->Artwork}}" />
               
                
                <!-- <img id="blah" src="http://localhost/laravel/uniquegroup/storage/app/{{$hookdetails->Artwork}}" alt="your image" width="80" height="80" />-->
                
            <img id="blah" src="{{ route('user.producthookpic', ['id' => $hookdetails->id]) }}" alt="your image" width="80" height="80" />
                
                  
                   
                  
                 
                 
                </div> 
                   
               </div>
               
                 
                 
                 
                 
                 
                 
                
                 
                   @elseif($list->columnfieldname=="Color")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->Color}}"  class="form-control" />
                 </div>
                </div>
                 @elseif($list->columnfieldname=="Hook_Width")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->	Width}}"  class="form-control" />
                 </div>
                </div>
                 @elseif($list->columnfieldname=="Hook_Length")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->		Length}}"  class="form-control" />
                 </div>
                </div>
                  @elseif($list->columnfieldname=="MoldCosting")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->				MoldCosting}}"  class="form-control" readonly="readonly" />
                 </div>
                </div>
                 @elseif($list->columnfieldname=="Hook_UniqueProductCode")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->				UniqueProductCode}}"  class="form-control" />
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
<!--Tissuepaper-->
            
            <div class="col-lg-12" id="tissuepaperform" style="display:none">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>TISSUE PAPER DETAILS</strong></h4>
                 
                  <input type="hidden" name="tissuepapereditID" id="tissuepapereditID" value="{{$tissuepaperdetails->id}}"  />
            <div class="modal-body">
            <div class="col-sm-12 b-r">
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
                 @if($fieldname=="StatusName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Tissuepaper_StatusName" name="Tissuepaper_StatusName" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->Productstatus==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
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
                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->MaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
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
                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->PrintTypeID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
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


                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->PrintTypeID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->columnfieldname=="PrintingFinishingProcessName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                <?php
						$tissuepaperselecteddetails=$tissuepaperdetails->PrintingFinishingProcessID;
						$chkvaltissueexp=explode(",",$tissuepaperselecteddetails);
						
				?>
                  @foreach ($fielddetailslist as $fielddetails)
                          <div class="col-lg-12">
              <input type="checkbox" name="Tissuepaper_PrintingFinishingProcess[]" id="Tissuepaper_PrintingFinishingProcess" value="{{$fielddetails->id}}" class="thicknesschkbox printing"
             @foreach($chkvaltissueexp as $chkvaltissue)
             @if($chkvaltissue==$fielddetails->id)
             checked="checked"
              @endif
             @endforeach
              
               /><p class="spanval label_font"> {{$fielddetails->$fieldname}}</p>
               
               </div>
                         @endforeach
                       
                       
                </div>   
                 
                </div>
                   @elseif($listoffieldname=="Production Region 1")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="TissuePaper_{{$fieldname}}1" name="TissuePaper_{{$fieldname}}1" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                  <input type="hidden" id="SelTissuePaperUniquefactory1" name="SelTissuePaperUniquefactory1" value="{{$tissuepaperdetails->UniqueFactory1}}" />
        @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_tissuepaper1">
                
                   <select id="uniquefactory_tissuepaper1" name="uniquefactory_tissuepaper1" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="TissuePaper_{{$fieldname}}2" name="TissuePaper_{{$fieldname}}2" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                  <input type="hidden" id="SelTissuePaperUniquefactory2" name="SelTissuePaperUniquefactory2" value="{{$tissuepaperdetails->UniqueFactory2}}" />
        @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_tissuepaper2">
                
                   <select id="uniquefactory_tissuepaper2" name="uniquefactory_tissuepaper2" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 3")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="TissuePaper_{{$fieldname}}3" name="TissuePaper_{{$fieldname}}3" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                  <input type="hidden" id="SelTissuePaperUniquefactory3" name="SelTissuePaperUniquefactory3" value="{{$tissuepaperdetails->UniqueFactory3}}" />
        @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_tissuepaper3">
                
                   <select id="uniquefactory_tissuepaper3" name="uniquefactory_tissuepaper3" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   
                 
                </div>
                 @endif
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
             <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Tissuepaper_QualityReference" id="Tissuepaper_QualityReference" value="{{$tissuepaperdetails->QualityReference}}" class="form-control qty_refbtn"/>                   
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
                
                      <input type="text" name="Tissuepaper_Thickness" id="Tissuepaper_Thickness" value="{{$tissuepaperdetails->Thickness}}" class="form-control"/>                   
              
                </div>
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                  <?php
				  $chkval=$list->checkboxvalue;
				  $chkvalexp=explode(",",$chkval);
				  ?>
                  <input type="radio" name="tissue_thickness" id="pt" value="pt" @if($tissuepaperdetails->measurement1=="pt")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">pt</p>
   <input type="radio" name="tissue_thickness" id="gms" value="gms" @if($tissuepaperdetails->measurement2=="gms")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">gms</p>
    <input type="radio" name="tissue_thickness" id="mm" value="mm" @if($tissuepaperdetails->measurement3=="mm")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">mm</p>
                  @endif
                  </div>
                  </div>
                    @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <input @if($tissuepaperdetails->CMYK==1) checked="checked" @endif type="radio" name="tissueprintcolor" id="tissuecmykyes"  class="tissuechkbox cmyk" value="1" @if($tissuepaperdetails->CMYK==1) checked="checked" @endif/>
                 <span class="cmykyes cmykcheckbox">Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5">
                 <input @if($tissuepaperdetails->CMYK==0) checked="checked" @endif type="radio" name="tissueprintcolor" id="tissuecmykno" class="tissuechkbox cmyk" value="0" />
                 <span class="cmykno cmykcheckbox">No</span>
                </div>
                </div>
                 @elseif($list->columnfieldname=="tissuepaper_print_color1")
              <div class="printcolorhidden" style="display:block;" id="tissueprintcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$tissuepaperdetails->PrintColor1}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="tissuepaper_print_color2")
              <div class="printcolorhidden" style="display:block;" id="tissueprintcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$tissuepaperdetails->PrintColor2}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="tissuepaper_print_color3")
              <div class="printcolorhidden" style="display:block;" id="tissueprintcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$tissuepaperdetails->PrintColor3}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="tissuepaper_print_color4")
              <div class="printcolorhidden" style="display:block;" id="tissueprintcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$tissuepaperdetails->PrintColor4}}"  class="form-control" />
                 </div>
             </div>
            @elseif($list->columnfieldname=="tissuepaper_print_color5")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="tissueprintcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$tissuepaperdetails->PrintColor5}}"  class="form-control" />
                 </div>
             </div>
           @elseif($list->columnfieldname=="tissuepaper_print_color6")
              <div  class="printcolorhidden" style="display:none;overflow:hidden;" id="tissueprintcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$tissuepaperdetails->PrintColor6}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="tissuepaper_print_color7")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="tissueprintcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$tissuepaperdetails->PrintColor7}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="tissuepaper_print_color8")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="tissueprintcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$tissuepaperdetails->PrintColor8}}"  class="form-control" />
                 </div>
             </div>
                    @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile1" name="imgInp1" id="imgInp1" onchange="imageselect1();"/>
                 <input type="hidden" name="selectimage1" id="selectimage1" class="form-control selectimage1" value="{{$tissuepaperdetails->Artwork}}" readonly="readonly">
                  <input type="hidden" name="selectimageid1" id="selectimageid1" class="form-control"  readonly="readonly">
                  </div>
                    
               </div>
               
                </div>
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                  <div class="col-lg-5" id="selimage1">
                     
                <img id="blah1" src="storage/data/product/" alt="" width="80" height="80" /> 
               <!-- <img id="blah1" src="http://localhost/laravel/uniquegroup/storage/app/{{$tissuepaperdetails->Artwork}}" alt="your image" width="80" height="80" />-->
               <img id="blah1" src="{{ route('user.productpictissue', ['id' => $tissuepaperdetails->id]) }}" alt="your image" width="80" height="80" />
                
                </div> 
                 
                 </div>
                
                
                   @elseif($list->columnfieldname=="tissuepaper_Width")
                         <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$tissuepaperdetails->Width}}" class="form-control" />
                 </div>
                </div>
                @elseif($list->columnfieldname=="tissuepaper_Length")
                         <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$tissuepaperdetails->Length}}" class="form-control" />
                 </div>
                </div>
                 @elseif($list->columnfieldname=="GroundPaperColor")
                         <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$tissuepaperdetails->GroundPaperColor}}" class="form-control" />
                 </div>
                </div>
                 @elseif($list->columnfieldname=="Tissuepaper_UniqueProductCode")
                         <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$tissuepaperdetails->UniqueProductCode}}" class="form-control" />
                 </div>
                </div>
                 
               
               
               
                 
                
                
                
                
                
                @endif
               
                
                
                
              </div>
              @endforeach
              
             
              
              
              
              
       
              
            </div>
            
             </div>
             
             
              <div class="col-lg-12" id="Packagingstickersform" style="display:none">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>PACKAGING STICKERS DETAILS</strong></h4>
             <div class="modal-body">
            <div class="col-sm-12 b-r">
            
              <input type="hidden" name="packagingeditID" id="packagingeditID" value="{{$packagingstickersdetails->id}}"  />
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
               @if($listoffieldname=="Production Region 1")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="PackagingStickers_{{$fieldname}}1" name="PackagingStickers_{{$fieldname}}1" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                 <input type="hidden" id="SelPackagingStickersUniquefactory1" name="SelPackagingStickersUniquefactory1" value="{{$packagingstickersdetails->UniqueFactory1}}" />
        @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_packagingstickers1">
                
                   <select id="uniquefactory_packagingstickers1" name="uniquefactory_packagingstickers1" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="PackagingStickers_{{$fieldname}}2" name="PackagingStickers_{{$fieldname}}2" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                 <input type="hidden" id="SelPackagingStickersUniquefactory2" name="SelPackagingStickersUniquefactory2"
                  value="{{$packagingstickersdetails->UniqueFactory2}}" />
                 @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_packagingstickers2">
                
                   <select id="uniquefactory_packagingstickers2" name="uniquefactory_packagingstickers2" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   
                 
                </div>
                   @elseif($listoffieldname=="Production Region 3")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="PackagingStickers_{{$fieldname}}3" name="PackagingStickers_{{$fieldname}}3" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                 <input type="hidden" id="SelPackagingStickersUniquefactory3" name="SelPackagingStickersUniquefactory3"
                  value="{{$packagingstickersdetails->UniqueFactory3}}" />
                 @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_packagingstickers3">
                
                   <select id="uniquefactory_packagingstickers3" name="uniquefactory_packagingstickers3" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       
                </div>   


                 
                </div>
                 
                 @elseif($fieldname=="StatusName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Package_StatusName" name="Package_StatusName" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->Productstatus==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
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
                           
                         <option value="{{$fielddetails->id}}"  @if($packagingstickersdetails->MaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
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
                           
                         <option value="{{$fielddetails->id}}"@if($packagingstickersdetails->PrintTypeID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
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
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->PrintTypeID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->columnfieldname=="PrintingFinishingProcessName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                        <?php
						$packagingstickersselecteddetails=$packagingstickersdetails->PrintingFinishingProcessID;
						$chkvalpackagingstickersexp=explode(",",$packagingstickersselecteddetails);
						
				?>
                  @foreach ($fielddetailslist as $fielddetails)
                          <div class="col-lg-12">
              <input type="checkbox" name="Package_PrintingFinishingProcess[]" id="Package_PrintingFinishingProcess" value="{{$fielddetails->id}}" class="thicknesschkbox printing"
             @foreach($chkvalpackagingstickersexp as $chkvalbox)
             @if($chkvalbox==$fielddetails->id)
             checked="checked"
              @endif
             @endforeach
              
               /><p class="spanval label_font"> {{$fielddetails->$fieldname}}</p>
               
               </div>
                         @endforeach
                      
                       
                </div>   
                 
                </div>
                  @elseif($list->columnfieldname=="TypeofAdhesive")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->AdhesiveID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                  @elseif($list->columnfieldname=="PackagingStickersTypes")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->TypeofStickerID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                
                 @endif

                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
             <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Package_QualityReference" id="Package_QualityReference" value="{{$packagingstickersdetails->QualityReference}}" class="form-control qty_refbtn"/>                   
                  <input type="checkbox" name="packageqty_chk" id="packageqty_chk" class="qty_checkbox" value="1" @if($packagingstickersdetails->QualityReferencem==1) checked="checked" @endif/>
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif
                   
                 
                </div>
                </div>
                   <!-- Defect: 
         Name: Bala-Uniquegroup Team
         Desc. Update thickness checkbox to radio button requirement of the the client Meeting-->
                
                   @elseif($list->checkbox!="" && $list->columnfieldname=="Thickness")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 Thicknessdiv">
                
                      <input type="text" name="PackageThickness" id="PackageThickness"  value="{{$packagingstickersdetails->Thickness}}" class="form-control"/>                   
              
                </div>
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                 
                  <input type="radio" name="package_thickness" id="pt" value="pt" @if($packagingstickersdetails->measurement1=="pt")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">pt</p>
   <input type="radio" name="package_thickness" id="gms" value="gms" @if($packagingstickersdetails->measurement2=="gms")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">gms</p>
    <input type="radio" name="package_thickness" id="mm" value="mm" @if($packagingstickersdetails->measurement3=="mm")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">mm</p>
                  @endif
                  </div>
                  </div>

                   @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <input @if($packagingstickersdetails->CMYK==1) checked="checked" @endif type="radio" name="packageprintcolor" id="packagecmykyes"  class="packagechkbox cmyk" value="1"  @if($packagingstickersdetails->CMYK==1) checked="checked" @endif/>
                 <span class="cmykyes cmykcheckbox">Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5">

                 <input @if($packagingstickersdetails->CMYK==0) checked="checked" @endif type="radio" name="packageprintcolor" id="packagecmykno" class="packagechkbox cmyk" value="0"/>
                 <span class="cmykno cmykcheckbox">No</span>
                </div>
                </div>
                 @elseif($list->columnfieldname=="packageprint_color1")
              <div class="printcolorhidden" style="display:block;" id="packageprintcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$packagingstickersdetails->PrintColor1}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="packageprint_color2")
              <div class="printcolorhidden" style="display:block;" id="packageprintcolor2">

                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$packagingstickersdetails->PrintColor2}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="packageprint_color3")
              <div class="printcolorhidden" style="display:block;" id="packageprintcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$packagingstickersdetails->PrintColor3}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="packageprint_color4")
              <div class="printcolorhidden" style="display:block;" id="packageprintcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$packagingstickersdetails->PrintColor4}}" class="form-control" />
                 </div>
             </div>
            @elseif($list->columnfieldname=="packageprint_color5")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="packageprintcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$packagingstickersdetails->PrintColor5}}" class="form-control" />
                 </div>
             </div>
           @elseif($list->columnfieldname=="packageprint_color6")
              <div  class="printcolorhidden" style="display:none;overflow:hidden;" id="packageprintcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$packagingstickersdetails->PrintColor6}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="packageprint_color7")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="packageprintcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$packagingstickersdetails->PrintColor7}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="packageprint_color8")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="packageprintcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$packagingstickersdetails->PrintColor8}}"  class="form-control" />
                 </div>
             </div> 

                  
                    @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile2" name="imgInp2" id="imgInp2"  value="{{$packagingstickersdetails->Artwork}}" onchange="imageselect2();"/>
                 <input type="hidden" name="selectimage2" id="selectimage2" class="form-control selectimage2"
                  value="{{$packagingstickersdetails->Artwork}}" readonly="readonly">
                  <input type="hidden" name="selectimageid2" id="selectimageid2" class="form-control" readonly="readonly">
                  </div>
                    
               </div>
               
                </div>
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                  <div class="col-lg-5" id="selimage2">
                     
                <img id="blah2" src="storage/data/product/" alt="" width="80" height="80" /> 
               <!-- <img id="blah2" src="http://localhost/laravel/uniquegroup/storage/app/{{$packagingstickersdetails->Artwork}}" alt="your image" width="80" height="80" />-->
                <img id="blah2" src="{{ route('user.productpicpackage', ['id' => $packagingstickersdetails->id]) }}" alt="your image" width="80" height="80" />
                </div> 
                 </div>
                
                 @elseif($list->columnfieldname=="package_Width")
                         <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$packagingstickersdetails->Width}}" class="form-control" />
                 </div>
                </div>
                 @elseif($list->columnfieldname=="package_Length")
                         <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$packagingstickersdetails->Length}}" class="form-control" />
                 </div>
                </div>
                  @elseif($list->columnfieldname=="Shape")
                         <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$packagingstickersdetails->Width}}" class="form-control" />
                 </div>
                </div>
                
                @endif
                
                
                
              </div>
              @endforeach
            

             
             
              
              
              
              
       
              
            </div>
               </div>
           
            
          </div>
          
          
          
        
     
        
        
    <div class="form-group">
                
                 <div class="col-lg-12 submitbtndiv">
              <!--  <a data-href="{{ url('/') }}" data-selecthref="" value="1"  title="test"
                  data-id="1" class="button"/>Next</a>-->
                  <input type="submit" id="submit" value="Next"  class="button" style="width: 12%;"/>
                </div>
                 <div class="col-lg-8">
                 
                 </div>
                </div>
                
                   </form>
                   
           </div>
      
      </div>

    </div>








<!--Woven Subgroup-->










@endsection 