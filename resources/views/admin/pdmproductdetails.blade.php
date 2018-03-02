@extends('admin.layouts.pdmproductdetails')

@section('content')
<?php
error_reporting(0);
?>
@section('content')

<link href="{{ asset("/css/plugins/sweetalert/sweetalert.css")}}" rel="stylesheet">


<div class="col-lg-12">
    <div class="logoutSucc" style="margin-top: 10px;"> @if (session('success'))
      <div class="alert alert-success" role="success"> <span class="fa fa-exclamation-circle" aria-hidden="true"></span> {{ session('success') }} </div>
      @endif
      
      @if (session('error'))
      <div class="alert alert-danger" role="danger"> <span class="fa fa-exclamation-circle" aria-hidden="true"></span> {{ session('error') }} </div>
      @endif </div>
  </div>
<div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">

                <div class="col-lg-12">
                
                <div class="col-lg-12 clsbreadcrumb">
                    	<div class="col-lg-10">>PDM Maintenance- Product Details</div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{ url(route('admin.pdmhome'))}}'">Home</button></div>
                    </div>

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}
                             
                         <!--Packaging-->
                    
                            
                             
                       
                       
                          <?php
                         
              
              foreach($productdetaillist as $productdetails)
              {
              
              
              ?>
                        <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft"> 
                            <thead>
                                   
                            </thead>
                            <tbody>
           
                   
                    
                   <div class="productgroupdiv">
                        <tr class="gradeX">
                            <td class="maingroupnamewidth">
                           
                            {{$productdetails->categoryname}}
                           
              </td>
                            <!-- <td>
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productdetails.edit', ['id' => $productdetails->id])) }}"  href="" class="editproductdetailscategory" data-id="{{ $productdetails->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                            
                                                     <span class="deleteproductgroup" data-href="{{ url(route('productdetails.delete', ['id' => $productdetails->id])) }}"  data-valueid="{{ $productdetails->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td> -->
                            
                        </tr>
                        
                        
                   
    </tbody>
    

</table>
                        <table class="table table-striped table-bordered table-hover dataTables-example tablegroupright"> 
    <thead>
           
    </thead>
    <tbody>
                      <?php
                           $productdetailsid=$productdetails->id;
                $productfielddetails=App\ProductDetailFields::where('categoryID','=',$productdetailsid)->where('status','=',1)->get();
              
              ?>
                          @foreach($productfielddetails as $fieldlist)
                        <tr class="gradeX">
                            <td class="maingroupnamewidth">{{$fieldlist->fieldname}}</td>
                            <td>
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productdetails.edit', ['id' => $fieldlist->id])) }}"  href="" class="editproductdetailscategory" data-id="{{ $fieldlist->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                            
                                                     <span class="deleteproductdetailscategory" data-href="{{ url(route('productdetails.delete', ['id' => $fieldlist->id])) }}"  data-valueid="{{ $fieldlist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
          <div class="cleardiv"></div>
                        </div>
                        <?php
            
                      }
            ?>
                    
                   
                  <div class="row">
                               <div class="col-sm-12 columns12" >
                                <div class="form-group">
                                            <div class="col-sm-6" class="columns12">
                                                   <label class="col-lg-8 productsubgrouplabel"></label>
                                                   <div class="col-lg-4 productsubgroupbtn">
                                                  <a href="" data-toggle="modal" data-target="#myModal"><button class="clsdropbtn_productgroup productsubgroup" id="addproductdetailsbutton"> Add New Field</button> </a></div>
                                           </div>
                                   
                                  </div>
                                </div> 
                            </div>
                    
                      
                       
                        
                        


                    </form>

                    

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
                                            <h4 class="modal-title title_bar">Edit Field Name</h4>
                                           <p></p>
                                            <small class="font-bold"></small>
                                        </div>
                                        <form name="add_productdetailsadd" id="add_productdetailsadd" method="post" action="{{ url(route('admin.add_productdetails')) }}" class="form-horizontal">     {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Category</label>
                                                <div class="col-lg-8">
                                              
                                               <select name="productdetailcategory" id="productdetailcategory" class="form-control required"  style="border: solid 1px #1AB394;">
                                                          <option value="">Please select the Category</option>
                                                         @foreach($productdetaillist as $productgroups)
                                                        <option value="{{$productgroups->id }}">{{ $productgroups->categoryname }}</option>
                                                       @endforeach 
                                                       </select>
                                                </div>
                                                <label class="col-lg-4 control-label font-noraml text-left">Edit Field Name:</label>
                                                <div class="col-lg-8">
                                                <input type="text" name="fieldname" id="fieldname" placeholder="Group Name" class="form-control">
                                               <input type="hidden" value="addproductgroupmaintenance" name="siteurl" id="siteurl">
                                               <input type="hidden" name="editID" id="editID" />
                                                </div>
                                                </div>
                                       </div>
                                       </div>
                                       
                          
                              
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
                            <div class="modal inmodal" id="productionModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                
                                    <div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Production Region</h4>
                                           <p>Just fill in your marketing region details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                        <form name="productionregionadd" id="productionregionadd" method="post" action="{{ url(route('admin.add_productionregionregion')) }}" class="form-horizontal">     {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Production Region:</label>
                                                <div class="col-lg-8">
                                                <input type="text" name="productionregionName" id="productionregionName" placeholder="Group Name" class="form-control">
                                               <input type="hidden" value="addproductgroupmaintenance" name="siteurl" id="siteurl">
                                               <input type="hidden" name="productioneditID" id="productioneditID" />
                                                </div>
                                                </div>
                                       </div>
                                       </div>
                                       
                          
                              
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
@endsection 