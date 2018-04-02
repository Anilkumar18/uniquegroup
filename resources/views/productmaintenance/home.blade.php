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
<h2> Product Maintenance</h2>
<div class="col-lg-12 clsbreadcrumb">
<?php
$productgroupdetail=\App\ProductGroup::where('id', $productdetails[0]->ProductGroupID)->first();
$productsubgroupdetail=\App\ProductSubGroup::where('id', $productdetails[0]->ProductSubGroupID)->first();

$productsubgroupname=isset($productsubgroupdetail->ProductSubGroupName)?$productsubgroupdetail->ProductSubGroupName:'';
$carelabel=$carestatus!=0?'Care':'';
                     ?>
       <p> Home/ <span>Product Maintenance/</span>
        <span>{{$productgroupdetail->ProductGroup}}</span>
        @if($productsubgroupname)
        <span>/ {{$productsubgroupname}}</span>
        @endif
        @if($carelabel)
        <span>/ {{$carelabel}}</span>
        @endif
    </p>

</div>

@if($productdetails[0]->ProductGroupID==12)

@include('productmaintenance.zipperpuller')
@else

<span class="tabletitile">{{$productsubgroupname}} {{$productgroupdetail->ProductGroup}} List</span>

 <div class="col-lg-12 clsaddnewvendorform">

            <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

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

                        <th class="customer_th">Brand</th>                        
                        <th class="customer_th">Product Name</th>                        
                        <th class="customer_th">Product Code</th>                        
                        <th class="customer_th">Unique Product Code</th>                        
                        <th class="customer_th">Thumbnail</th>                        
                        <th class="customer_th">Status</th>                        

                        <th class="action_th">Actions</th>
                        <th class="action_th">Condition</th>

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($productdetails as $productdetailss_list)                        
<tr>
                    <td>{{ $productdetailss_list->Brand }}</td>
                    <td>{{ $productdetailss_list->ProgramName }}</td>
                    <td>{{ $productdetailss_list->CustomerProductCode }}</td>
                    <td>{{ $productdetailss_list->UniqueProductCode }}</td>
                    <td><img id="sampleimg" src="{{ route('user.productpic', ['id' => $productdetailss_list->id]) }}" alt="your image" width="80" height="80" /></td>
                    <?php
$status=\App\Status::where('id', $productdetailss_list->ProductStatusID)->first();
                     ?>
                    <td>{{ $status->StatusName }}</td>
                    <td>

                        <a class="editcustomers" href="javascript:;" ><img src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a> 

                       

                        

                        <a href="{{ url(route('product.viewpdmdetailsmaintenance', ['id' =>$productdetailss_list->id])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a>

                       
                        @if($productdetailss_list->status)
                        <span class="deactive " data-href="javascript:;"><a href="javascript:;"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactive"/></a></span>
                        @else
                         <span class="activepdm" data-href="javascript:;"><a href="javascript:;"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Active"/></a></span>
                         @endif
                                           

       

                        </td>
                    <td>@if($productdetailss_list->status)
                        <img src="{{ asset('/img/active.gif') }}">
                        @endif</td>
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

@endif
</div>
</div>
</div>





         

@endsection



