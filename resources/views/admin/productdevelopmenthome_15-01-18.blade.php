@extends('admin.layouts.productdevelopmentdashboard')
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
	width: 183px;
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
    min-width: 183px;
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
<h5>Product Maintenance-Product Development</h5>
</div>
<div class="ibox-title productibox-title">
<div class="col-lg-12 clsprodhomedd">

</div>
@foreach($productgrouplist as $groupdetails)
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
<?php
  $productgroupid=$groupdetails->id;
   $productsubgroupdetails=App\ProductSubGroup::where('Product_groupID','=',$productgroupid)->get();
 ?>
  <button class="clsdropbtn">{{$groupdetails->ProductGroup}} &nbsp;<span class=" fa fa-chevron-down"></span></button>
  <div class="clsdropdown-content">
    @foreach($productsubgroupdetails as $subgrouplist)
     <a href="{{ url(route('admin.listofproducts',['id'=>$subgrouplist->id]))}}">{{$subgrouplist->ProductSubGroupName}}</a>
     @endforeach
  </div>
</div>
</div>
@endforeach

</div>
@endsection 