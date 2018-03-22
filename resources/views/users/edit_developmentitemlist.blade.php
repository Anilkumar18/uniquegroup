@extends('users.layouts.update_pdmdetails')


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
                     
                      <li>Edit Development<strong></strong></li>
                      <li>
                     Packaging
                      </li>
                      <!-- Defect: PDF changes:no:5
                      //Vidhya -->
                      <li>
                        @if($typeid==0)
                        Boxes
                        @elseif($typeid==1)
                        Hooks
                        @elseif($typeid==2)
                        TissuePaper
                        @elseif($typeid==3)
                        PackagingStickers
                        @elseif($typeid==4)
                        Hang Tags
                        @elseif($typeid==5)
                        Tapes
                        @endif
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
                          
                                 <form name="productsadd" id="productsadd" method="post" action="{{ url(route('user.update_processproductsdetails')) }}" class="form-horizontal wizard-big" enctype="multipart/form-data">
{{ csrf_field() }}
                                    <input type="hidden" name="ProductGroup" id="ProductGroup" value="{{$productgroupid}}" />
                                    <input type="hidden" name="editID" id="editID" value="{{$productquotedetails->id}}" />
                                    <input type="hidden" name="editlistitem" id="editlistitem" value="1" />
         
      <input type="hidden" name="productsubgroupurl" id="productsubgroupurl" value="<?php echo url('/');?>" />

      



          <!-- Selling price -->
          

          
                                <h1>Product Information</h1>
                                <fieldset>


                                    
                                    <div class="modal-body">
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
        ?>
                 @if($fieldname=="CustomerName")
                <div class="form-group">
                 <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
               <div class="col-lg-5">
               
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth" onchange="CustomerChange();">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                    @if($user->userTypeID==1)
                        <option drop-data="{{url(route('user.selectcustomer', ['id' => $fielddetails->id]))}}" value="{{$fielddetails->id}}" @if($productdetails->CustomerID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                         @elseif($fielddetails->AccountManagerID==$user->id && $user->userTypeID==9)
                        <option drop-data="{{url(route('user.selectcustomer', ['id' => $fielddetails->id]))}}" value="{{$fielddetails->id}}" @if($productdetails->CustomerID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                        @else
                         <option drop-data="{{url(route('user.selectcustomer', ['id' => $fielddetails->id]))}}" value="{{$fielddetails->id}}" @if($productdetails->CustomerID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                            @endif
                 
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                 @elseif($fieldname=="Warehouse_Name")
                <div class="form-group">
                 <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               <div class="statedisplay">
               <div class="col-lg-5">
               
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($productdetails->CustomerWareHouseID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 </div>
                </div>
                </div>
              
                @elseif($fieldname=="ProductionRegions")
                  <?php if($i<=3) {?>
                <div class="form-group">
                 <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
               <div class="col-lg-5 addr_field">
               
                
                <select id="{{$fieldname}}<?php echo $i; ?>" name="{{$fieldname}}<?php echo $i; ?>" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                
                 @foreach ($fielddetailslist as $fielddetails)
                 
                 <?php
         $pgid="ProductionRegionID".$i;
         ?>
                   
                 <option value="{{$fielddetails->id}}" @if($productdetails->$pgid==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                <?php
        $ufid="UniqueFactory".$i;
        ?>
               
               <input type="hidden" id="SelUniquefactory<?php echo $i; ?>" name="SelUniquefactory<?php echo $i; ?>" value="{{$productdetails->$ufid}}" />
               
               <?php
          }
          else
          {
         ?>
               <div class="form-group">
                 <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
               <div class="col-lg-5 addr_field">
               
                
                <select id="{{$fieldname}}<?php echo $i; ?>" name="{{$fieldname}}<?php echo $i; ?>" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                
                 @foreach ($fielddetailslist as $fielddetails)
                 
                 <?php
         $pgid="ProductionRegionID".$i;
         ?>
                   
                 <option value="{{$fielddetails->id}}" @if($productdetails->$pgid==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                 <?php
        $ufid="UniqueFactory".$i;
        ?>
               
               <input type="hidden" id="SelUniquefactory<?php echo $i; ?>" name="SelUniquefactory<?php echo $i; ?>" value="{{$productdetails->$ufid}}" />
                
               <?php
          }
         $i++;
         ?>
                
        
                @elseif($fieldname=="factoryName")
                 <?php if($j<=3) {?>
                
                 <div class="form-group">
                 
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory<?php echo $j; ?>">
                
                <select id="uniquefactory<?php echo $j; ?>" name="uniquefactory<?php echo $j; ?>" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                
                  
                                    
                </select>
                 
                </div>
                </div>
                 <?php
           }
           else
           {
           ?>
                   <div class="form-group">
                 
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory<?php echo $j; ?>">
                
                <select id="uniquefactory<?php echo $j; ?>" name="uniquefactory<?php echo $j; ?>" class="form-control dropdownwidth">
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
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($productdetails->SeasonID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                  @elseif($fieldname=="ProductGroup")
                 <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                          
                         <div class="col-lg-5">
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth" disabled="disabled">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}" @if($productdetails->ProductGroupID==$fielddetails->id)selected="selected" @endif disabled="true">{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                         <input type="hidden" name="{{$fieldname}}" id="{{$fieldname}}" value="{{$productdetails->ProductGroupID}}" />
                        </div>
                       
                        </div>
                 @elseif($fieldname=="ProductSubGroupName")
                 @if($typeid==0)
                 <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="1{{$fieldname}}" name="1{{$fieldname}}" class="form-control dropdownwidth" disabled="disabled">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}" @if($productdetails->ProductSubGroupID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        <input type="hidden" name="{{$fieldname}}" id="{{$fieldname}}" value="{{$productdetails->ProductSubGroupID}}" />
                        </div>
                        <div class="col-lg-5 productsubgroupnotification"></div>
                        </div>
                        @endif
                        @elseif($fieldname=="StatusName")
                 <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                          
                         <div class="col-lg-5">
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}" @if($productdetails->ProductStatusID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        </div>
                        </div>
                         @elseif($fieldname=="ProductProcess")
                 <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                          
                         <div class="col-lg-5">
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}" @if($productdetails->ProductProcessID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        </div>
                        </div>
                 
                     @elseif($fieldname=="UnitofMeasurement")
                     <div class="form-group">
                      <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="UnitofMeasurement" name="UnitofMeasurement" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        </div>
                        </div>
               
                @else
                <div class="form-group">
                <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
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
                      
                      
                      
                      
                
                                      
                
                
                @else
                <div class="form-group">
                 <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                  @if($list->columnfieldname=="version")
                 <?php
          $version=DB::table("productdetails")->orderBy("Version","ASC")->pluck("Version")->last();

          //sathish 15-03-2018 
          $version=$version;
         ?>
                          @if($version!="")
                       <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="<?php echo $version; ?>" class="form-control" readonly="readonly"/> 
                                                  
                        @endif
                         @elseif($list->columnfieldname=="warehouse")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->CustomerWareHouseID}}"  class="form-control" />
                         @elseif($list->columnfieldname=="brand")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->Brand}}"  class="form-control" />
                     @elseif($list->columnfieldname=="programname")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->ProgramName}}"  class="form-control" />
                       @elseif($list->columnfieldname=="productname")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->CustomerProductName}}"  class="form-control" />
                      @elseif($list->columnfieldname=="productcode")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->CustomerProductCode}}"  class="form-control" />
                      @elseif($list->columnfieldname=="uniqueproductcode")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->UniqueProductCode}}"  class="form-control" />
                     @elseif($list->columnfieldname=="description")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->Description}}"  class="form-control" />
                     @elseif($list->columnfieldname=="stylenumber")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->StyleNumber}}"  class="form-control" />
                     @elseif($list->columnfieldname=="packsize")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->PackSize}}"  class="form-control" />
                     @elseif($list->columnfieldname=="sellingprice")
                    <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->SellingPrice}}"  class="form-control" />
                     @elseif($list->columnfieldname=="sampleandquote")
                      <input  @if($productdetails->SampleandQuote==1) checked="checked" @endif type="radio" name="samplequote" id="samplequote"  class="chkbox samplequote" value="1"/>
                      
                       @elseif($list->columnfieldname=="onlyquote")
                         <input  @if($productdetails->SampleandQuote==2) checked="checked" @endif type="radio" name="samplequote" id="samplequote"  class="chkbox samplequote" value="2"/>
                      
                 @else
                 
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 
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


           <!--Boxes start-->
@if($typeid==0)
       
<input type="hidden" name="box_editID" id="box_editID" value="{{$boxesdetails->id}}"  />
<div class="row wrapper wrapper-content animated fadeInRight" id="boxform" style="display:block;">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        <!--form name="productdetailsadd" id="productdetailsadd" method="post" action="{{ url(route('user.add_productsgroupdetails')) }}" class="form-horizontal" enctype="multipart/form-data"-->
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
                <?php $arrFinishingProcessName=explode(',', $boxesdetails->PrintingFinishingProcessID); ?>
                       
                         @foreach ($fielddetailslist as $fielddetails)
                          <div class="col-lg-12">
              <input type="checkbox" name="{{$fieldname}}[]" id="{{$fieldname}}" value="{{$fielddetails->id}}" class="thicknesschkbox printing" <?php if(in_array($fielddetails->id, $arrFinishingProcessName)){ echo 'checked="checked"';} ?>/><p class="spanval label_font"> {{$fielddetails->$fieldname}}</p>
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
                  @elseif($listoffieldname=="Currency")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="box{{$fieldname}}" name="box{{$fieldname}}" class="form-control dropdownwidth">
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
                
                        <select id="{{$fieldname}}1" name="{{$fieldname}}1" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($boxesdetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
               
                 @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory1 factoryselect">
                
                   <select id="uniquefactory1" name="uniquefactory1[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>
                          
                </select>
                        <input type="hidden" id="SelUniquefactory1" class="SelUniquefactory" name="SelUniquefactory1" value="{{$boxesdetails->UniqueFactory1}}" /> 
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}2" name="{{$fieldname}}2" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($boxesdetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                
                 @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory2 factoryselect">
                
                 <select id="uniquefactory2" name="uniquefactory2[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>  
                </select>
                       <input type="hidden" id="SelUniquefactory2" class="SelUniquefactory" name="SelUniquefactory2" value="{{$boxesdetails->UniqueFactory2}}" /> 
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}3" name="{{$fieldname}}3" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($boxesdetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 
                 @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory3 factoryselect">
                
                 <select id="uniquefactory3" name="uniquefactory3[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>  
                </select>
                    <input type="hidden" id="SelUniquefactory3" name="SelUniquefactory3" class="SelUniquefactory" value="{{$boxesdetails->UniqueFactory3}}" />   
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
        <!-- sathish 15-03-2018 measurement1 -->         
    <input type="radio" name="measurement1" id="pt" value="pt" @if($boxesdetails->measurement1=="pt")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">pt</p>
   <input type="radio" name="measurement1" id="gms" value="gms" @if($boxesdetails->measurement1=="gms")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">gms</p>
    <input type="radio" name="measurement1" id="mm" value="mm" @if($boxesdetails->measurement1=="mm")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">mm</p>
                 
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
                @elseif($list->columnfieldname=="box_Samplecost")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="box_Samplecost" id="box_Samplecost" value="{{$boxesdetails->Sample_costing}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                <!-- Defect:pdf march14:page5
               //Vidhya: PHP Team
               //Yes, No alignment -->
                 @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <span class="cmykyes cmykcheckbox"><input @if($boxesdetails->CMYK==1) checked="checked" @endif type="radio" name="printcolor" id="cmykyes"  class="chkbox cmyk" value="1" @if($boxesdetails->CMYK==1) checked="checked" @endif/>Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5 cmykwidthdiv">
                 <span class="cmykno cmykcheckbox"><input @if($boxesdetails->CMYK==0) checked="checked" @endif type="radio" name="printcolor" id="cmykno" class="chkbox cmyk" value="0" />No</span>
                </div>
                </div>
                 @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                 <input type="file" class="fbfile3" name="imgInp3" id="imgInp3" value="{{$boxesdetails->Artwork}}" onchange="imageselect3();"/>
                 <input type="hidden" name="selectimage3" id="selectimage3" class="form-control selectimage" value="{{$boxesdetails->Artwork}}" readonly="readonly">
                  <input type="hidden" name="selectimageid3" id="selectimageid3" class="form-control" value="{{$boxesdetails->id}}" readonly="readonly">
                  </div>
                   
                   
               </div>
             
                
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 
                  <div class="col-lg-5" id="selimage3">
                  
                  <input type="hidden" id="existingboximage" name="existingboximage" value="{{$boxesdetails->Artwork}}" />
                  
                     
                <img id="blah3" src="storage/data/product/" alt="" width="80" height="80" /> 
               
              
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
                 @elseif($list->checkbox!="")
                 @if($list->columnfieldname=="Hook" && $boxesdetails->HookID!="0")
                   <div style="display: none;"><label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}" value="{{$list->fieldname}}" @if($boxesdetails->HookID!="0") checked="checked" @endif class="chkselectionproducts" />
                </div>
              </div>
                @endif
                 @if($list->columnfieldname=="TissuePaper" && $boxesdetails->TissuePaperID!="0")
                  <div style="display: none;"> <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}"  value="{{$list->fieldname}}"@if($boxesdetails->TissuePaperID!="0") checked="checked" @endif  class="chkselectionproducts"/>
                </div></div>
                @endif
                 @if($list->columnfieldname=="PackagingStickers" && $boxesdetails->PackagingStickersID!="0")
                   <div style="display: none;"><label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="{{$list->columnfieldname}}" name="{{$list->columnfieldname}}" value="{{$list->fieldname}}" @if($boxesdetails->PackagingStickersID!="0") checked="checked" @endif class="chkselectionproducts" />
                </div></div>
                 @endif
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
        
     
        
        
   
                
                   
                   
           </div>
      
      </div>

    </div>
</div>
<!-- Vidhya:php
//Add hangtags edit function -->
@elseif($typeid==4)
<h4 style="color:#00ADEF;"><strong>HANG TAGS DETAILS</strong></h4>
<input type="hidden" name="hang_editID" id="hang_editID" value="{{$hangtagsproduct->id}}"  />
<div class="row wrapper wrapper-content animated fadeInRight" id="boxform" style="display:block;">


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

        //sathish 16-03-2018 work for printin process checkbox

        
        ?>
                
                @if($list->columnfieldname=="RawMaterial")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->MaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
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
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->PrintTypeID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
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
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->CuttingID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                   @elseif($list->columnfieldname=="PrintingFinishingProcessName")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <?php  
                        $arrFinishingProcessName=explode(',',$hangtagsproduct->PrintingFinishingProcessID); ?>
                          @foreach ($fielddetailslist as $fielddetails)
                      <!-- sathish 16-03-2018 //Defect: 
                       //Name: Sathish-PHP Team
                        //Working for checkbox in printing finishing process -->    
                          
                          <div class="col-lg-12">
              <input type="checkbox" name="{{$fieldname}}[]" id="{{$fieldname}}" value="{{$fielddetails->id}}" class="thicknesschkbox printing" <?php
        if(in_array($fielddetails->id,$arrFinishingProcessName))
        {
        echo "checked=checked";  
        }
        
        
        ?> /><p class="spanval label_font"> {{$fielddetails->$fieldname}}
              </p>
              </div> 
                         
                           @endforeach
                                            
                        
                       
                </div>   
                 
                </div>
                    @elseif($list->fieldname=="Grommet Material")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="grommetMetalMaterial" name="grommetMetalMaterial" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->GrommetMaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->fieldname=="Grommet Colour")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="grommetMetalColour" name="grommetMetalColour" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->GrommetColourID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->fieldname=="String Material")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->StringMaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->columnfieldname=="SealsMaterials")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="SealsMaterials" name="SealsMaterials" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->SealID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->fieldname=="Ball Chain Colour")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="ballMetalColour" name="ballMetalColour" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->BallChainColourID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->fieldname=="Ball Chain Material")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="ballMetalMaterial" name="ballMetalMaterial" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->BallChainMaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->fieldname=="Pin Style")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->PinStyleID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->fieldname=="Pin Colour")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="pinMetalColour" name="pinMetalColour" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->PinColourID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($list->fieldname=="Pin Material")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="pinMetalMaterial" name="pinMetalMaterial" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->PinMaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
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
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->UnitofMeasurementID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                <!-- Defect:pdf march:page11
               //Vidhya: PHP Team
               //ADd 2 fields -->
                  @elseif($list->columnfieldname=="Currency")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="hang{{$fieldname}}" name="hang{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($hangtagsproduct->CurrencyID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($listoffieldname=="Production Region 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                  <select id="{{$fieldname}}1" name="{{$fieldname}}1" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($hangtagsproduct->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
               
                 @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory1 factoryselect">
                
                   <select id="uniquefactory1" name="uniquefactory1[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>
                          
                </select>
                </div>   
                        <input type="hidden" id="SelUniquefactory1" class="SelUniquefactory" name="SelUniquefactory1" value="{{$hangtagsproduct->UniqueFactory1}}" /> 
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}2" name="{{$fieldname}}2" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($hangtagsproduct->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                
                 @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory2 factoryselect">
                
                 <select id="uniquefactory2" name="uniquefactory2[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>  
                </select>
                       <input type="hidden" id="SelUniquefactory2" class="SelUniquefactory" name="SelUniquefactory2" value="{{$hangtagsproduct->UniqueFactory2}}" /> 
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}3" name="{{$fieldname}}3" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($hangtagsproduct->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 
                 @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory3 factoryselect">
                
                 <select id="uniquefactory3" name="uniquefactory3[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>  
                </select>
                    <input type="hidden" id="SelUniquefactory3" name="SelUniquefactory3" class="SelUniquefactory" value="{{$hangtagsproduct->UniqueFactory3}}" />   
                </div>   
                 
                </div>
                
                @endif
               
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="qty_ref" id="qty_ref" value="{{$hangtagsproduct->QualityReference}}" class="form-control qty_refbtn"/>                   
                  <input type="checkbox" name="qty_chk" id="qty_chk" class="qty_checkbox" value="1" @if($hangtagsproduct->QualityReferencem==1) checked="checked" @endif/>
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif
                   
                 
                </div>
                </div>
                
                 @elseif($list->checkbox!="" && $list->columnfieldname=="Thickness")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 Thicknessdiv">
                
                      <input type="text" name="Thickness" id="Thickness" value="{{$hangtagsproduct->Thickness}}" class="form-control"/>                   
              
                </div>
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
                  <?php
          $chkval=$list->checkboxvalue;
          $chkvalexp=explode(",",$chkval);
          ?>
                 
    <!-- <input type="radio" name="measurement1" id="pt" value="pt" @if($hangtagsproduct->measurement1=="pt")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">pt</p>
   <input type="radio" name="measurement1" id="gms" value="gms" @if($hangtagsproduct->measurement1=="gms")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">gms</p> -->
    <input type="radio" name="measurement1" id="mm" value="mm" @if($hangtagsproduct->measurement1=="mm")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">mm</p>
                 
                  @endif
                  </div>
                  </div>
                 @elseif($list->columnfieldname=="Width")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Width" id="Width" value="{{$hangtagsproduct->Width}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="Height")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Height" id="Height" value="{{$hangtagsproduct->Height}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="Length")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Length" id="Length" value="{{$hangtagsproduct->Length}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                <!-- Defect:pdf march:page11
               //Vidhya: PHP Team
               //ADd 2 fields -->
                @elseif($list->columnfieldname=="hangtags_Samplecost")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="hangtags_Samplecost" id="hangtags_Samplecost" value="{{$hangtagsproduct->Sample_costing}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                @elseif($list->columnfieldname=="DrillHoleSize")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="DrillHoleSize" id="DrillHoleSize" value="{{$hangtagsproduct->Drillholesize}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="StringTotalLength")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="StringTotalLength" id="StringTotalLength" value="{{$hangtagsproduct->StringTotalLength}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                @elseif($list->columnfieldname=="StringLoop")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="StringLoop" id="StringLoop" value="{{$hangtagsproduct->StringLooptoKnotLength}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                @elseif($list->columnfieldname=="BallChain")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="BallChain" id="BallChain" value="{{$hangtagsproduct->BallChain}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                @elseif($list->columnfieldname=="BallChainLength")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="BallChainLength" id="BallChainLength" value="{{$hangtagsproduct->BallChainLength}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                @elseif($list->columnfieldname=="Pin")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Pin" id="Pin" value="{{$hangtagsproduct->Pin}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                @elseif($list->columnfieldname=="PinLength")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="PinLength" id="PinLength" value="{{$hangtagsproduct->PinLength}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                <!-- Defect:pdf march14:page5
               //Vidhya: PHP Team
               //Yes, No alignment -->
                 @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <span class="cmykyes cmykcheckbox"><input @if($hangtagsproduct->CMYK==1) checked="checked" @endif type="radio" name="printcolor" id="cmykyes"  class="chkbox cmyk" value="1" @if($hangtagsproduct->CMYK==1) checked="checked" @endif/>Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5 cmykwidthdiv">
                 <span class="cmykno cmykcheckbox"><input @if($hangtagsproduct->CMYK==0) checked="checked" @endif type="radio" name="printcolor" id="cmykno" class="chkbox cmyk" value="0" />No</span>
                </div>
                </div>
                 @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                 <input type="file" class="fbfile3" name="imgInp3" id="imgInp3" value="{{$hangtagsproduct->Artwork}}" onchange="imageselect3();"/>
                 <input type="hidden" name="selectimage3" id="selectimage3" class="form-control selectimage" value="{{$hangtagsproduct->Artwork}}" readonly="readonly">
                  <input type="hidden" name="selectimageid3" id="selectimageid3" class="form-control" value="{{$hangtagsproduct->id}}" readonly="readonly">
                  </div>
                   
                   
               </div>
             
                
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 
                  <div class="col-lg-5" id="selimage3">
                  
                  <input type="hidden" id="existingboximage" name="existingboximage" value="{{$hangtagsproduct->Artwork}}" />
                  
                     
                <img id="blah3" src="storage/data/product/" alt="" width="80" height="80" /> 
               
              
             <img id="blah3" src="{{ route('user.hangtagpic', ['id' => $hangtagsproduct->id]) }}" alt="your image" width="80" height="80" />
                 
                 
               
                </div> 
                   
               </div>
             
             @elseif($list->columnfieldname=="print_color1")
              <div class="printcolorhidden" style="display:block;" id="printcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$hangtagsproduct->PrintColor1}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color2")
              <div class="printcolorhidden" style="display:block;" id="printcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                     value="{{$hangtagsproduct->PrintColor2}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color3")
              <div class="printcolorhidden" style="display:block;" id="printcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                      value="{{$hangtagsproduct->PrintColor3}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color4")
              <div class="printcolorhidden" style="display:block;" id="printcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hangtagsproduct->PrintColor4}}"  class="form-control" />
                 </div>
             </div>
            @elseif($list->columnfieldname=="print_color5")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                     value="{{$hangtagsproduct->PrintColor5}}" class="form-control" />
                 </div>
             </div>
           @elseif($list->columnfieldname=="print_color6")
              <div  class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                     value="{{$hangtagsproduct->PrintColor6}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color7")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"
                     value="{{$hangtagsproduct->PrintColor7}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="print_color8")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"
                     value="{{$hangtagsproduct->PrintColor8}}"   class="form-control" />
                 </div>
             </div>
             @elseif($list->columnfieldname=="hangtags_Samplecost")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"
                     value="{{$hangtagsproduct->Sample_costing}}"   class="form-control" />
                 </div>
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

<!-- Vidhya:php
//Tapes edit function -->
@elseif($typeid==5)
<h4 style="color:#00ADEF;"><strong>HANG TAGS DETAILS</strong></h4>
<input type="hidden" name="tape_editID" id="tape_editID" value="{{$tapeproduct->id}}"  />
<div class="row wrapper wrapper-content animated fadeInRight" id="boxform" style="display:block;">


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

        //sathish 16-03-2018 work for printin process checkbox

        
        ?>
                
                @if($list->columnfieldname=="RibbonsMaterialName")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="RibbonsMaterialName" name="RibbonsMaterialName" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($tapeproduct->TapesMaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                  
                  
                   
                    @elseif($list->fieldname=="Grommet Material")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="grommetMetalMaterial" name="grommetMetalMaterial" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($tapeproduct->GrommetMaterialID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                
                <!-- Defect:pdf march:page11
               //Vidhya: PHP Team
               //ADd 2 fields -->
                  @elseif($list->columnfieldname=="Currency")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="tape{{$fieldname}}" name="tape{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($tapeproduct->CurrencyID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($listoffieldname=="Production Region 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                  <select id="{{$fieldname}}1" name="{{$fieldname}}1" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($tapeproduct->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
               
                 @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory1 factoryselect">
                
                   <select id="uniquefactory1" name="uniquefactory1[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>
                          
                </select>
                </div>   
                        <input type="hidden" id="SelUniquefactory1" class="SelUniquefactory" name="SelUniquefactory1" value="{{$tapeproduct->UniqueFactory1}}" /> 
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}2" name="{{$fieldname}}2" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($tapeproduct->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                
                 @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory2 factoryselect">
                
                 <select id="uniquefactory2" name="uniquefactory2[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>  
                </select>
                       <input type="hidden" id="SelUniquefactory2" class="SelUniquefactory" name="SelUniquefactory2" value="{{$tapeproduct->UniqueFactory2}}" /> 
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}3" name="{{$fieldname}}3" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($tapeproduct->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 
                 @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory3 factoryselect">
                
                 <select id="uniquefactory3" name="uniquefactory3[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>  
                </select>
                    <input type="hidden" id="SelUniquefactory3" name="SelUniquefactory3" class="SelUniquefactory" value="{{$tapeproduct->UniqueFactory3}}" />   
                </div>   
                 
                </div>
                
                @endif
               
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="qty_ref" id="qty_ref" value="{{$tapeproduct->QualityReference}}" class="form-control qty_refbtn"/>                   
                  <input type="checkbox" name="qty_chk" id="qty_chk" class="qty_checkbox" value="1" @if($tapeproduct->QualityReferencem==1) checked="checked" @endif/>
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif
                   
                 
                </div>
                </div>
                
                 @elseif($list->columnfieldname=="TapeColor")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="TapeColor" id="TapeColor" value="{{$tapeproduct->TapeColor}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 @elseif($list->columnfieldname=="TapeWidth")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="TapeWidth" id="TapeWidth" value="{{$tapeproduct->TapeWidth}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 
                 @elseif($list->columnfieldname=="TotalLength")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="TotalLength" id="TotalLength" value="{{$tapeproduct->TotalLength}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                
                 
                @elseif($list->columnfieldname=="Brocade")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Brocade" id="Brocade" value="{{$tapeproduct->Brocade}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                
                @elseif($list->columnfieldname=="tapes_Samplecost")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="tapes_Samplecost" id="tapes_Samplecost" value="{{$tapeproduct->Sample_costing}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                
                 
                 @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                 <input type="file" class="fbfile3" name="imgInp3" id="imgInp3" value="{{$tapeproduct->Artwork}}" onchange="imageselect3();"/>
                 <input type="hidden" name="selectimage3" id="selectimage3" class="form-control selectimage" value="{{$tapeproduct->Artwork}}" readonly="readonly">
                  <input type="hidden" name="selectimageid3" id="selectimageid3" class="form-control" value="{{$tapeproduct->id}}" readonly="readonly">
                  </div>
                   
                   
               </div>
             
                
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 
                  <div class="col-lg-5" id="selimage3">
                  
                  <input type="hidden" id="existingboximage" name="existingboximage" value="{{$tapeproduct->Artwork}}" />
                  
                     
                <img id="blah3" src="storage/data/product/" alt="" width="80" height="80" /> 
               
              
             <img id="blah3" src="{{ route('user.tapespic', ['id' => $tapeproduct->id]) }}" alt="your image" width="80" height="80" />
                 
                 
               
                </div> 
                   
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


@elseif($typeid==1)
<?php if(isset($hookdetails->id)){  ?>

<input type="checkbox" id="Hook" name="Hook" value="Hook"  checked="checked" class="chkselectionproducts" style="display: none;" />
                                    <div class="row wrapper wrapper-content animated fadeInRight" id="productgroups">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        
     
         
         <div id="imgcpy" style="display:none"></div>
         
         <div id="hiddenimgurlcpy" style="display:none"></div>
                
               
         
          
          <div class="col-lg-12" id="hookform">
                     <br />

                     <input type="hidden" name="hook_editID" id="hook_editID" value="{{$hookdetails->id}}"  />
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
                
                        <select id="Currency" name="Currency" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($hookdetails->MoldCostingCurrency==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                <!-- Defect no: pdf march05:page:11
                //Vidhya:php
                //Add new fields for edit -->
                 @elseif($listoffieldname=="Hook Currency")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Hook_Currency" name="Hook_Currency" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($hookdetails->Hook_Currency==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>

                
               
                @elseif($listoffieldname=="Production Region 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Hooks_{{$fieldname}}1" name="Hooks_{{$fieldname}}1" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($hookdetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                
       
        @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_hooks1 factoryselect">
                
                   <select id="uniquefactory_hooks1" name="uniquefactory_hooks1[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>
                          
                </select>
                   <input type="hidden" id="SelHooksUniquefactory1" name="SelHooksUniquefactory1" value="{{$hookdetails->UniqueFactory1}}" class="SelUniquefactory" />    
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Hooks_{{$fieldname}}2" name="Hooks_{{$fieldname}}2" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($hookdetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{$fielddetails->$fieldname}}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 
        @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_hooks2 factoryselect">
                
                   <select id="uniquefactory_hooks2" name="uniquefactory_hooks2[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>
                          
                </select>
                       <input type="hidden" id="SelHooksUniquefactory2" name="SelHooksUniquefactory2" value="{{$hookdetails->UniqueFactory2}}" class="SelUniquefactory" />
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Hooks_{{$fieldname}}3" name="Hooks_{{$fieldname}}3" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($hookdetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{$fielddetails->$fieldname}}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 
                 @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_hooks3 factoryselect">
                
                   <select id="uniquefactory_hooks3" name="uniquefactory_hooks3[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                     <input type="hidden" id="SelHooksUniquefactory3" name="SelHooksUniquefactory3" value="{{$hookdetails->UniqueFactory3}}" class="SelUniquefactory" />  
                </div>   
                 
                </div>
       
                 @endif
                 
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
             <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->QualityReference}}" class="form-control qty_refbtn"/>                   

                <!-- sathish 15-03-2018 -->                 
                  <input type="checkbox" name="hook_qty_chk" id="qty_chk" class="qty_checkbox" value="1" @if($hookdetails->QualityReferencem==1) checked="checked" @endif />
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
               <!-- sathish 15-03-2018 --> 
                <!-- Defect No:57
                //Vidhya: PHP team
                //Remove radiobutton gms,pt -->
                 <!-- <input type="radio" name="hook_measurement" id="pt" value="pt" @if($hookdetails->measurement1=="pt")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">pt</p>
   <input type="radio" name="hook_measurement" id="gms" value="gms" @if($hookdetails->measurement1=="gms")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">gms</p> -->
    <input type="radio" name="hook_measurement" id="mm" value="mm" @if($hookdetails->measurement1=="mm")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">mm</p>
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
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails-> Width}}"  class="form-control" />
                 </div>
                </div>
                 @elseif($list->columnfieldname=="Hook_Length")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->   Length}}"  class="form-control" />
                 </div>
                </div>
                  @elseif($list->columnfieldname=="MoldCosting")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->       MoldCosting}}"  class="form-control" />
                 </div>
                </div>
                 @elseif($list->columnfieldname=="Hook_UniqueProductCode")
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$hookdetails->       UniqueProductCode}}"  class="form-control" />
                 </div>
                </div>
                <!-- Defect no: pdf march05:page:11
                //Vidhya:php
                //Add new fields for edit -->
                  @elseif($list->columnfieldname=="hook_samplecost")
                  
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="hook_samplecost" id="hook_samplecost" value="{{$hookdetails->Hook_samplecost}}"  class="form-control" />
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
             <?php } ?>
@elseif($typeid==2)
<?php if(isset($tissuepaperdetails->id)) {?>
<!--Tissuepaper-->
            <input type="checkbox" id="TissuePaper" name="TissuePaper" value="TissuePaper"  checked="checked" class="chkselectionproducts" style="display: none;" />
            <div class="col-lg-12" id="tissuepaperform">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>TISSUE PAPER DETAILS</strong></h4>
                 
                  <input type="hidden" name="tissuepapereditID" id="tissuepapereditID" value="<?php echo isset($tissuepaperdetails->id)?$tissuepaperdetails->id:'0' ?>"  />
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


                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->CuttingID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->columnfieldname=="PrintingFinishingProcessName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                <?php $arrFinishingProcessName=explode(',', $tissuepaperdetails->PrintingFinishingProcessID); ?>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <div class="col-lg-12">
              <input type="checkbox" name="Tissuepaper_PrintingFinishingProcess[]" id="Tissuepaper_PrintingFinishingProcess" value="{{$fielddetails->id}}" class="thicknesschkbox printing" <?php if(in_array($fielddetails->id, $arrFinishingProcessName)){ echo 'checked="checked"';} ?>/><p class="spanval label_font"> {{$fielddetails->$fieldname}}</p>
              </div>
                           @endforeach
                                            
                      
                       
                </div>   
                 
                </div>
                   @elseif($listoffieldname=="Production Region 1")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="TissuePaper_{{$fieldname}}1" name="TissuePaper_{{$fieldname}}1" class="form-control dropdownwidth regionselect">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                 
        @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_tissuepaper1 factoryselect">
                
                   <select id="uniquefactory_tissuepaper1" name="uniquefactory_tissuepaper1[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>
                          
                </select>
                        <input type="hidden" id="SelTissuePaperUniquefactory1" name="SelTissuePaperUniquefactory1" value="{{$tissuepaperdetails->UniqueFactory1}}" class="SelUniquefactory" />
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="TissuePaper_{{$fieldname}}2" name="TissuePaper_{{$fieldname}}2" class="form-control dropdownwidth regionselect">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                  
        @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_tissuepaper2 factoryselect">
                
                   <select id="uniquefactory_tissuepaper2" name="uniquefactory_tissuepaper2[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                       <input type="hidden" id="SelTissuePaperUniquefactory2" name="SelTissuePaperUniquefactory2" value="{{$tissuepaperdetails->UniqueFactory2}}" class="SelUniquefactory" />
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 3")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="TissuePaper_{{$fieldname}}3" name="TissuePaper_{{$fieldname}}3" class="form-control dropdownwidth regionselect">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($tissuepaperdetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                 
        @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_tissuepaper3 factoryselect">
                
                   <select id="uniquefactory_tissuepaper3" name="uniquefactory_tissuepaper3[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                    <input type="hidden" id="SelTissuePaperUniquefactory3" name="SelTissuePaperUniquefactory3" value="{{$tissuepaperdetails->UniqueFactory3}}" class="SelUniquefactory" />    
                </div>   
                 
                </div>
                 @endif
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
             <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Tissuepaper_QualityReference" id="Tissuepaper_QualityReference" value="{{$tissuepaperdetails->QualityReference}}" class="form-control qty_refbtn"/>                   
      <!-- sathish 15-03-2018 -->                   
                  <input type="checkbox" name="tissueqty_chk" id="tissueqty_chk" class="qty_checkbox" value="1"   @if($tissuepaperdetails->QualityReferencem==1) checked="checked" @endif />
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

          <!-- sathish 15-03-2018 -->
                  <input type="radio" name="tissue_measurement" id="pt" value="pt" @if($tissuepaperdetails->measurement1=="pt")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">pt</p>
   <input type="radio" name="tissue_measurement" id="gms" value="gms" @if($tissuepaperdetails->measurement1=="gms")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">gms</p>
    <input type="radio" name="tissue_measurement" id="mm" value="mm" @if($tissuepaperdetails->measurement1=="mm")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">mm</p>
                  @endif
                  </div><!-- end -->
                  </div>
                  </div>
<!-- Defect:pdf march14:page5
               //Vidhya: PHP Team
               //Yes, No alignment -->
                    @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <span class="cmykyes cmykcheckbox"><input @if($tissuepaperdetails->CMYK==1) checked="checked" @endif type="radio" name="tissueprintcolor" id="tissuecmykyes"  class="tissuechkbox cmyk" value="1" @if($tissuepaperdetails->CMYK==1) checked="checked" @endif/>Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5 cmykwidthdiv">
                 <span class="cmykno cmykcheckbox"><input @if($tissuepaperdetails->CMYK==0) checked="checked" @endif type="radio" name="tissueprintcolor" id="tissuecmykno" class="tissuechkbox cmyk" value="0" />No</span>
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
                 <input type="file" class="fbfile1" name="imgInp1" id="imgInp1" onchange="uploadimageselect(this,'tissuelist');"/>
                 <input type="hidden" name="selectimage1" id="tissuelist_selectimage" class="form-control selectimage1" value="{{$tissuepaperdetails->Artwork}}" readonly="readonly">
                  <input type="hidden" name="selectimageid1" id="selectimageid1" class="form-control"  readonly="readonly">
                  </div>
                    
               </div>
               
                </div>
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                  <div class="col-lg-5" id="selimage1">
                     
                <img id="blah1" src="storage/data/product/" alt="" width="80" height="80" /> 
                <img id="tissuelist" src="{{ route('user.productpictissue', ['id' => $tissuepaperdetails->id]) }}" alt="your image" width="80" height="80" />
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
                 <!-- Defect:pdf march:page11
               //Vidhya: PHP Team
               //ADd 2 fields --> 
               @elseif($list->columnfieldname=="Tissue_samplecost")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 
                      <input type="text" name="Tissue_samplecost" id="Tissue_samplecost" value="{{$tissuepaperdetails->Tissue_Samplecost}}" class="form-control boxthickwidheightcls"/>                   
               
                </div>
                </div>
               
               
                 
                
                
                
                
                
                @endif
               <!-- Defect:pdf march:page11
               //Vidhya: PHP Team
               //ADd 2 fields -->
                @if($list->columnfieldname=="Currency")
               
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Tissuepaper_Currency" name="Tissuepaper_Currency" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"@if($tissuepaperdetails->Tissue_CurrencyID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @endif
                
                
              </div>
              @endforeach
              
             
              
              
              
              
       
              
            </div>
            <!-- Defect No:56
              //Vidhya:PHP Team
              //Tissuepaper display error- remove one </div>
             </div> -->
             
            <?php } ?>
@elseif($typeid==3)
<?php if(isset($packagingstickersdetails->id)) { ?> 
<input type="checkbox" id="PackagingStickers" name="PackagingStickers" value="PackagingStickers"  checked="checked" class="chkselectionproducts" style="display: none;" />
              <div class="col-lg-12" id="Packagingstickersform">
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
                        <select id="PackagingStickers_{{$fieldname}}1" name="PackagingStickers_{{$fieldname}}1" class="form-control dropdownwidth regionselect">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                 
        @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_packagingstickers1 factoryselect">
                
                   <select id="uniquefactory_packagingstickers1" name="uniquefactory_packagingstickers1[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                    <input type="hidden" class="SelUniquefactory" id="SelPackagingStickersUniquefactory1" name="SelPackagingStickersUniquefactory1" value="{{$packagingstickersdetails->UniqueFactory1}}" />   
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="PackagingStickers_{{$fieldname}}2" name="PackagingStickers_{{$fieldname}}2" class="form-control dropdownwidth regionselect">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                 
                 @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_packagingstickers2 factoryselect">
                
                   <select id="uniquefactory_packagingstickers2" name="uniquefactory_packagingstickers2[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                     <input type="hidden" id="SelPackagingStickersUniquefactory2" name="SelPackagingStickersUniquefactory2"
                  value="{{$packagingstickersdetails->UniqueFactory2}}" class="SelUniquefactory" />  
                </div>   
                 
                </div>
                   @elseif($listoffieldname=="Production Region 3")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                        <select id="PackagingStickers_{{$fieldname}}3" name="PackagingStickers_{{$fieldname}}3" class="form-control dropdownwidth regionselect">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                </div>   
                </div>
                 
                 @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory_packagingstickers3 factoryselect">
                
                   <select id="uniquefactory_packagingstickers3" name="uniquefactory_packagingstickers3[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                          
                </select>
                    <input type="hidden" id="SelPackagingStickersUniquefactory3" name="SelPackagingStickersUniquefactory3"
                  value="{{$packagingstickersdetails->UniqueFactory3}}" class="SelUniquefactory" />   
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
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->CuttingID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 @elseif($list->columnfieldname=="PrintingFinishingProcessName")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                      <?php $arrFinishingProcessName=explode(',', $packagingstickersdetails->PrintingFinishingProcessID); ?>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <div class="col-lg-12">
              <input type="checkbox" name="Package_PrintingFinishingProcess[]" id="Package_PrintingFinishingProcess" value="{{$fielddetails->id}}" class="thicknesschkbox printing" <?php if(in_array($fielddetails->id, $arrFinishingProcessName)){ echo 'checked="checked"';} ?>/><p class="spanval label_font"> {{$fielddetails->$fieldname}}</p>
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
                  <input type="checkbox" name="packageqty_chk" id="packageqty_chk" class="qty_checkbox" value="1" @if($packagingstickersdetails->QualityReferencem==1) checked="checked" @endif />
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif
                   
                 
                </div>
                </div>
                
                   @elseif($list->checkbox!="" && $list->columnfieldname=="Thickness")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 Thicknessdiv">
                
                      <input type="text" name="PackageThickness" id="PackageThickness"  value="{{$packagingstickersdetails->Thickness}}" class="form-control"/>                   
              
                </div>
                
                 <div class="col-lg-5 checkboxdiv">
                  @if($list->checkboxvalue!="")
  <!-- sathish 15-03-2018 -->
                  <input type="radio" name="package_measurement" id="pt" value="pt" @if($packagingstickersdetails->measurement1=="pt")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">pt</p>
   <input type="radio" name="package_measurement" id="gms" value="gms" @if($packagingstickersdetails->measurement1=="gms")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">gms</p>
    <input type="radio" name="package_measurement" id="mm" value="mm" @if($packagingstickersdetails->measurement1=="mm")checked="checked" @endif  class="thicknesschkbox"/><p class="spanval">mm</p>
                  @endif
                  </div>
                  </div>
                  <!-- Defect:pdf march14:page5
               //Vidhya: PHP Team
               //Yes, No alignment -->
                   @elseif($list->columnfieldname=="CMYK")
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <span class="cmykyes cmykcheckbox"><input @if($packagingstickersdetails->CMYK==1) checked="checked" @endif type="radio" name="packageprintcolor" id="packagecmykyes"  class="packagechkbox cmyk" value="1"  onclick="printcolor();"/>Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5 cmykwidthdiv">
<!--sathish 15-03-2018 packageprintcolor -->
                 <span class="cmykno cmykcheckbox"><input type="radio" name="packageprintcolor" id="packagecmykno" class="packagechkbox cmyk" value="0" checked="checked"  onclick="printcolor();" />No</span>
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
                <!-- Defect pdf march05: page 11
                //Vidhya: php
                //Add 2 fields in tissue -->

                 @elseif($list->columnfieldname=="Pack_samplecost")

                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Pack_samplecost" id="Pack_samplecost" value="{{$packagingstickersdetails->Pack_Samplecost}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>

                
                @endif
                
                @if($list->columnfieldname=="Currency")
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="Package_currency" name="Package_currency" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}" @if($packagingstickersdetails->Pack_CurrencyID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                
                
                @endif
                
              </div>
              @endforeach
            

             
             
              
              
              
              
       
              
            </div>
               </div>
               <?php } ?>
               @endif
                                        
                                        
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
                @if($listoffieldname=="Production Region 1")
                
                 <div class="form-group printcolorhidden inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="inventory{{$fieldname}}<?php echo $i; ?>" id="{{$fieldname}}<?php echo $i; ?>" class="form-control inventoryregionselect" >

                                <option value="">Please Select</option>
                               @foreach ($fielddetailslist as $fielddetails)  

                               <option value="{{$fielddetails->id}}" @if($productquotedetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>

                               {{ $fielddetails->$fieldname }}</option>
                               @endforeach
                                
                                </select>
                     </div>
                     </div>
                   
                <?php
                 $i++;  
                ?>
                 @elseif($listoffieldname=="Unique Factory 1")
                  
                    <div class="form-group printcolorhidden inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  uniquefactory1 factoryselect">
                       <select id="uniquefactory1" name="uniquefactory1[]" class="form-control dropdownwidth " >
<option value="">Please Select</option>
                              
                                
                               @foreach ($fielddetailslist as $fielddetails) 

                               <option value="{{$fielddetails->id}}" @if($productquotedetails->UniqueFactory1==$fielddetails->id)selected="selected" @endif>

                               {{ $fielddetails->$fieldname }}</option>
                               @endforeach
                  
                                </select>
                     </div>
  <input type="hidden" id="SelHooksUniquefactory1" name="SelHooksUniquefactory1" value="{{$productdetails->UniqueFactory1}}" class="SelUniquefactory" />  
                     </div>


@elseif($listoffieldname=="Production Region 2")
                
                 <div class="form-group printcolorhidden inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="inventory{{$fieldname}}2" id="{{$fieldname}}2" class="form-control inventoryregionselect" >

                                <option value="">Please Select</option>
                               @foreach ($fielddetailslist as $fielddetails) 

                               <option value="{{$fielddetails->id}}" @if($productquotedetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>
                              
                               {{ $fielddetails->$fieldname }}</option>
                               @endforeach
                                
                                </select>
                     </div>
                     </div>
                   
                
                 @elseif($listoffieldname=="Unique Factory 2")
                  
                    <div class="form-group printcolorhidden inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  uniquefactory2 factoryselect">
                       <select id="uniquefactory2" name="inventoryuniquefactory2[]" class="form-control dropdownwidth " >
<option value="">Please Select</option>
                  
             
                  
                                </select>
                     </div>
  <input type="hidden" id="SelHooksUniquefactory2" name="SelHooksUniquefactory2" value="{{$productdetails->UniqueFactory2}}" class="SelUniquefactory" />  
                     </div>


                @elseif($listoffieldname=="Production Region 3")
                
                 <div class="form-group printcolorhidden inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="inventory{{$fieldname}}3" id="{{$fieldname}}3" class="form-control inventoryregionselect" >

                                <option value="">Please Select</option>
                               @foreach ($fielddetailslist as $fielddetails) 

                               <option value="{{$fielddetails->id}}" @if($productquotedetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>

                               {{ $fielddetails->$fieldname }}</option>
                               @endforeach
                                
                                </select>
                     </div>
                     </div>
                   
                
                 @elseif($listoffieldname=="Unique Factory 3")
                  
                    <div class="form-group printcolorhidden inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  uniquefactory3 factoryselect">
                       <select id="uniquefactory3" name="inventoryuniquefactory3[]" class="form-control dropdownwidth " >
<option value="">Please Select</option>
                  
                              
                                
                                </select>
                     </div>
  <input type="hidden" id="SelHooksUniquefactory3" name="SelHooksUniquefactory3" value="{{$productdetails->UniqueFactory3}}" class="SelUniquefactory" />  
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
                               <option value="{{$inventorylist->id}}"  @if($productdetails->InventoryID==$inventorylist->id)selected="selected" @endif>{{$inventorylist->InventoryName}}</option>
                                @endforeach
                                </select>
                     </div>
                     </div>
                    
               <!-- sathish 14-03-2018 -->     

                    @else

                     @if($list->columnfieldname=="Projection")

                     <div class="form-group inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5 inventorycontent" style="display:none">
                     <input type="text" name="inventory{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->Projection}}" class="form-control" />
                     </div>
                     </div>

                      @endif

                      @if($list->columnfieldname=="Maximumpiecesonstock")

                     <div class="form-group inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5 inventorycontent" style="display:none">
                     <input type="text" name="inventory{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->Maximumpiecesonstock}}" class="form-control" />
                     </div>
                     </div>

                      @endif

                      @if($list->columnfieldname=="Minimumpiecesonstock")

                     <div class="form-group inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5 inventorycontent" style="display:none">
                     <input type="text" name="inventory{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->Minimumpiecesonstock}}" class="form-control" />
                     </div>
                     </div>

                      @endif



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
              <?php
      
       $quoterequiredchk=$productquotedetails->QuantityMOQ;
    $costseleteddetails=$productquotedetails->Cost;
    
    $expquoterequiredchk=explode("#",$quoterequiredchk);
    
    $costrequiredetails=explode("#",$costseleteddetails);

   
 

      ?>

            @foreach($invendetails_productfielddetails as $list)
             
                
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
        $table=$list->tablename;
        $fielddetailslist = DB::table($table)->get();
        $fieldname=$list->columnfieldname;
        $listoffieldname=$list->fieldname;
        ?>
                
                @if($fieldname=="PricingMethod")
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}" @if($productquotedetails->PricingMethod==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach     
                </select>
                 
                </div>
             </div>   
              @elseif($fieldname=="UnitofMeasurement")
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}" @if($productquotedetails->UnitofMeasurementID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach     
                </select>
                 
                </div>
             </div>
               @elseif($fieldname=="Currency")
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}" @if($productquotedetails->CurrencyID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach     
                </select>
                 
                </div>
             </div>
             @endif
               
                 @else
                  @if($list->columnfieldname=="quantity")
                 <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
               
                 <div class="col-lg-2">
                 <label class="col-lg-1 control-label font-noraml text-left label_font"><b>Quantity</b></label>
                 
                  @foreach($quantitydetails as $list)
                                                
                 <div class="col-sm-12 quantitychkdiv">      
              {{$list->Quantity}}<input type="checkbox" name="quantitychk[]"  class="quantitychk @if($usertype->id==9) notallowed @endif" id="quantitychk" value="{{$list->Quantity}}"  <?php
        if(in_array($list->Quantity,$expquoterequiredchk))
        {
        echo "checked=checked";  
        }
        
        
        ?> />
                </div>
                
                
             @endforeach
                 </div>
                
                 
                 <div class="col-lg-5">
                 <label class="col-lg-1 control-label font-noraml text-left label_font"><b>&nbsp;&nbsp;Cost</b></label>
                   <div class="col-sm-12 quantitychksec">
                    <?php   $cost_i=0; ?>
                                            @foreach($quantitydetails as $list)      
                               <div class="col-sm-12 quantitychkdiv">
              <input type="text"  name="quantitychk1[]"  class="quantitychk1 inventoryprice" id="quantitychk" value="<?php echo isset($costrequiredetails[$cost_i])?$costrequiredetails[$cost_i]:''; ?>" @if($usertype->id==9) readonly="readonly" @endif/>  
              </div>
               <?php $cost_i+=1;  ?>
              @endforeach
              <div class="col-sm-12">
              <?php
        $quantitychkvalue=$productquotedetails->QuantityMOQ;
        
        $expquoterequiredchk=explode("#",$quantitychkvalue);
        
        $costchkvalue=$productquotedetails->Cost;
        $costrequiredchk=explode("#",$costchkvalue);
        
        $costval=end($costrequiredchk);
          
        if($costval!="")
        {
        foreach($expquoterequiredchk as $chkqty)
        {
          $chkqty;
        }
        
        }
       
      
        
        ?>
              
              <input type="text" name="otherqty" id="otherqty" placeholder="Quantity"  value="<?php echo isset($chkqty)?$chkqty:'0'; ?>" style="display:none"/>
              
              <input type="text" name="othercost" id="othercost" placeholder="Cost" value="<?php echo isset($costval)?$costval:'0'; ?>" style="display:none"/>
              </div>
              
              
                                                </div>
                 </div>
             </div>
                   
              @elseif($list->columnfieldname=="MinQuantity")
              
               <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" value="{{$productquotedetails->MinimumOrderQuantity}}" @if($usertype->id==9) readonly="readonly" @endif /><span><b>&nbsp;Units</b></span>
                     </div>
                   </div>  
                   @elseif($list->columnfieldname=="packsize")
              
               <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" value="{{$productquotedetails->PackSize}}"/><span><b>&nbsp;Units</b></span>
                     </div>
                   </div>  
                    @elseif($list->columnfieldname=="exworks")
                      <h4 style="color:#00ADEF;"><strong>COSTING REQUIREMENTS</strong></h4>
                     <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                
                 <div class="col-lg-5 divwidthforexworks" >
                <input type="checkbox" class="quantitychk" name="exworks" id="exworks" value="1" @if($productquotedetails->ExWorks)checked="checked" @endif/>
                
                    </div>
                     <label class="col-lg-2 control-label font-noraml text-left label_font">Fright Cost</label>
                     <div class="col-lg-5 divwidthforexworks">
                <input type="text"  name="frightcost" id="frightcost"  class="frightcost" @if($usertype->id==9) readonly="readonly" @endif />
              
                
                    </div>
                     <label class="col-lg-2 control-label font-noraml text-left label_font">Currency</label>
                    <div class="col-lg-5 divwidthforexworks">
                    <select style="margin-top: 13%;" name="currency" @if($usertype->id==9) disabled="disabled" @endif>
                    <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}" @if($productquotedetails->CurrencyID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach 
                    </select>
              
                
                    </div>
                   
                   
                    </div>
                     @elseif($list->columnfieldname=="fob")
                     <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 divwidthforexworks">
                <input type="checkbox" class="quantitychk3" name="fob" id="fob" value="2" @if($productquotedetails->FOB)checked="checked" @endif />
                    </div>
                    <label class="col-lg-2 control-label font-noraml text-left label_font">Fright Cost</label>
                     <div class="col-lg-5 divwidthforexworks">
                <input type="text"  name="frightcost" id="frightcost"  @if($usertype->id==9) readonly="readonly" @endif class="frightcost" />
              
                
                    </div>
                     <label class="col-lg-2 control-label font-noraml text-left label_font">Currency</label>
                    <div class="col-lg-5 divwidthforexworks">
                    <select style="margin-top: 13%;" name="currency" @if($usertype->id==9) disabled="disabled" @endif>
                    <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}" @if($productquotedetails->CurrencyID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach 
                    </select>
              
                
                    </div>
                    
                   
                   
                    </div>
                    @elseif($list->columnfieldname=="Minordervalue")
                    <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                        <div class="input-group m-b"><span class="input-group-addon currencytype">$</span>
<input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->MinimumOrderValue}}" class="form-control" @if($usertype->id==9) readonly="readonly" @endif />
                        </div>
                     
                     </div>
                   </div>
                   @elseif($list->columnfieldname=="samplecost")
                    <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                        <div class="input-group m-b"><span class="input-group-addon currencytype">$</span>
<input type="text" name="{{$list->columnfieldname}}" value="{{$productquotedetails->SellingPrice}}"id="{{$list->columnfieldname}}"  class="form-control" @if($usertype->id==9) readonly="readonly" @endif />
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
         <!-- 16-03-2018 sathish unit of measurement -->                                  
<!-- sathish 15-03-2018 -->
<div style=' float:left; '>Unit of Measurement: <b>&nbsp;<div style=" float:right;" class="pricemethod"></div></b></div><br>

       <!-- 16-03-2018 sathish div tag -->  

                          <div class="col-sm-12 b-r">
              <span class="required">*</span><div style='float: left;'>  Margin :</div><input type="text" class="quantitychk1 margin123" name="input0" id="input0"  onkeyup="margin(this)" value="{{$productdetails->Margin}}">%
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
                    
                      <div class="input-group"><span class="input-group-addon currencytype">$</span> <input type="text"  class="multiple quantitychk1 cost" value="<?php echo isset($costrequiredchk[$cost_i])?$costrequiredchk[$cost_i]:''; ?>" name="input1[]" id="input1" @if($usertype->id==9) readonly="readonly" @endif/></div> 
                  
               
                   

               
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
                 <input type="file" class="fbfile" name="imgInpsample" id="imgInpsample" value="{{$productdetails->Artworkupload}}" onchange="uploadimageselect(this,'sampleimg');"/>
                 <input type="hidden" name="selectimage" id="sampleimg_selectimage" class="form-control selectimage" value="{{$productdetails->Artworkupload}}" readonly="readonly">
                  <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
                <div class="form-group">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 <div class="col-lg-5" id="selimage">
                     
                <img id="sampleimg" src="{{ route('user.productpic', ['id' => $productdetails->id]) }}" alt="your image" width="80" height="80" />
                </div>
                
                </div>
                @else
                   @if($list->columnfieldname=="SampleRequestedDate")
             <div class="form-group" id="data_1">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                <div class="col-lg-5">
                  <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->SampleRequestedDate}}" placeholder="MM/DD/YYYY" class="search_upload" onclick="dateval();">
                 <!-- <i class="fa fa-calendar fa-color input-group date"  aria-hidden="true" ></i>--> 
               </div>
             </div>
              @elseif($list->columnfieldname=="NumberOfSamplesRequired")
             <div class="form-group" id="data_1">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                <div class="col-lg-5">
                  <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->NumberOfSamplesRequired}}" >
                 <!-- <i class="fa fa-calendar fa-color input-group date"  aria-hidden="true" ></i>--> 
               </div>
             </div>
              @elseif($list->columnfieldname=="SampleLeadTime")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productdetails->SampleLeadTime}}" @if($usertype->id==9) readonly="readonly" @endif class="form-control"
                 style="width:20%;" />&nbsp;<span>Days</span>
                 </div>
                 
                
             </div>
              @elseif($list->columnfieldname=="ProductionLeadTime")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control"
                 style="width:20%;" value="{{$productdetails->ProductionLeadTime}}" @if($usertype->id==9) readonly="readonly" @endif  />&nbsp;<span>Days</span>
                 </div>
             </div>
              @elseif($list->columnfieldname=="Remarks")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <textarea name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}">{{$productdetails->RemarksInstructions}}</textarea>
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



