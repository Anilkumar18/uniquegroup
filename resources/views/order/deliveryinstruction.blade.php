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
<?php $deliveryaddressdetails = DB::table('deliveryaddress')->where('status', '=','1')->get();
$deliverybilldetails = DB::table('billaddress')->where('status', '=','1')->get();
$deliveryorderdetails = DB::table('orderdeliverymethod')->where('status', '=','1')->get();

$deliveryaccountdetails = DB::table('deliveryaccountno')->where('status', '=','1')->get();
 ?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Delivery Instruction</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Home</a>
                        </li>
                        
                        <li class="active">
                            <strong>Add Delivery Instruction </strong>
                        </li>
                        
                    </ol>
                </div>
                <div class="col-lg-2">
                    <div class="title-action">
                                            </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="logoutSucc box-success"></div>
                </div>
                
            </div>

<div class="row wrapper wrapper-content animated fadeInRight">
            
                <div class="ibox float-e-margins">
                    <!--<div class="ibox-title">
                        <h5 class="btn btn-primary headingstrip" style="padding-left:10px;">Capture Delivery Instruction</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                          
                           
                        </div>
                    </div>-->
                   <!-- <div class="ibox-content">-->
                    
                        <div class="">
                            
                        <form name="deliveryinstradd" id="deliveryinstradd" method="post" class="form-horizontal" action="{{url(route('order.deliveryinstruction'))}}">
                             {{ csrf_field() }}
                            
                            <input type="hidden" id="productTypetxt" name="productTypetxt" value="build">
                            <div class="row">
                           
                            <div class="col-sm-12">
                                    <div class="form-group">
                                    <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Vendor/Customer PO Number: *</label>
                                    <div class="col-lg-4">
                                    <input type="text" name="customerOrdernum" id="customerOrdernum" placeholder="Vendor/Customer PO Number" class="form-control" value="">
                                    </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Vendor Name/Factory:</label>
                                    <div class="col-lg-4">
                                    <input type="text" name="vendorNumber" id="vendorNumber" placeholder="Vendor name" class="form-control empty_textbox" value="">
                                   
                                    </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Paying Party: *</label>
                                    <div class="col-lg-4">
                                   <select name="payingParty" id="payingParty" class="form-control dropdownwidth">
                                    <option value="1">Vendor</option>
                                    <option value="2">Factory</option>
                                    </select>
                                    </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Delivery Date (ex factory): *</label>
                                    <div class="col-lg-4">
                                     <div class="form-group" id="data_1">
                                         
                                            <div class="input-group date picker_size">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input id="deliveryDate" name="deliveryDate" type="text" value="" class="form-control required empty_textbox" placeholder="MM/DD/YYYY" style="margin-left:0px;" readonly="" aria-required="true">
                                            </div>
                                           </div>
                                    </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Deliver to: *</label>
                                    <div class="col-lg-4"><div class="form-group">
                                        <div class="col-lg-12 add_addresss">
                                        <select name="deliveryTo" id="deliveryTo" class="form-control empty_textbox valid dropdownwidth" aria-required="true" aria-invalid="false">
                                          <option value=""> Please Select Factory1</option>
                                  @foreach($deliveryaddressdetails as $addresslist)
                                   <option value="{{$addresslist->id}}">{{$addresslist->DeliveryAddress}}</option> 
                                   @endforeach 
                                        </select>
                                    </div>
                                </div>
                            </div>
                                    <div class="col-lg-1">
                                     <span style="padding-left:1px;"><a href="" class="regionLink btn btn-primary btn-sm fa fa-plus" data-regionid="" data-toggle="modal" data-target="#myregionLinks" style="margin-left:-20px; margin-top: 6px;"> Add Address</a></span>
                                     </div>
                                     <div class="col-lg-2">
                                     <span style="padding-left:1px;" ><button type="button" class="deleteaddress btn btn-danger btn-sm fa fa-trash-o" data-href="{{url(route('order.deletedeliveryadddress'))}}" style="margin-left:10px; margin-top: 6px;"> Delete Address</button></span>
                                     </div>
                                    </div>
                           </div>
                        </div>
                        
                                                
                        
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group 123">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Bil to Address: *</label>
                                    <div class="col-lg-4 billaddr_field"><div class="form-group"><div class="col-lg-12 add_billaddress">
                                     <select name="billtoAddress" id="billtoAddress" class="form-control empty_textbox valid dropdownwidth" aria-invalid="false">
                                       <option value=""> Please Select Bill Address</option>
                                  @foreach($deliverybilldetails as $addressbilllist)
                                   <option value="{{$addressbilllist->id}}">{{$addressbilllist->BillAddress}}</option> 
                                   @endforeach   
                                     </select>
                                 </div></div></div>
                                    <div class="col-lg-1">
                                     <span style="padding-left:1px;"><a href="" class="regionLink btn btn-primary btn-sm fa fa-plus" data-regionid="" data-toggle="modal" data-target="#myregionLinks1" style="margin-left:-20px; margin-top: 6px;"> Add Address</a></span>
                                     </div>
                                     <div class="col-lg-2">
                                     <span style="padding-left:1px;"><button type="button" class="deleteaddressB btn btn-danger btn-sm fa fa-trash-o" data-href="{{url(route('order.deletebilladddress'))}}" style="margin-left:10px; margin-top: 6px;"> Delete Address</button></span>
                                     </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Bill to Telephone:</label>
                                    <div class="col-lg-4">
                                    <input type="text" name="billtoTelephone" id="billtoTelephone" placeholder="Bill to telephone" class="form-control empty_textbox" value="">
                                    </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Contact: *</label>
                                    <div class="col-lg-4">
                                   <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control empty_textbox" value="">
                                    </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Email Address: *</label>
                                    <div class="col-lg-4">
                                    <input type="email" name="emailAddress" id="emailAddress" placeholder="Email address" class="form-control empty_textbox" value="">
                                    </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Delivery Method: *</label>
                                    <div class="col-lg-4 dmethod_field">
                                    <select name="deliveryMethod" id="deliveryMethod" class="form-control dropdownwidth empty_textbox valid" aria-required="true" aria-invalid="false">
                                    <option value="">Please select a Delivery Method</option>
                                    @foreach($deliveryorderdetails as $addressorderlist)
                                   <option value="{{$addressorderlist->id}}">{{$addressorderlist->OrderDeliveryMethod}}</option> 
                                   @endforeach   
                                    
                                                                          
                                     </select>
                                    </div>
                                    <div class="col-lg-1">
                                     <span style="padding-left:1px;"><a href="" class="regionLink btn btn-primary btn-sm fa fa-plus" data-regionid="" data-toggle="modal" data-target="#mydeliveryMethod" style="margin-left:-20px; margin-top: 6px;"> Add Method</a></span>
                                     </div>
                                     <div class="col-lg-2">
                                     <span style="padding-left:1px;"><button type="button" class="deletemethod btn btn-danger btn-sm fa fa-trash-o" data-href="{{url(route('order.deletedeliverymethod'))}}" style="margin-left:10px; margin-top: 6px;"> Delete Method</button></span>
                                     </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Delivery Account No:</label>
                                    <div class="col-lg-4 accno_field">
                                    <select name="deliveryAccountNo" id="deliveryAccountNo" class="form-control empty_textbox dropdownwidth">
                                    <option value="">Please select a Delivery Account No</option>
                                    @foreach($deliveryaccountdetails as $addressaccountlist)
                                   <option value="{{$addressaccountlist->id}}">{{$addressaccountlist->DeliveryAccountNo}}</option> 
                                      @endforeach                                   
                                     </select>
                                    </div>
                                    <div class="col-lg-1">
                                     <span style="padding-left:1px;"><a href="" class="regionLink btn btn-primary btn-sm fa fa-plus" data-regionid="" data-toggle="modal" data-target="#myAccountNo" style="margin-left:-20px; margin-top: 6px;"> Add Account</a></span>
                                     </div>
                                     <div class="col-lg-2">
                                     <span style="padding-left:1px;"><button type="button" class="deleteaccno btn btn-danger btn-sm fa fa-trash-o" data-href="{{url(route('order.deletedeliveryaccount'))}}" style="margin-left:10px; margin-top: 6px;"> Delete Account</button></span>
                                     </div>
                                    </div>
                           </div>
                        </div>
                        
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                                    <div class="form-group">
                                     <div class="col-sm-1"></div>
                                    <label class="col-lg-4 control-label text-left font-noraml">Comments / Special Requirements / Delivery Instructions:</label>
                                    <div class="col-lg-4">
                                    <textarea name="specialInstriction" id="specialInstriction" placeholder="Comments / special Requirements / delivery Instructions" class="form-control empty_textbox"></textarea>
                                    </div>
                                    </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                            <div class="form-group">
                            <div class="col-lg-1"></div>
                            
                                   <div class="col-lg-2"> <input id="confirmdetails" name="confirmdetails" type="checkbox"> </div>
                                   <div class="col-lg-6"> <label for="confirmdetails" class="font-noraml"> * Please click here to confirm that all delivery details are correct. If the bill to details are incorrect please contact your regional office to correct the details.</label></div>
                                      
                          
                           </div></div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-sm-12">
                            <div class="form-group">
                            <div class="col-lg-1"></div>
                            
                                    
                                       <div class="col-lg-2"><input id="acceptTerms" name="acceptTerms" type="checkbox"> </div>
                                       <div class="col-lg-6"><label for="acceptTerms" class="font-noraml">* I have read and agree to the <a href="termsofuse/termsandconditions.pdf" target="_blank" style="color:#29abe2;">terms of use</a> for this site.</label></div>
                                      
                           </div></div>
                        </div>
                        
                      
                        
                         <div class="col-sm-4 col-sm-offset-10">
                    <input type="submit" name="deliveryinstrsubmit" id="deliveryinstrsubmit" class="btn btn-primary" value="Submit Order">
                    </div>
                           </form>
                    
                    </div>

                  <!--  </div>-->
                </div>
            
            
        </div>

<div class="modal inmodal" id="myregionLinks" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                <div class="chain_bg">
                                
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title title_bar">Add New Delivery Address</h4>
                                            
                                          <p>Customer Name: <strong></strong></p>
                                        </div>
                                        <form name="regiondetailsadd" id="regiondetailsadd" method="post" class="form-horizontal">

                                             {{ csrf_field() }}
                                        <div class="modal-body">
                                
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Address:</label>
                                    <div class="col-lg-8"> 
                                    <textarea name="deliveryaddress" id="deliveryaddress" placeholder="Address" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                                                           
                                        </div>
                                        <input id="addressurl" name="addressurl" type="hidden" value="{{url(route('order.addressdelivery'))}}"/>
                                        <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                               <button type="button" class="btn savebtn" name="addresssubmit" id="addresssubmit"  data-dismiss="modal">Save</button>
                               </div>
                                        
                               
                                        </form>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="modal inmodal1" id="myregionLinks1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                <div class="chain_bg">
                                
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title title_bar">Add New Bill  Address</h4>
                                            
                                          <p>Customer Name: <strong></strong></p>
                                        </div>
                                        <form name="regiondetailsadd1" id="regiondetailsadd1" method="post" class="form-horizontal">
                                           {{ csrf_field() }} 
                                        <div class="modal-body">
                                
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Address:</label>
                                    <div class="col-lg-8"> 
                                    <textarea name="billaddress" id="billaddress" placeholder="Address" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                              
                              
                                        </div>
                                        <input id="addressurl1" name="addressurl1" type="hidden" value="{{url(route('order.addressbill'))}}"/>
                                        <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                                <button type="button" class="btn savebtn" name="billsubmit" id="billsubmit"  data-dismiss="modal">Save</button>
                               </div>
                                        
                               
                                        </form>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="modal inmodal" id="mydeliveryMethod" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                <div class="chain_bg">
                                
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title title_bar">Add New Delivery Method</h4>
                                            
                                          <p>Customer Name: <strong></strong></p>
                                        </div>
                                        <form name="regiondetailsadd2" id="regiondetailsadd2" method="post" class="form-horizontal">
                                        <div class="modal-body">
                                
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Delivery Method:</label>
                                    <div class="col-lg-8"> 
                                    <textarea name="dmethod" id="dmethod" placeholder="Delivery Method" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                                                            
                                        </div>
                                         <input id="addressurl2" name="addressurl2" type="hidden" value="{{url(route('order.deliverymethodorder'))}}"/>
                                        <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                                <button type="button" class="btn savebtn" name="dmethodsubmit" id="dmethodsubmit"  data-dismiss="modal">Save</button>
                               </div>
                                        
                               
                                        </form>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal inmodal" id="myAccountNo" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                <div class="chain_bg">
                                
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title title_bar">Add New Delivery Account No</h4>
                                            
                                          <p>Customer Name: <strong></strong></p>
                                        </div>
                                        <form name="regiondetailsadd3" id="regiondetailsadd3" method="post" class="form-horizontal">
                                        <div class="modal-body">
                                
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Delivery Account No:</label>
                                    <div class="col-lg-8"> 
                                    <textarea name="DelaccNo" id="DelaccNo" placeholder="Delivery Account No" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                               <input type="hidden" value="" name="customerid" id="customerid">
                               
                                <input type="hidden" value="" name="supplier_code" id="supplier_code">
                              
                                        </div>
                                        <input id="addressurl3" name="addressurl3" type="hidden" value="{{url(route('order.deliveryaccount'))}}"/>
                                        <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                                <button type="button" class="btn savebtn" name="AccNosubmit" id="AccNosubmit"  data-dismiss="modal">Save</button>
                               </div>
                                        
                               
                                        </form>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
@endsection 