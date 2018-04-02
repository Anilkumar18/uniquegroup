<div class="col-lg-12 clsaddnewvendorform">

            <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <!-- /*Vidhya:27-03-2018
    //Add zipper color insert code*/ -->
                       <div class="title-action">
                        <a href="" class="btn btn-primary fa fa-plus addnewlabelprint" data-toggle="modal" data-target="#myModal"> Add Zipper Color</a>
                    </div> 

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive">

                     
                    <table id="example" class="table table-striped table-bordered table-hover dataTables-example">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->

                    @if (count($productdetails) > 0)
                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                        <th class="customer_th">Product Code</th>                        

                        <th class="contact_first_th">Customer Name</th>
                        <th>Zipper Color</th>
                        <th>Zipper Images</th>
                                                           

                        <th class="action_th">Actions</th>
                        <th class="action_th">Status</th>

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($zippercolordetails as $productdetailss_list)   

                    
 
<tr>
  <?php 
  
$customer=\App\Customers::where('id', $productdetailss_list->customerID)->first();
$product=\App\ProductDetails::where('id', $productdetailss_list->productID)->first();
                     ?>
                    <td>{{$product->UniqueProductCode}}</td>
                    
                    
                    <td>{{ $customer->CustomerName }}</td>

                    <td>{{$productdetailss_list->zipperColor}}</td>
                    <td><img src="{{ route('product.zippercolor', ['id' => $productdetailss_list->id]) }}" width="100"/></td>
                    <td>

                        <a class="editzippers" data-href="{{ url('/') }}" data-selecthref="{{ route('product.editzippercolor', ['id' => $productdetailss_list->id]) }}" data-toggle="modal" data-valueid="{{ $productdetailss_list->id }}" data-target="#myModal"><img src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a> 

                       

                        

                        <a class="deletezippercolor" data-href="{{ url(route('product.zippercolordelete', ['id' => $productdetailss_list->id])) }}"><span  data-valueid="{{ $productdetailss_list->id }}"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a>
@if ($productdetailss_list->status==0)
                        
                        <span class="activatezip"><a data-href="{{ url(route('product.zipactivenew',['id' => $productdetailss_list->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
                        @else
                         <span class="deactivatezip"><a data-href="{{ url(route('product.zipdeactivenew',['id' => $productdetailss_list->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 
                         @endif
                                           

       

                        </td>
                    <td> @if ($productdetailss_list->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif 
                      </td>
</tr>
                       
                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="4">No Product Maintenance(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>

                    </div>

                    </form>

          </div>

      </div>

     </div>

  </div>
</div>

<!-- /*Vidhya:27-03-2018
    //Add zipper color insert code*/ -->
    
<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content animated bounceInRight">
                                
                                        <div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Zipper Color Maintenance</h4>
                                           <p>Just fill in your label color details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                   <form name="addzipper" id="addzipper" method="post" action="{{url(route('product.addnewzippercolor'))}}" class="form-horizontal" enctype="multipart/form-data">    
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                        <?php $customer=\App\Customers::where('id', $customerid->id)->get(); ?>
                                       <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Customer Name<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-8">
                                               <select id="chainname" name="chainname">
                                                  <option value="">Please select </option>
                                                @foreach($customer as $listnew)
                                                 <option value="{{$listnew->id}}">{{$listnew->CustomerName}}</option>
                                                @endforeach
                                                  </select>
                                               
                                                </div>
                                                </div>
                                          </div> 
                                          <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Product Code<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-8">
                                               <select id="productcode" name="productcode">
                                                  <option value="">Please select </option>
                                                @foreach($productdetails as $productdetailss_list)
                                                 <option value="{{$productdetailss_list->id}}">{{$productdetailss_list->UniqueProductCode}}</option>
                                                 @endforeach
                                                
                                                  </select>
                                               
                                                </div>
                                                </div>
                                          </div>                                    
                                      
                                       
                                       
                                                                              
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Color<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-8">
                                              <input type="text" name="color" id="color" class="form-control" placeholder="Color" value="" />
                                               
                                                </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Item Description<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-8">
                                              <input type="text" name="itemdesc" id="itemdesc" class="form-control" placeholder="Item Description" value=""/>
                                               
                                                </div>
                                                </div>
                                            </div>
                                            
                                       </div>
                                       </div>
                                       
                                       <div class="row">
                                          <div class="col-sm-12">
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Product Image</label>
                                    <div class="col-lg-8">
                                    <input type="file" name="productImage" id="productImage" placeholder="Product image" class="form-control fbfile" onchange="subbrandimage();" value="">
                                    </div>
                                    </div>
                                       </div> 
                                        <div class="col-sm-6">
                                       <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Cost USD</label>
                                    <div class="col-lg-8">
                                     <input type="text" name="productCost" id="productCost" placeholder="cost" class="form-control" value="">    
                                    </div>
                                    </div> 
                                    </div>  
                                            
                                            
                                       </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12">
                                          <div class="col-sm-6">
                                       <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Selected Image</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="selectimage" id="selectimage" class="form-control selectimage" value="" readonly="readonly">
                                    <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" readonly="readonly" >
                                    
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                          <div class="col-sm-12">
                                          <div class="col-sm-6">
                        <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Selling Price</label>
                                    <div class="col-lg-8">
                                    <input type="text" name="sellingPrice" id="sellingPrice" placeholder="Selling price" class="form-control" value="">  
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Pack Size</label>
                                    <div class="col-lg-8">
                                     <input type="text" name="packSize" id="packSize" placeholder="Pack size" class="form-control" value=""> 
                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                                       
                                       
                                   
                              
                               </div>
                               <!-- <input type="text" name="edit_value" id="edit_value"> -->
                               
                               <input type="hidden" name="editid" id="editid">
                              
                               <input id="zipperURL" name="zipperURL" type="hidden" value="{{url(route('product.addnewzippercolor'))}}"/>
                               <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn savebtn" name="zippercolorsubmit" id="zippercolorsubmit" >Save</button>
                             <!--  <input type="submit" name="officesubmit" id="officesubmit" class="btn savebtn" value="Save">-->
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                            </div>