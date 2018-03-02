@extends('admin.layouts.pdmproducts')
<?php
error_reporting(0);
?>
@section('content')



<div class="headerlink">
<h5> >PDM Maintenance-Product Development-<?php echo $productgroupdetails->ProductGroup;?>-<?php echo $productsubgroupdetails->ProductSubGroupName;?> Table</h5>
</div>


<div class="col-lg-12">
    <div class="logoutSucc" class="notification"> @if (session('success'))
      <div class="alert alert-success" role="success"> <span class="fa fa-exclamation-circle" aria-hidden="true"></span> {{ session('success') }} </div>
      @endif
      
      @if (session('error'))
      <div class="alert alert-danger" role="danger"> <span class="fa fa-exclamation-circle" aria-hidden="true"></span> {{ session('error') }} </div>
      @endif </div>
  </div>
<div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive" style="overflow-x:hidden">

                      

                   <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft" > 
    <thead>
            <tr>
                <th>Column Name</th>                         
                <th>
                   Options
                </th>    
            </tr>
    </thead>
    <tbody>
  
  
            @if (count($columnsname) > 0)
                    @foreach($columnsname as $listofcolunmns) 
                        <tr class="gradeX">
                         
                         @if($listofcolunmns->popup==1 && $listofcolunmns->status==1)
                            <td>
                           
                            {{$listofcolunmns->fieldname}}
                           
                            </td>
                          
                            
                            <td>
                      
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsdropdownoptions.edit', ['id' => $listofcolunmns->id])) }}" data-valueid="{{ $listofcolunmns->fieldname }}" href="javascript:;"  class="showfieldnames" data-id="{{ $listofcolunmns->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit1.png') }}" border="0"  title="Edit" style="width:9%"/></a>
                              
                              
                                <span class="deletemaingroupdelete" data-href="{{ url(route('listofproducts.delete', ['id' => $listofcolunmns->id])) }}"  data-valueid="{{ $listofcolunmns->id }}"><a href="javascript:;"> <img  src="{{ asset('/img/close.png') }}" border="0"  title="Delete" class="productdevelopmentdelete" /></a></span>
                            </td>
                          @else
                             <td>
                           
                            {{$listofcolunmns->fieldname}}
                           
                            </td>
                              <td>
                            
                           
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('fieldnamelist.select', ['id' => $listofcolunmns->id])) }}"  href="javascript:;" class="editfieldnames" data-id="{{ $listofcolunmns->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit1.png') }}" border="0"  title="Edit" style="width:9%"/></a>
                              
                                <span class="deletemaingroupdelete" data-href="{{ url(route('listofproducts.delete', ['id' => $listofcolunmns->id])) }}"  data-valueid="{{ $listofcolunmns->id }}"><a href="javascript:;"> <img  src="{{ asset('/img/close.png') }}" border="0"  title="Delete" class="productdevelopmentdelete"/></a></span>
                            </td>
                            @endif
                            
                        </tr>
                    @endforeach 
    </tbody>
    <tfoot>
            @else
                <tr class="gradeC"><td colspan="5" class="nocolumnfound">No Table Columns Found</td></tr>
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

                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                
                                    <div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">DropDown Options Maintenance</h4>
                                           <p>Just fill in your dropdown options and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                          @if($productsubgroupdetails->id==0 || $productsubgroupdetails->id=="")
                                      <form name="dropdownoptionsadd" id="dropdownoptionsadd" method="post" action="{{ url(route('admin.updateallfieldnames',['id'=>$productgroupdetails->id])) }}" class="form-horizontal">   
                                     @else
                                     <form name="dropdownoptionsadd" id="dropdownoptionsadd" method="post" action="{{ url(route('admin.updateallfieldnames',['id'=>$productsubgroupdetails->id])) }}" class="form-horizontal">   
                                     @endif
                                         
                                        
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                        @if($productsubgroupdetails->id==0 || $productsubgroupdetails->id=="")
                                     <span id="editproductid" style="display:none;">{{ url(route('admin.addfieldnames',['id'=>$productgroupdetails->id]))}}</span>
                                  <!--   <span id="deleteproductid" style="display:none;">{{ url(route('listofproducts.delete',['id'=>$productgroupdetails->id]))}}</span>-->
                                   <span id="deleteproductid" style="display:none;">{{ url(route('productsdropdownoptions.deletedropdownvaluetablename'))}}</span>
                                     @elseif($productsubgroupdetails->id!="")
                                       <span id="editproductid" style="display:none;">{{ url(route('admin.addfieldnames',['id'=>$productsubgroupdetails->id]))}}</span>
                                     <span id="deleteproductid" style="display:none;">{{ url(route('listofproducts.delete',['id'=>$productsubgroupdetails->id]))}}</span>
                                     @endif
                                     
                              <span id="editurlid" style="display: none;">{{ url(route('editproductsdropdownoptions.edit'))}}</span>
                              <span id="deleteurlid" style="display: none;">{{ url(route('productsdropdownoptions.delete'))}}</span>
                              <span id="assetimageedit" style="display: none;">{{ asset('/img/edit1.png') }}</span>
                              <span id="assetimageloading" style="display: none;">{{ asset('/img/editon1.png') }}</span>
                            <span id="assetimageupdate" style="display: none;">{{ asset('/img/save.png') }}</span>
                            <span id="assetimagedelete" style="display: none;">{{ asset('/img/close.png') }}</span>
                            <span id="assetimageadd" style="display: none;">{{ asset('/img/add-file.png') }}</span>
                                      
                                       <table class="table table-striped table-bordered table-hover dataTables-example"> 
                                 <tbody class="fieldcolumn">
                                 
                         
                            
                       
                    <tr class="gradeX" id="addnewtextbtn">
                    <td>
                     <input type="text" name="tablecontent1" id="tablecontent1" class="tablecontent1" placeholder="Add New" />
                    </td>
                    </tr>
    </tbody>
    <tfoot style="display:none;">
           
                <tr class="gradeC"><td colspan="5" class="nocolumnfound">No Table Columns Found</td></tr>
            
    </tfoot>

</table>
                                       
                                       
                          
                              
                               </div>
                               <div class="modal-footer addnewbtns">
                          <!--  <button type="button" name="products" id="addnewproducts" class="btn savebtn">Save</button>-->
                          <button type="button" class="btn addmorerow">Add More</button>
                         <!--  <input type="submit" name="addnewproducts" id="addnewproducts" class="btn savebtn" value="Save" /> -->
                          <button type="submit" name="addnewproducts" id="addnewproducts" class="btn closebtn1">Save</button>
                          <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
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
                                            <h4 class="modal-title title_bar">Fields Names Maintenance</h4>
                                           <p>Just fill in your product group details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                              
                             @if($productsubgroupdetails->id==0 || $productsubgroupdetails->id=="")
                                     <form name="updatefieldsnames" id="updatefieldsnames" method="post" action="{{ url(route('admin.addfieldnames',['id'=>$productgroupdetails->id]))}}" class="form-horizontal">  
                                     @else
                                     <form name="updatefieldsnames" id="updatefieldsnames" method="post" action="{{ url(route('admin.addfieldnames',['id'=>$productsubgroupdetails->id]))}}" class="form-horizontal"> 
                                     @endif
                            
                             {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">FieldName:</label>
                                                <div class="col-lg-8">
                                                <input type="text" name="fieldname" id="fieldname" placeholder="Field Name" class="form-control">
                                               <input type="hidden" name="fieldeditID" id="fieldeditID" />
                                                </div>
                                                </div>
                                       </div>
                                       </div>
                                       
                          
                              
                               </div>
                               <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                               <input type="submit" name="fieldnamemaintenancesubmit" id="fieldnamemaintenancesubmit" class="btn savebtn" value="Save">
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                            </div>                           
                            
@endsection 