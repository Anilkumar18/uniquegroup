@extends('admin.layouts.heattransfers')

@section('content')
<link href="{{ asset("/css/plugins/sweetalert/sweetalert.css")}}" rel="stylesheet">
<div class="wrapper wrapper-content animated fadeInRight">
<div class="col-lg-12">
					<div class="logoutSucc" style="margin-top: 10px;">

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
<div class="col-lg-12 clsbreadcrumb">
  <?php
  
$productsubgroupid=$_GET['id'];
$productsubgroupdetails=App\ProductSubGroup::where('id','=',$productsubgroupid)->first();

$productgroupdetails=App\ProductGroup::where('id','=',$productsubgroupdetails->Product_groupID)->first();


Session::put('groupname', $productgroupdetails); 

Session::put('subgroupname', $productsubgroupdetails); 
  
  
$customerdetails=Session::get('customername');
	?>
       <p> > Product Maintenance - <?php echo $customerdetails->CustomerName; ?> - <?php echo $productgroupdetails->ProductGroup; ?> - <?php echo $productsubgroupdetails->ProductSubGroupName; ?></p>
</div>
<?php
if($productsubgroupid==17)
{
?>
<div class="col-lg-12 clsaddnewvendorform">
<button class="button addnewvendor" onclick="location.href='{{ url(route('admin.viewheattransfers'))}}'">Add New Heat Transfers</button>
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
                      
                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" >
                      <h5 style="margin-left:762px; font-size:11px;">View all |&nbsp;Export Results-Excel File| &nbsp;Print Current Page</h5>
                    @if (count($heattransfers) > 0)
                    <thead>
                    <tr>
                        <th style="width:10%; font-size:12px; padding:5px 5px;">Brand</th>                        
                        <th style="width:12.5%; font-size:12px; padding:5px 5px;">Program Name</th>
                        <th style="width:12.5%; font-size:12px; padding:5px 5px;">Customer Product Name</th>  
                        <th style="width:10%; font-size:12px; padding:5px 5px;">Customer Product Code</th>    
                        <th style="width:10%; font-size:12px; padding:5px 5px;">Prodution Region</th>      
                        <th style="width:10%; font-size:12px; padding:5px 5px;">Inventory</th>    
                        <th style="width:10%; font-size:12px; padding:5px 5px;">Unique Factory Inventory</th>   
                        <th style="width:10%; font-size:12px; padding:5px 5px;">ArtWork</th>                                   
                        <th style="width:35%; font-size:12px; padding:5px 5px;">Actions</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    @foreach($heattransfers as $heattransfers_list)                        
                    <?php
					$i++;  				
                    $status=$heattransfers_list->status;					
					
					
                    ?>
                    <tr class="gradeX">
                        <td>{{$heattransfers_list->Brand}}</td>
                        <td>{{$heattransfers_list->ProgramName}}</td>                        
                         <td>{{$heattransfers_list->CustomerProductName}}</td> 
                         <td>{{$heattransfers_list->CustomerProductCode}}</td> 
                          <td>{{$heattransfers_list->ProductionRegions}}</td>    
                       <td>{{$heattransfers_list->InventoryID}}</td>  
                       <td>{{$heattransfers_list->OfficeFactoryName}}</td>     
                         <td>{{$heattransfers_list->Artworkupload }}</td>                            
                        <td><a href="javascript:;" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a><span class="selectcustomers" data-href="javascript:;"  data-valueid="{{ $heattransfers_list->ProdID }}" style="padding-left: 18px;"><a href="javascript:;"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                         <span class="deleteheattransfers" data-href="javascript:;"  data-valueid="{{ $heattransfers_list->ProdID }}" style="padding-left: 12px;"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                       
                   
                          
                        </td>
                        
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Heat Transfer(s) Found</td></tr>
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
        
         <?php
		 }else{
		 ?>
         <div class="gradeC" style="color:#FF0000; text-align:center;">
         No Products Found
         </div>
         <?php
		 }
		 ?>
          </div>
@endsection

