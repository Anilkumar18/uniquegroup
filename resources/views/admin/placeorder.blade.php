@extends('admin.layouts.ecommerce')

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
</style>


<div class="headerlink">
<h5>Place Order- <?php echo isset($productgroupdetails->ProductGroup)?$productgroupdetails->ProductGroup:'';
echo isset($productsubgroupdetails->ProductSubGroupName)?$productsubgroupdetails->ProductSubGroupName:'';
echo $carestatus!=0?'Care':'';
?></h5>
</div>
<div class="ibox-title productibox-title">
<div class="col-lg-12 clsprodhomedd">



</div>
<div class="col-lg-12 clsprodhomedd">
  
 <?php
 //print_r($productlist);
 ?>
<div class="ibox-content">
                           

                            <form id="form" action="#" class="wizard-big">
                                <h1>Product Option</h1>
                                <fieldset>
                                    <h2>Product Information</h2>
                                    <div class="row">
                                        <div class="form-group">
                  <label class="col-lg-12 control-label font-noraml text-left label_font">Product Region:<span class="required" aria-required="true">*</span></label>
                <input type="hidden" name="pageurl" id="pageurl" value="<?php echo url('/');?>">
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="ProductRegion" name="ProductRegion" class="form-control dropdownwidth" required="required">
                            <option></option>
                            @foreach($ProductionRegions as $Regions)
                                <option value="{{$Regions->id}}">{{$Regions->ProductionRegions}}</option>

                            @endforeach
                        </select>
                        </div>
                       
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                                       <table id="example1" class="table table-striped table-bordered table-hover dataTables-example1 unique_user_detail_table">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->

                    @if (count($productlist) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
<th>Add To Cart</th>
                        <th class="customer_th">Product Code</th>                        

                        <th class="contact_first_th">Description</th>

                       

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($productlist as $productdetailss_list)                        
<tr>
    <td><input type="radio" required="required" value="{{ $productdetailss_list->id }}" name="producttype" class="producttype" data-producttxt="{{ $productdetailss_list->UniqueProductCode }}"></td>
                    <td>{{ $productdetailss_list->UniqueProductCode }}</td>
                    
                    <td>{{ $productdetailss_list->Description }}</td>
                    
</tr>
                    @endforeach

                    

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="4">No Product(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>
                                       
                                    </div>

                                </fieldset>
                                @if($ProductGroupID==12)
                                    @include('order.zipperorder')
                                @elseif($ProductGroupID==3)
                                    @include('order.hangtag')
                                @else
                                    @include('order.care')
                                @endif
                                <h1>Continue Shopping/Finish</h1>
                                <fieldset>
                                    

                                     <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <h4><label>Item Code : </label></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-4" style="margin-left: -100px;">
                                            <div class="form-group">
                                            <h4><span class="productitemcode"></span></h4>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="row">
                                
                                       <div class="col-lg-12">
                                       
                                            <label for="continue_select">
                                            <input type="radio" id="continue_select" name="continue_select" value="Continue" class="" onclick="continueclick()"><strong>Continue Shopping</strong></label>
                                            
                                    
                                    </div>
                                    </div>
                                    <div class="row">
                                     <div class="col-lg-12">
                                    
                                   
                                            <label for="finish_select">
                                            <input type="radio" id="finish_select" name="continue_select" value="Finish" class="" onclick="termsclick()"><strong>Add to Cart</strong></label> <br> 
                                          
                                         
                                  
                                    </div> 
                                     
                               </div>

                                    
                                </fieldset>

                                
                            </form>
                        </div>
                    </div>
</div>




@endsection 