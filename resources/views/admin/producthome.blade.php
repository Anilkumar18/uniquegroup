@extends('admin.layouts.productdashboard')

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

<?php
$sidebarid=$_GET['sidebarid'];

$customername=App\Customers::where('id','=',$sidebarid)->first();

//$session_customername=Session::set('customername', $customername);
Session::put('customername', $customername); 


?>
<div class="headerlink">
<h5>Product Maintenance-<?php echo $customername->CustomerName; ?></h5>
</div>
<div class="ibox-title productibox-title">
<div class="col-lg-12 clsprodhomedd">



</div>
<div class="col-lg-12 clsprodhomedd">
  
  <?php
 $subgroupdetails=App\ProductGroup::where('status','=',1)->get();
 ?>
 <div class="dropdown row"><center>
                          <!--onclick="event.preventDefault()-->
 <button class="dropbtn" type="button">Labels&nbsp;<span class="fa fa-chevron-down"></span></button>
                          <div class="dropdown-content dasboardlabel" align="center" id="dropdownbox">
                            
                           <?php
$str = base64_encode('0#0#1');
  
  ?>

                           <a href="{{ url(route('product.productmaintenance', ['id' =>$str])) }}"><div class="button_wrapper btn btn-w-m" style="max-width:149px;height:30px;">Care Labels<div class="tooltip2"><img src="{{ asset('/img/care1.png') }}"></div></div></a>
                           <?php
$str = base64_encode('0#11#0');
  
  ?>
                            <a href="{{ url(route('product.productmaintenance', ['id' =>$str])) }}"><div class="button_wrapper btn btn-w-m" style="max-width:149px;  height:30px;">Printed Labels<div class="tooltip2"><img src="{{ asset('/img/printed1.png') }}"></div></div></a>
                            <?php
$str = base64_encode('0#12#0');
  
  ?>
                            <a href="{{ url(route('product.productmaintenance', ['id' =>$str])) }}"><div class="button_wrapper btn btn-w-m" style="max-width:149px; height:30px;">Heat Transfer<div class="tooltip2"><img src="{{ asset('/img/heat1.png') }}"></div></div></a>
                          </div>
</center>
                        </div><br><br>
 <!-- <div class="row"><center><a href="javascript:;"><div class="button_wrapper btn btn-w-m btn-success" style="max-width:149px; background-color:#0099CC; height:30px;">Care Labels<div class="tooltip2"><img src="{{ asset('/img/care1.png') }}"></div></div></a></center></div>
<br>
  <div class="row"><center><a href="javascript:;"><div class="button_wrapper btn btn-w-m btn-success" style="max-width:149px; background-color:#0099CC; height:30px;">Printed Labels<div class="tooltip2"><img src="{{ asset('/img/printed1.png') }}"></div></div></a></center></div>
<br>
  <div class="row"><center><a href="javascript:;"><div class="button_wrapper btn btn-w-m btn-success" style="max-width:149px; background-color:#0099CC;height:30px;">Heat Transfer<div class="tooltip2"><img src="{{ asset('/img/heat1.png') }}"></div></div></a></center></div>
<br> -->
<?php
$str = base64_encode('3#0#0');
  
  ?>
  <div class="row"><center><a href="{{ url(route('product.productmaintenance', ['id' =>$str])) }}"><div class="button_wrapper btn btn-w-m btn-success" style="max-width:149px; background-color:#0099CC;height:30px;">Hangtags<div class="tooltip2"><img src="{{ asset('/img/hangtag1.png') }}"></div></div></a></center></div>
<br>
  <div class="row"><center><a href="javascript:;"><div class="button_wrapper btn btn-w-m btn-success" style="max-width:149px; background-color:#0099CC;height:30px;">Price Sticker<div class="tooltip2"><img src="{{ asset('/img/variabe.png') }}"></div></div></a></center></div>
<br>
  <div class="row"><center><a href="javascript:;"><div class="button_wrapper btn btn-w-m btn-success" style="max-width:149px; background-color:#0099CC;height:30px;">Other products<div class="tooltip2"><img src="{{ asset('/img/other1.png') }}"></div></div></a></center></div>
<br>
<?php
$str = base64_encode('12#0#0');
  
  ?>
  <div class="row"><center><a href="{{ url(route('product.productmaintenance', ['id' =>$str])) }}"><div class="button_wrapper btn btn-w-m btn-success" style="max-width:149px; background-color:#0099CC;height:30px;">Zipper Pulls<div class="tooltip2"><img src="{{ asset('/img/zipper.png') }}"></div></div></a></center></div>


 <?php
 foreach($subgroupdetails as $subgrouplist)
 {
     $productdetails=App\ProductDetails::where('CustomerID','=',$sidebarid)->where('ProductGroupID','=',$subgrouplist->id)->get();
     
     if(count($productdetails)){
 ?>
 <!-- <div class="selectlables col-md-4">
                 <a href="{{ url(route('product.productmaintenance', ['id' => $subgrouplist->id])) }}"><center><img src="{{ asset('/img/image-sample.jpg') }}"></center>
                 <h5>{{$subgrouplist->ProductGroup}}</h5></a>
                 </div> -->
 
   
 <?php }
 }
 ?>

</div>


</div>

@endsection 