@extends('users.layouts.addproductgroups')
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
            <div class="modal-body">
            <div class="col-sm-12 b-r">
            
             <?php
				$x=1;
				$y=1;
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
                   @if($fieldname=="ProductionRegions")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}<?php echo $x; ?>" name="{{$fieldname}}<?php echo $x; ?>" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                <?php
				 $x++;  
				
				?>
                 @elseif($fieldname=="factoryName")
                  
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory<?php echo $y; ?>">
                
                         <select id="uniquefactory<?php echo $y; ?>" name="uniquefactory<?php echo $y; ?>" class="form-control dropdownwidth">
                <option value="">Please Select</option>
               
                                    
                </select>
                       
                </div>   
                 
                </div>
                
                       
                 <?php
				
				$y++;
				?>
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
                 @elseif($list->uploadimage!="" &&  $list->columnfieldname=="Artwork")
                  <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile3" name="imgInp3" id="imgInp3" onchange="imageselect3();"/>
                 <input type="hidden" name="selectimage3" id="selectimage3" class="form-control selectimage2" readonly="readonly">
                  <input type="hidden" name="selectimageid3" id="selectimageid3" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
               <div class="printcolorhidden">
                   <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                  <div class="col-lg-5" id="selimage3">
                     
                <img id="blah3" src="storage/data/product/" alt="" width="80" height="80" /> <img id="blah3" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="80" height="80" />
                </div>
                  
                  </div>
               
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="qty_ref" id="qty_ref" class="form-control qty_refbtn"/>                   
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
                
                      <input type="text" name="Thickness" id="Thickness" class="form-control"/>                   
              
                </div>
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                  <?php
				  $chkval=$list->checkboxvalue;
				  $chkvalexp=explode(",",$chkval);
				  ?>
                  @foreach($chkvalexp as $chkbox)
                  <input type="checkbox" name="{{$chkbox}}" id="{{$chkbox}}" value="{{$chkbox}}" @if($chkbox=='pt') checked="checked" @endif class="thicknesschkbox"/><p class="spanval"> {{$chkbox}}</p>
                  @endforeach
                  @endif
                  </div>
                  </div>
                 @elseif($list->columnfieldname=="Width")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Width" id="Width" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="Height")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Height" id="Height" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="Length")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Length" id="Length" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <input type="radio" name="printcolor" id="cmykyes"  class="chkbox cmyk" value="1"  onclick="printcolor();"/>
                 <span class="cmykyes cmykcheckbox">Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5">
                 <input type="radio" name="printcolor" id="cmykno" class="chkbox cmyk" value="0" checked="checked"  onclick="printcolor();" />
                 <span class="cmykno cmykcheckbox">No</span>
                </div>
                </div>
             
             @elseif($list->columnfieldname=="print_color1")
              <div class="printcolorhidden" style="display:block;" id="printcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color2")
              <div class="printcolorhidden" style="display:block;" id="printcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color3")
              <div class="printcolorhidden" style="display:block;" id="printcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color4")
              <div class="printcolorhidden" style="display:block;" id="printcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
            @elseif($list->columnfieldname=="print_color5")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
           @elseif($list->columnfieldname=="print_color6")
              <div  class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color7")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color8")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="Hook")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}"  value="{{$list->columnfieldname}}" class="chkselectionproducts" />
                </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="TissuePaper")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}"  value="{{$list->fieldname}}" class="chkselectionproducts"/>
                </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="PackagingStickers")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}"  value="{{$list->fieldname}}" class="chkselectionproducts" />
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
 <?php
 //echo "usertype".$usertype;
 ?>

<div class="row wrapper wrapper-content animated fadeInRight" id="productgroups" style="display:none;">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        <form name="hooksadd" id="hooksadd" method="post" action="{{ url(route('user.addproductgroups')) }}" class="form-horizontal" enctype="multipart/form-data">
         {{ csrf_field() }}
         
         <div id="imgcpy" style="display:none">
                
                </div>
               <!-- <input type="hidden" name="Version" id="Version" value="1" />-->
         
          <div class="col-lg-12" id="hookform" style="display:none">
          
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
                
         <select id="Hooks_{{$fieldname}}<?php echo $i; ?>" name="Hooks_{{$fieldname}}<?php echo $i; ?>" class="form-control dropdownwidth">
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
                   <div class="col-lg-5 uniquefactory_hooks<?php echo $j; ?>">
                
                         <select id="uniquefactory_hooks<?php echo $j; ?>" name="uniquefactory_hooks<?php echo $j; ?>" class="form-control dropdownwidth">
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
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
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
                
                      <input type="text" name="Thickness" id="Thickness" class="form-control"/>                   
              
                </div>
                
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                  <?php
				  $chkval=$list->checkboxvalue;
				  $chkvalexp=explode(",",$chkval);
				  ?>
                  @foreach($chkvalexp as $chkbox)
                  <input type="checkbox" name="{{$chkbox}}" id="{{$chkbox}}" value="{{$chkbox}}" @if($chkbox=='pt') checked="checked" @endif class="thicknesschkbox"/><p class="spanval"> {{$chkbox}}</p>
                  @endforeach
                  @endif
                  </div>
                  </div>
                   
                   
                   
                    @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile" name="imgInp" id="imgInp" onchange="imageselect();"/>
                 <input type="hidden" name="selectimage" id="selectimage" class="form-control selectimage" readonly="readonly">
                  <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
               
                </div>
                 <div class="printcolorhidden">
                 
                 <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 
                 <div class="col-lg-5" id="selimage">
                     
                <img id="blah" src="storage/data/product/" alt="" width="80" height="80" /> <img id="blah" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="80" height="80" />
                </div>
                 
                 
                 </div>
                  @elseif($list->columnfieldname=="MoldCosting")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->				MoldCosting}}"  class="form-control"  @if($usertype->id==9) readonly="readonly" @endif/>
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
            
            <div class="col-lg-12" id="tissuepaperform" style="display:none">
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
                
         <select id="TissuePaper_{{$fieldname}}<?php echo $k; ?>" name="TissuePaper_{{$fieldname}}<?php echo $k; ?>" class="form-control dropdownwidth">
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
                   <div class="col-lg-5 uniquefactory_tissuepaper<?php echo $l; ?>">
                
                         <select id="uniquefactory_tissuepaper<?php echo $l; ?>" name="uniquefactory_tissuepaper<?php echo $l; ?>" class="form-control dropdownwidth">
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
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
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
                
                        <select id="Tissuepaper_PrintingFinishingProcess" name="Tissuepaper_PrintingFinishingProcess" class="form-control dropdownwidth">
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
                  <input type="checkbox" name="{{$chkbox}}" id="{{$chkbox}}" value="{{$chkbox}}" @if($chkbox=='pt') checked="checked" @endif class="thicknesschkbox"/><p class="spanval"> {{$chkbox}}</p>
                  @endforeach
                  @endif
                  </div>
                  </div>
                    @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <input type="radio" name="tissueprintcolor" id="tissuecmykyes"  class="tissuechkbox cmyk" value="1"/>
                 <span class="cmykyes cmykcheckbox">Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5">
                 <input type="radio" name="tissueprintcolor" id="tissuecmykno" class="tissuechkbox cmyk" value="0" checked="checked"  onclick="printcolor();" />
                 <span class="cmykno cmykcheckbox">No</span>
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
                 <input type="file" class="fbfile1" name="imgInp1" id="imgInp1" onchange="imageselect1();"/>
                 <input type="hidden" name="selectimage1" id="selectimage1" class="form-control selectimage1" readonly="readonly">
                  <input type="hidden" name="selectimageid1" id="selectimageid1" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
               
                </div>
                
                  <div class="printcolorhidden">
                   <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                   
                   <div class="col-lg-5" id="selimage1">
                     
                <img id="blah1" src="storage/data/product/" alt="" width="80" height="80" /> <img id="blah1" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="80" height="80" />
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
             
             
              <div class="col-lg-12" id="Packagingstickersform" style="display:none">
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
                
         <select id="PackagingStickers_{{$fieldname}}<?php echo $m; ?>" name="PackagingStickers_{{$fieldname}}<?php echo $m; ?>" class="form-control dropdownwidth">
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
                   <div class="col-lg-5 uniquefactory_packagingstickers<?php echo $n; ?>">
                
                         <select id="uniquefactory_packagingstickers<?php echo $n; ?>" name="uniquefactory_packagingstickers<?php echo $n; ?>" class="form-control dropdownwidth">
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
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
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
                
                        <select id="Package_PrintingFinishingProcess" name="Package_PrintingFinishingProcess" class="form-control dropdownwidth">
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
                  <input type="checkbox" name="{{$chkbox}}" id="{{$chkbox}}" value="{{$chkbox}}" @if($chkbox=='pt') checked="checked" @endif class="thicknesschkbox"/><p class="spanval"> {{$chkbox}}</p>
                  @endforeach
                  @endif
                  </div>
                  </div>

                   @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <input type="radio" name="packageprintcolor" id="packagecmykyes"  class="packagechkbox cmyk" value="1"  onclick="printcolor();"/>
                 <span class="cmykyes cmykcheckbox">Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5">

                 <input type="radio" name="packageprintcolor" id="packagecmykno" class="packagechkbox cmyk" value="0" checked="checked"  onclick="printcolor();" />
                 <span class="cmykno cmykcheckbox">No</span>
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
                 <input type="file" class="fbfile2" name="imgInp2" id="imgInp2" onchange="imageselect2();"/>
                 <input type="hidden" name="selectimage2" id="selectimage2" class="form-control selectimage2" readonly="readonly">
                  <input type="hidden" name="selectimageid2" id="selectimageid2" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
               
                </div>
                
                  <div class="printcolorhidden">
                   <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                  <div class="col-lg-5" id="selimage2">
                     
                <img id="blah2" src="storage/data/product/" alt="" width="80" height="80" /> <img id="blah2" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="80" height="80" />
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