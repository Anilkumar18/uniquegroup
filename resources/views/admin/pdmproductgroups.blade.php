@extends('admin.layouts.pdmproductgroups')
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
                    	<div class="col-lg-10"> >PDM Maintenance- Product Group & Sub Group</div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{ url(route('admin.pdmhome'))}}'">Home</button></div>
                    </div>

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}
                             
                         <!--Packaging-->
                    
                            
                            <div class="row">
                               <div class="col-sm-12 columns12" >
                                <div class="form-group">
                                           <div class="col-sm-6 columns12">
                                                   <label class="col-lg-8 productgrouplabel">Product Group</label>
                                                   <div class="col-lg-4 productgroupbtn">
                                                   <a href="" data-toggle="modal" data-target="#myModal"><button class="clsdropbtn_productgroup"> Add New</button> </a></div>
                                           </div>
                                            <div class="col-sm-6" class="columns12">
                                                   <label class="col-lg-8 productsubgrouplabel">Product Sub Group</label>
                                                   <div class="col-lg-4 productsubgroupbtn">
                                                  <a href="" data-toggle="modal" data-target="#myModal1"><button class="clsdropbtn_productgroup productsubgroup"> Add New</button> </a></div>
                                           </div>
                                   
                                  </div>
                                </div> 
                            </div>
                       
                       
                          <?php
                         
							
							foreach($productgrouplist as $groupdetails)
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
                           
                            {{$groupdetails->ProductGroup}}
                           
							</td>
                            <td>
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productgrouplist.select', ['id' => $groupdetails->id])) }}"  href="javascript:;" class="editproductgroup" data-id="{{ $groupdetails->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductgroup" data-href="{{ url(route('productgrouplist.delete', ['id' => $groupdetails->id])) }}"  data-valueid="{{ $groupdetails->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                            
                        </tr>
                        
                        
                   
    </tbody>
    

</table>
                        <table class="table table-striped table-bordered table-hover dataTables-example tablegroupright"> 
    <thead>
           
    </thead>
    <tbody>
                      <?php
                           $productgroupid=$groupdetails->id;
						    $productsubgroupdetails=App\ProductSubGroup::where('Product_groupID','=',$productgroupid)->get();
							
							?>
                          @foreach($productsubgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td class="maingroupnamewidth">{{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
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
                                            <h4 class="modal-title title_bar">Product Group Maintenance</h4>
                                           <p>Just fill in your product group details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                        <form name="productgroupsmaintenanceadd" id="productgroupsmaintenanceadd" method="post" action="{{ url(route('admin.add_productgroup')) }}" class="form-horizontal">     {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">ProductGroupName:</label>
                                                <div class="col-lg-8">
                                                <input type="text" name="groupCode" id="groupCode" placeholder="Group Name" class="form-control">
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
    <div class="modal inmodal" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                
                                		<div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Product SubGroup Maintenance</h4>
                                           <p>Just fill in your product group details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                        <form name="productsubgroupsmaintenanceadd" id="productsubgroupsmaintenanceadd" method="post" action="{{ url(route('admin.add_productsubgroup')) }}" class="form-horizontal">     {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Product Group:</label>
                                                <div class="col-lg-8">
                                              
                                               <select name="productgroup" id="productgroup" class="form-control required"  style="border: solid 1px #1AB394;">
                                                          <option value="">Please select the Product group</option>
                                                         @foreach($productgrouplist as $productgroups)
                                                        <option value="{{$productgroups->id }}">{{ $productgroups->ProductGroup }}</option>
                                                       @endforeach 
                                                       </select>
                                              
                                            
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Packaging-SubGroup:</label>
                                                <div class="col-lg-8">
                                                <input type="text" name="subgroupCode" id="subgroupCode" placeholder="Group Name" class="form-control">
                                               <input type="hidden" value="addproductgroupmaintenance" name="siteurl" id="siteurl">
                                               <input type="hidden" name="editID1" id="editID1" />
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