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
<?php
if($customername->id==3)
{
?>
<img src="<?php echo asset('img/marks_logo.png') ?>" width="100px" />

</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
  <button class="clsdropbtn">Packaging &nbsp;<span class=" fa fa-chevron-down"></span></button>
  <div class="clsdropdown-content">
    
  </div>
</div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
  <button class="clsdropbtn">Labels &nbsp;<span class="fa fa-chevron-down"></span></button>
  <div class="clsdropdown-content">
   <!-- <a href="#">Printed Labels</a>
    <a href="#">Care Labels</a>
    <a href="{{ url(route('admin.heattransfers'))}}">Heat Transfers</a>-->
     <?php
 $subgroupdetails=App\ProductSubGroup::where('Product_groupID','=',2)->get();
 ?>
 <?php
 foreach($subgroupdetails as $subgrouplist)
 {
     
 ?>
 <a href="{{ url(route('admin.heattransfers',['id'=>$subgrouplist->id]))}}">{{$subgrouplist->ProductSubGroupName}}</a>
 
	 
 <?php
 }
 ?>
  </div>
</div>
</div>



<div class="col-lg-12 clsprodhomedd">

<div class="clsdropdown">
  <button class="clsdropbtn">Hang Tags</button>

</div>

</div>

<div class="col-lg-12 clsprodhomedd">

<div class="clsdropdown">
  <button class="clsdropbtn">Taps</button>

</div>

</div>

<div class="col-lg-12 clsprodhomedd">

<div class="clsdropdown">
  <button class="clsdropbtn">Zipper Pullers</button>
</div>

</div>

<div class="col-lg-12 clsprodhomedd">

<div class="clsdropdown">
  <button class="clsdropbtn">Variable Data<span class=" fa fa-chevron-down"></span></button>
  <div class="clsdropdown-content">
    <a href="#">Price Stickers</a>
  </div>
</div>

</div>

<div class="col-lg-12 clsprodhomedd">

<div class="clsdropdown">
  <button class="clsdropbtn">Miscellaneous<span class=" fa fa-chevron-down"></span></button>
  <div class="clsdropdown-content">
    <a href="#">Hanger With Size</a>
  </div>
</div>

</div>

</div>
<?php
}
?>
@endsection 