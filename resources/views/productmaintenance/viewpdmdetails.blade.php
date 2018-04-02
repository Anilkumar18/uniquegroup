@extends('admin.layouts.customer')



@section('content')



<div class="wrapper wrapper-content animated fadeInRight">

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



<div class="row">

<div class="col-lg-12">
<h2> View Development /Product Details</h2>
<div class="col-lg-12 ecommerce-maintenance">
         <div class="blkcontainer">
           <div class="row">
             <div class="col-md-6 left-cont">
             <h3>E-commerce Product Maintenance Mark's
             </h3>
              <ul class="buttons">
                <li><button class="btn-primary csv-opt">CSV</button></li>
                <li><button class="btn-primary excel-opt">Excel</button></li>
                <li><button class="btn-primary pdf-opt">PDF</button></li>
                <li><button class="btn-primary print-opt">Print</button></li>
               </ul>
              </div>
          <div class="col-md-6 right-cont">
            <div class="back-cont">
               <a href="{{ URL::previous() }}" class="btn-primary back-opt">Back</a>
                 </div>
             
  
            </div>
        </div>
      </div>
       <div class="col-lg-12 product-info-form">
      <div class="blkcontainer">
  <div class="panel product-info-panel">
    <div class="panel-body panel-header">PRODUCT INFORMATION</div>
  </div>
</div>
<div class="blkcontainer">
  <form class="form-row" action="/action_page.php">
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Product Group</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Unique Product Code</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
      <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Product Sub-group</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="desc">Description</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Brand</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="status">Status</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="program">Program Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="pro-proces">Product Process</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="cus-pro-name">Customer Product Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="version">Version</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
     <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Customer Product Code</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
  </form>
  <button class="btn-success edit-opt" style="margin-bottom:20px; float:right">Edit</button>
</div>

  </div>
 
    <div class="col-lg-12 product-detail-form">
      <div class="blkcontainer">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS</div>
  </div>
  </div>
  <div class="blkcontainer">
  <form class="form-row" action="/action_page.php">
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Raw Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Print Type</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
      <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="desc">CMYK</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Thickness</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 1</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="program">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="pro-proces">Cutting</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="cus-pro-name">Height</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="version">Printing Finishing Process</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
     <div class="blkform-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    
  <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region 1</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
     <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region 2</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
     <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory 1</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
     <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory 2</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
     <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Currency</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
     <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sample Costing</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
</div>
</div>
  <div class="col-lg-12 product-images">
      <div class="blkcontainer">
  <div class="panel Image-panel">
    <div class="panel-body panel-header">IMAGE</div>
  </div>
  <div class="blkcontainer">
  <div class="img-thumbnail" style="width:150px; height:150px;"></div>
  <button class="browse-opt">Browse</button>
  </div>
</div>
</div>
       <div class="col-lg-12 inventory-info-form" style="margin-top:20px;">
      <div class="blkcontainer">
  <div class="panel inventory-panel">
    <div class="panel-body panel-header">INVENTORY INFORMATION</div>
  </div>
</div>
<div class="blkcontainer">
  <form class="form-row" action="/action_page.php">
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Type of inventory</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Maximum pieces on stock</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
      <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Projection</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="desc">Minimum pieces on stock</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Production Region</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
  <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Unique Factory</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
  </form>
  <button class="btn-success edit-opt" style="margin-bottom:20px; float:right">Edit</button>
</div>

  </div>
  <div class="col-lg-12 quote-cost-form">
      <div class="blkcontainer">
  <div class="panel quote-cost-panel">
    <div class="panel-body panel-header">QUOTE AND COSTING</div>
  </div>
</div>
<div class="blkcontainer">
  <form class="form-horizontal" action="/action_page.php">
    <div class="blkform-group ">
      <label class="control-label col-md-2" for="Pricing Method">Pricing Method</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>

  <div class="blkform-group">           
        <div class=" col-md-2" style="font-weight:bold; padding-left:30px;">
         <label style="font-weight:bold;">Quantity</label>
        </div>
              <div class="col-md-4" class="form-control" style="font-weight:bold;">
            Cost
      </div>
    </div>
  <div class="blkform-group">           
        <div class="checkbox col-md-2">
          <label><input type="checkbox" name="quantity">3K</label>
        </div>
              <div class="col-md-4">
            <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
    
  <div class="blkform-group">           
        <div class="checkbox col-md-2">
          <label><input type="checkbox" name="quantity">5K</label>
        </div>
              <div class="col-md-4">
            <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
      <div class="blkform-group">           
        <div class="checkbox col-md-2">
          <label><input type="checkbox" name="quantity">10K</label>
        </div>
              <div class="col-md-4">
            <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
      <div class="blkform-group">           
        <div class="checkbox col-md-2">
          <input type="checkbox" name="quantity">25K
        </div>
              <div class="col-md-4">
            <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
      <div class="blkform-group">           
        <div class="checkbox col-md-2">
          <label><input type="checkbox" name="quantity">100K</label>
        </div>
              <div class="col-md-4">
            <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
      <div class="blkform-group">           
        <div class="checkbox col-md-2">
          <label><input type="checkbox" name="quantity">Other</label>
        </div>
              <div class="col-md-4">
            <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
       <div class="blkform-group ">
      <label class="control-label col-md-2" for="Pricing Method">Unit of measurement</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
       <div class="blkform-group ">
      <label class="control-label col-md-2" for="Pricing Method">Currency</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
       <div class="blkform-group ">
      <label class="control-label col-md-2" for="Pricing Method">Minimum Order Quantity</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
       <div class="blkform-group ">
      <label class="control-label col-md-2" for="Pricing Method">Minimum Order Value</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
       <div class="blkform-group ">
      <label class="control-label col-md-2" for="Pricing Method">Pack Size</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>
       <div class="blkform-group ">
      <label class="control-label col-md-2" for="Pricing Method">Sample Cost</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method">
      </div>
    </div>

<div class="col-lg-6 costing-requirement">
<h4>
Costing Requirement
</h4>
<div class="row">
<div class="blkform-group col-md-4">
 <label class="control-label col-sm-6" for="email">Ex works:</label>
      <div class="col-sm-6">
        <input type="checkbox" name="quantity">
      </div>
</div>
<div class="blkform-group col-md-4">
 <label class="control-label col-sm-6" for="email">Fright cost:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-4">
 <label class="control-label col-sm-6" for="email">Currency:</label>
      <div class="col-sm-6">
        <select class="selectpicker">
  <option>India</option>
  <option>Japan</option>
  <option>America</option>
</select>

      </div>
</div>
</div>
<div class="row">
<div class="blkform-group col-md-4">
 <label class="control-label col-sm-6" for="email">Ex works:</label>
      <div class="col-sm-6">
       <input type="checkbox" name="quantity">
      </div>
</div>
<div class="blkform-group col-md-4">
 <label class="control-label col-sm-6" for="email">Fright cost:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-4">
 <label class="control-label col-sm-6" for="email">Currency:</label>
      <div class="col-sm-6">
     <select class="selectpicker">
  <option>India</option>
  <option>Japan</option>
  <option>America</option>
</select>
      </div>
</div>
</div>
</div>
  </form>
  
  
</div>
</div>
       <div class="col-lg-12 selling-price-form">
      <div class="blkcontainer">
  <div class="panel selling-price-panel">
    <div class="panel-body panel-header">SELLING PRICE</div>
  </div>
</div>


<div class="blkcontainer">
<div class="col-lg-12 unit-measurement">
<form class="form" action="/action_page.php">
<div class="row">

<div class="blkform-group col-md-3">
<h5>Unit of Measurements</h5>
 <label class="control-label col-sm-6" for="email">Margin</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="col-md-12" style="border-bottom:1px solid #c1c1c1">

</div>
</div>

<div class="row"  style="margin-top:20px;">
<div class="blkform-group col-md-3">

      <div class="col-sm-12" style="font-weight:bold">
        Quantity
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12" style="font-weight:bold">
     Cost
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12" style="font-weight:bold">
        Selling Price
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12" style="font-weight:bold">
        Margin%
      </div>
</div>
      </div>
<div class="row">
<div class="blkform-group col-md-3">

      <div class="col-sm-12">
         <label><input type="checkbox" name="quantity">3K</label>
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
      </div>
      <div class="row">
<div class="blkform-group col-md-3">

      <div class="col-sm-12">
         <label><input type="checkbox" name="quantity">5k</label>
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
      </div>
      <div class="row">
<div class="blkform-group col-md-3">

      <div class="col-sm-12">
         <label><input type="checkbox" name="quantity">10K</label>
      </div>
</div>
<div class="blkform-group col-md-3">

      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
      </div>
      
      </form>

</div>
       <button class="btn-success edit-opt" style="margin:20px 0px; float:right">Edit</button>
</div>
</div>
   <div class="col-lg-12 selling-price-form">
      <div class="blkcontainer">
  <div class="panel sample-details-panel">
    <div class="panel-body panel-header">SAMPLE DETAILS</div>
  </div>
      <div class="row">
      <div class="col-md-6">
<div class="blkform-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Sample Requested Date</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Number of samples required</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Sample Lead Time</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Production Lead Time</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Remarks / Special Instrucions</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="blkform-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Raw Material</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
</div>
<div class="col-md-6">
<div class="blkform-group col-md-12">
   <label class="control-label col-md-8" for="pro-grp">Reference file upload</label>
      <div class="col-sm-4">
     <input type="submit"  style="margin-left:-60px;" class="form-control" value="Browse" name="browse">
      </div>
</div>

<div class="blkform-group col-md-12">
   <div class="img-thumbnail" style="width:250px; height:250px; display:none;">
</div>
</div>
</div>
      </div>
</div>
</div>
</div>


</div>
</div>
</div>





         

@endsection



