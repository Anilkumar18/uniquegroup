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

<div class="col-lg-12 clsbreadcrumb">
<?php
$productgroupdetail=\App\ProductGroup::where('id', $productdetails[0]->ProductGroupID)->first();
                     ?>
       <p> > Product Maintenance -{{$productgroupdetail->ProductGroup}}</p>

</div>

@if($productdetails[0]->ProductGroupID==12)

@include('productmaintenance.zipperpuller')
@else



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

                        <th class="customer_th">Product Code</th>                        

                        <th class="contact_first_th">Customer Name</th>

                                                           

                        <th class="action_th">Actions</th>
                        <th class="action_th">Status</th>

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($productdetails as $productdetailss_list)                        
<tr>
                    <td>{{ $productdetailss_list->UniqueProductCode }}</td>
                    <?php
$customer=\App\Customers::where('id', $productdetailss_list->CustomerID)->first();
                     ?>
                    <td>{{ $customer->CustomerName }}</td>
                    <td>

                        <a class="editcustomers" href="javascript:;" ><img src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a> 

                       

                        

                        <span class="deletecustomers" data-href="javascript:;"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>

                                           

       

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



