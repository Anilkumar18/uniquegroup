@extends('admin.layouts.productdevelopmentdashboard')
<?php
error_reporting(0);
?>
@section('content')
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
 @if(count($productsubgroupdetails) > 0)
  <button class="clsdropbtn">{{$groupdetails->ProductGroup}} &nbsp;<span class=" fa fa-chevron-down"></span></button>
  <div class="clsdropdown-content">
    @foreach($productsubgroupdetails as $subgrouplist)
     <a href="{{ url(route('admin.listofproducts',['id'=>$subgrouplist->id]))}}">{{$subgrouplist->ProductSubGroupName}}</a>
     @endforeach
  </div>
  @else
  <button class="clsdropbtn"><a href="{{ url(route('admin.viewgrouplist',['id'=>$groupdetails->id]))}}">{{$groupdetails->ProductGroup}}</a></button>
  @endif
</div>
</div>
@endforeach

</div>
@endsection 