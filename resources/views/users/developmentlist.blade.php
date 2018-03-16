@extends('users.layouts.developmentlist')

<?php
error_reporting(0);

?>
@section('content')

<div class="col-lg-12">
                        <img class="dashboard-mainimg"  src="{{ asset("/img/test2.png")}} " />
                        
                    </div>
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
<div class="col-lg-12">
            
                <div class="wrapper wrapper-content">
                
                 <div class="row"><div class="col-lg-12">

                  <center></center></div></div></br>

                  <div class="col-lg-12"> > Development List</div></br></br>

                                   


                  <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    
                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive" style="overflow: scroll;">

                      <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1400px; height: 100px;"> <?php //echo '<pre>'; print_r($uniqueusers); exit; ?>

                     
                       @if (count($productlist) > 0)

                      <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
                       <th>Development No</th>
                        <th>Customer</th>

                        <th>Brand</th> 

                        <th>Program Name</th>  

                       <th>Customer Product Name</th>                                    

                        <th>Customer Product Code</th>

                        <!-- <th>Unique Product Group</th> -->

                        <th>Unique Product code</th>

                        <th>Products</th>

                        <th>Status</th>

                       <!--  <th>Product Process</th> -->

                        <th>Version</th>

                        <th>Sample Requested Date</th>

                        <th>Number of Samples Requested</th>

                        <th style="width:120px;">Actions</th>

                        

                    </tr>

                    </thead>
                    <tbody>

                    <?php
					
					//print_r($productlist);exit;
					?>

                    @foreach($productlist as $list)                        

                    <?php 

                  
                    $customers=App\Customers::where('id','=',$list->CustomerID)->first();

                    
                    $productprocess=App\ProductProcess::where('id','=',$list->ProductProcessID)->first();

                    $status=App\Status::where('id','=',$list->status)->first();
				
				      $list->ProductSubGroupID;
	               
				   $productsubgroupdetails=App\ProductSubGroup::where('id','=',$list->ProductSubGroupID)->first();
				   
				   $developmentid = str_pad($list->id, 4, '0',STR_PAD_LEFT);
				  
                    
                    ?>

                    <tr class="gradeX">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td>{{$list->CustomerProductName}}</td> 

                        <td>{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td>{{$list->UniqueProductCode}}</td>
<!-- vidhya:02032018 -->
                        <td>
                       <?php
              if($list->BoxID!="" && $list->BoxID<>0)
              {

             echo "Boxes"; echo "<br>";       
              }
					   if($list->HookID!="" && $list->HookID<>0)
             {

					   echo "Hook";echo "<br>";
             }
					   if($list->TissuePaperID!="" && $list->TissuePaperID<>0)
             {

					   echo "Tissue Paper";echo "<br>";
             }
					   if($list->PackagingStickersID!="" && $list->PackagingStickersID<>0)
             {

					   echo "Packaging Stickers";echo "<br>";
             }
					   ?>
                        </td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                       <td class="version_duplicate">{{$list->Version}}</td>

                        <td>{{$list->SampleRequestedDate}}</td>

                        <td>{{$list->NumberOfSamplesRequired}}</td>



                        <td class="processdetails">

                       <a href="{{ url(route('product.productlistdetailsedit', ['id' => $list->id])) }}" class="editrawmaterial"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  

                         <span class="developmentduplicate" data-href="{{ url(route('user.developmentlistduplicate', ['id' => $list->id])) }}" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                     

                        <span class="selectuniqueusers"><a href="{{ url(route('user.developmentproductdetails', ['id' => $list->id])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                        <span class="deletedevelopmentlist" data-href="{{ url(route('user.developmentlistdelete', ['id' => $list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        </td>

         <!-- vidhya:02032018 -->               

                    </tr>

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Development List Found</td></tr>

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

            </div>






@endsection

