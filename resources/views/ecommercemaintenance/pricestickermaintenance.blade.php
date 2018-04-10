@extends('ecommercemaintenance.layouts.pricesticker')

@section('content')


<div class="headerlink">
<h5> >PDM Maintenance</h5>
</div>
<div class="ibox-title" id="maintenancedashboard" style="display:none;">

 
           <div class="form-group">

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Customer Maintenance &nbsp; <span class=" fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.customers')) }}">Customers</a>

                             <a href="{{ url(route('admin.customerusers')) }}">Customer User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Vendor Maintenance &nbsp; <span class=" fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.vendors')) }}">Vendors</a>

                             <a href="{{  url(route('admin.vendorusers')) }}">Vendor User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Unique Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.uniquefacility')) }}">Unique Facilities</a>

                             <a href="{{  url(route('admin.uniqueusers')) }}">Unique User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Product Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                            <?php
                            //print_r($user->customerID);
                            if($user->userTypeID==9)
                            {
                              $customerdetails=App\Customers::where('id','=',$user->customerID)->get();
                            }else
                            $customerdetails=App\Customers::all();
                          foreach($customerdetails as $customers)
                          {
                          ?>
                             <a href="{{  url(route('admin.producthome',['sidebarid'=>$customers->id])) }}">{{$customers->CustomerName}}</a>
                           <?php
                           }
                           ?>

                            
                          </div>

                                             

              </div>

              <div class="dropdown col-lg-2">

                    <a href="{{  url(route('admin.productdevelopmenthome')) }}"><button class="dropbtn">PDM Maintenance&nbsp; <span class="fa fa-chevron-down"></span></button></a>

                    <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.pdmproductgroups')) }}">Product Group & <br /> Sub Group</a>

                             <a href="">User Type</a>

                             <a href="{{ url(route('admin.mktproductionregions')) }}">Marketing & <br /> Production Regions</a>

                             <a href="{{ url(route('admin.productdetails')) }}">Production Details</a>

                             <a href="{{ url(route('admin.productdevelopmenthome'))}}">Product Development</a>

                          </div>                           

              </div>


           </div>
           
    
           
          
           </div>
 <div class="ibox-title" id="pdmdashboard" style="display:block;">

   <div class="col-lg-8">
                    <h2>Price Sticker Maintenance</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Home</a>
                        </li>
                        
                        <li>
                            Customer Name ::  <strong>Marks</strong>
                         </li>
                        
                        <li class="active">
                            <strong>Price Maintenance</strong>
                        </li>
                         </ol>
                    
                  
                </div>
              <a href="" class=" button fa fa-plus productpricesticker" data-toggle="modal" data-target="#myModal">Add New</a>





      <div class="row"  style="visibility: hidden">
                               <div class="col-sm-12 columns12" >
                                <div class="form-group">
                                           <div class="col-sm-6 columns12">
                                                   <label class="col-lg-8 productgrouplabel"></label>
                                                   <div class="col-lg-4 productgroupbtn">
       <a href="" data-toggle="modal" data-target="#myModal" class='productpricesticker'><button class="btn btn-success clsdropbtn_productgroup">Add New</button> </a>    

                                                 </div>
                                           </div>
                                  </div>
                                </div> 
        </div>



<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                
                                    <div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Price Sticker Maintenance</h4>
                                           <p>Just fill in your Price Sticker Maintenance details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                       <form name="productgroupsmaintenanceadd" id="productgroupsmaintenanceadd" method="post" action="{{ url(route('admin.add_productstore')) }}" class="form-horizontal">      {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                         <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">PO Name</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="poName" id="poName" placeholder="PO name" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Colour Code</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="colorCode" id="colorCode" placeholder="Color code" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>

                             <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Basic Color</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="basicColor" id="basicColor" placeholder="Basic color" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">French</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="frenchColor" id="frenchColor" placeholder="French" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div> 
                           
                           <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Fall 16 All Colour</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="fallallColour" id="fallallColour" placeholder="Fall 16 all colour" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">7B-Outerwear</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="outerWear" id="outerWear" placeholder="7B-outerwear" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                            <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">3A-Active</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="activeColor" id="activeColor" placeholder="3A-active" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">3A-Sleepwear</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="sleepWear" id="sleepWear" placeholder="3A-sleepwear" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                           <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">3F-Healthwear</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="healthWear" id="healthWear" placeholder="3F-healthwear" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>  
                                    <input type="hidden" name="status" id="status" value="1" />
                             <input type="hidden" value="addColor" name="siteurl" id="siteurl" class="form-control">
                              <input type="hidden" name="editID" id="editID" />
                              <input type="hidden"  name="EditchainID" id="EditchainID"  />
                               </div>
                               <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>

                               <input type="submit" name="productgroupsmaintenancesubmit" id="productgroupsmaintenancesubmit" class="btn savebtn" value="Save">
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
    </div>
</div>
</div>


<div class="modal inmodal" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                
                                    <div class="chain_bg">
                                
                                        <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Price Sticker Maintenance</h4>
                                           <p>Just fill in your Price Sticker Maintenance details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                        <form name="productgroupsmaintenanceadd" id="viewpricestickermaintain" method="post" action="" class="form-horizontal">     {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                         <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">PO Name</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="name" id="viewponame" placeholder="PO name" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Colour Code</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="color" id="viewcolorcode" placeholder="Color code" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>

                             <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Basic Color</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="basicColor" id="viewbasiccolor" placeholder="Basic color" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">French</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="frenchColor" id="viewfrenchcolor" placeholder="French" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div> 
                           
                           <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Fall 16 All Colour</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="fallallColour" id="viewfallallcolour" placeholder="Fall 16 all colour" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">7B-Outerwear</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="outerWear" id="viewouterwear" placeholder="7B-outerwear" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                            <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">3A-Active</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="activeColor" id="viewactivecolor" placeholder="3A-active" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">3A-Sleepwear</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="sleepWear" id="viewsleepwear" placeholder="3A-sleepwear" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                           <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">3F-Healthwear</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="healthWear" id="viewhealthwear" placeholder="3F-healthwear" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>  
                              
                               </div>
                               <div class="modal-footer">
                            
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
    </div>


  <div class="row wrapper wrapper-content animated fadeInRight">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        

                                   

                

                     
                
                    <div class="ibox-content">

                        <div class="table-responsive">
                        
                        <form name="thisForm" id="thisForm" method="get" action="admin.get_productstore">
                        
                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead> 
                          <tr>
  <th><input name="select_all" value="1" type="checkbox"></th>
                       <!-- <th>Color ID</th>-->
                         <th>PO Name</th>
                        <th>Colour Code</th>
                        <th>Basic Color</th>
                         <th>French</th>
                        <th>Actions</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                   <tbody>
      
                        <?php  
              $productgroupdetail=\App\Pricesticker::get();
               
                        ?>
                        <tr>
    @foreach($productgroupdetail as $productdetaillist)   
                 <td><input name="select_all" value="1" type="checkbox"></td>
                  <td>{{ $productdetaillist->poName }}</td>
                  <td>{{ $productdetaillist->colorCode}}</td>
                  <td>{{ $productdetaillist->basicColor}}</td>
                  <td>{{ $productdetaillist->frenchColor}}</td>
                     <td>
                        <!-- <a class="editcustomers" href="{{url(route('admin.get_pricestickercolor', ['id' => $productdetaillist->id]))}}"><img src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  -->
                        
                       <a href="" class="viewspricesticker" data-toggle="modal" data-id="{{$productdetaillist->id}}" data-target="#viewModal" data-selecthref="{{url(route('admin.view_pricestickermaintenance', ['id'=>$productdetaillist->id]))}}"><img  src="{{ asset('/img/view.png') }}"  border="0"  title="Activate"/></a>



                        <a href="" data-toggle="modal" data-target="#myModal" data-selecthref="{{url(route('admin.get_pricestickercolor', ['id' => $productdetaillist->id]))}}" class="fillpricesticker"><img src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

         <span class="deletecustomers" data-href="{{url(route('admin.delete_pricestickercolor', ['id' => $productdetaillist->id]))}}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
          
   @if ($productdetaillist->status==0)
          <span class="activatsymbol"><a data-href="{{ url(route('admin.stickersymbolactive',['id' => $productdetaillist->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
 @else
      <span class="deactivatesymbol"><a data-href="{{ url(route('admin.stickersymboldeactive',['id' => $productdetaillist->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 
 @endif

                        </td>
              
                              <td>
            @if ($productdetaillist->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                      @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                        @endif  
                        </td>
                    </tr>
    @endforeach 


                    </tbody>
                         </table>
                       </form>
                     </div>
</div>
</div>



@endsection 