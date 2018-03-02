@extends('admin.layouts.productdevelopmentdashboard')

@section('content')
<style>
.productibox-title{float:left; /*background-color:#CCCCCC;*/ width:100%;}
.clsdropbtn_pdm {
     background-color: #00AEEF;
    color: white;
    padding: 4px;
    font-size: 13px;
    border: none;
    cursor: pointer;
	width: 185px;
	height:32px;
	border-radius: 5px;
	padding: 4px;
	margin-top: 12px;
}

.clsprodhomedd_pdm {
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
<h5> >PDM Maintenance</h5>
</div>
<div class="ibox-title productibox-title">
<div class="col-lg-12 clsprodhomedd_pdm">
</div>
<div class="col-lg-12 clsprodhomedd_pdm">
<div>
  <button class="clsdropbtn_pdm" onclick="location.href='{{ url(route('admin.pdmproductgroups'))}}'">Product Group & Sub Group</button>
</div>
</div>
<div class="col-lg-12 clsprodhomedd_pdm">
<div>
  <button class="clsdropbtn_pdm">User Type</button>
</div>
</div>
<div class="col-lg-12 clsprodhomedd_pdm">
<div>
  <button class="clsdropbtn_pdm">Mkt & Production Regions</button>
</div>
</div>
<div class="col-lg-12 clsprodhomedd_pdm">
<div>
  <button class="clsdropbtn_pdm">Product Details</button>
</div>
</div>

<div class="col-lg-12 clsprodhomedd_pdm">

<div>
  <button class="clsdropbtn_pdm">Product Development</button>
</div>

</div>

</div>
@endsection 