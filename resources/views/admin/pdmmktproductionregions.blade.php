@extends('admin.layouts.pdmmktproductionregions')

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
                    	<div class="col-lg-10"> >PDM Maintenance- Mkt & Production Regions</div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{ url(route('admin.pdmhome'))}}'">Home</button></div>
                    </div>

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive" style="overflow-x:hidden">

                      

                   <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 50%;float: left;" > 
    <thead>
            <tr>
                <th>Marketing Regions</th>                         
                <th>
                    <a href="" data-toggle="modal" data-target="#regionModal"><button class="clsdropbtn_productgroup marketingregions"> Add New</button> </a>
                </th>    
            </tr>
    </thead>
    <tbody>
            @if (count($mktdetails) > 0)
                    @foreach($mktdetails as $mktlist) 
                        <tr class="gradeX">
                            <td>{{ $mktlist-> MarketingRegions }}</td>
                            <td>
                                <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('marketregions.edit', ['id' => $mktlist->id])) }}" href="" class="editregion" data-id="{{ $mktlist->id }}" data-toggle="modal" data-target="#regionModal"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                                <span class="deletemarketingregion" data-href="{{ url(route('marketregions.delete', ['id' => $mktlist->id])) }}"  data-valueid="{{ $mktlist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                    @endforeach 
    </tbody>
    <tfoot>
            @else
                <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Market Region Found</td></tr>
            @endif
    </tfoot>

</table>
<table class="table table-striped table-bordered table-hover dataTables-example " style="width: 50%;float: right;"> 
    <thead>
            <tr>
                <th>Production Regions</th>                         
                <th>
                    <a href="" data-toggle="modal" data-target="#productionModal"><button class="clsdropbtn_productgroup productionregions"> Add New</button> </a>
                </th>    
            </tr>
    </thead>
    <tbody>
            @if (count($productiondetails) > 0)
                    @foreach($productiondetails as $productionlist) 
                        <tr class="gradeX">
                            <td>{{ $productionlist-> ProductionRegions }}</td>
                            <td>
                                <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productionregions.edit', ['id' => $productionlist->id])) }}" href="" class="editproductionregion" data-id="{{ $productionlist->id }}" data-toggle="modal" data-target="#productionModal"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                                <span class="deleteproductionregion" data-href="{{ url(route('productionregions.delete', ['id' => $productionlist->id])) }}"  data-valueid="{{ $productionlist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                    @endforeach 
    </tbody>
    <tfoot>
            @else
                <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Production Region Found</td></tr>
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
<div class="modal inmodal" id="regionModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                
                                		<div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Marketing Region</h4>
                                           <p>Just fill in your marketing region details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                        <form name="marketingregionadd" id="marketingregionadd" method="post" action="{{ url(route('admin.add_marketingregion')) }}" class="form-horizontal">     {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Marketing Region:</label>
                                                <div class="col-lg-8">
                                                <input type="text" name="regionName" id="regionName" placeholder="Region Name" class="form-control">
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
                                                <input type="text" name="productionregionName" id="productionregionName" placeholder="Region Name" class="form-control">
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