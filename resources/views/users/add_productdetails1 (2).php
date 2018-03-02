@extends('users.layouts.products')
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
          
           <!--paper bags-->
       

<div class="row wrapper wrapper-content animated fadeInRight">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        <form name="productdetailsadd" id="productdetailsadd" method="post" action="{{ url(route('user.add_productsgroupdetails')) }}" class="form-horizontal" enctype="multipart/form-data">
         {{ csrf_field() }}
            <div class="modal-body">
            <div class="col-sm-12 b-r">
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
             
             @elseif($list->fieldname=="Print Color 1 (Pantone)")
              <div class="printcolorhidden" style="display:block;" id="printcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 2 (Pantone)")
              <div class="printcolorhidden" style="display:block;" id="printcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 3 (Pantone)")
              <div class="printcolorhidden" style="display:block;" id="printcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 4 (Pantone)")
              <div class="printcolorhidden" style="display:block;" id="printcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
            @elseif($list->fieldname=="Print Color 5 (Pantone)")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
           @elseif($list->fieldname=="Print Color 6 (Pantone)")
              <div  class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 7 (Pantone)")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 8 (Pantone)")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="Hook")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}"  value="1" class="chkselectionproducts" />
                </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="TissuePaper")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}"  value="1" class="chkselectionproducts"/>
                </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="PackagingStickers")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}"  value="1" class="chkselectionproducts" />
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
</div>



 <!--paper bags End-->






<!--Woven Subgroup-->










@endsection 