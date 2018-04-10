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
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn"><a href="{{ url(route('admin.getcarelist'))}}">Language Maintenance</a></button>
  </div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn"><a href="{{ url(route('admin.getcarelist'))}}">Size Maintenance</a></button>
  </div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn"><a href="{{ url(route('admin.getcarelist'))}}">Country of Origin Maintenance</a></button>
  </div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn">Care Instruction Maintenance &nbsp;<span class=" fa fa-chevron-down"></span></button>
  <div class="clsdropdown-content">
         <a href="{{ url(route('admin.getcarelist'))}}">Paper bags</a>
          <a href="{{ url(route('admin.getcarelist'))}}">Fabric bags</a>
          <a href="{{ url(route('admin.getcarelist'))}}">Poly bags</a>
          <a href="{{ url(route('admin.getcarelist'))}}">Boxes</a>
          <a href="{{ url(route('admin.getcarelist'))}}">Ribbons</a>
          
       </div>
  </div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn"><a href="{{ url(route('admin.getcarelist'))}}">Fabric Composition Maintenance</a></button>
  </div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn"><a href="{{ url(route('admin.getcarelist'))}}">Garment Components Maintenance</a></button>
  </div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn"><a href="{{ url(route('admin.getcarelist'))}}">Care sets Maintenance</a></button>
  </div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn"><a href="{{ url(route('admin.getcarelist'))}}">Caution Maintenance</a></button>
  </div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn"><a href="{{ url(route('admin.getcarelist'))}}">Copyright Maintenance</a></button>
  </div>
</div>
<div class="col-lg-12 clsprodhomedd">
<div class="clsdropdown">
   <button class="clsdropbtn"><a href="{{ url(route('admin.getcarelist'))}}">Special Instruction Maintenance</a></button>
  </div>
</div>



</div>
@endsection 