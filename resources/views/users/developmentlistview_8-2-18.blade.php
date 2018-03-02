@extends('users.layouts.developmentitemlist')

@section('content')


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

                  <div class="col-lg-12"> > Development List View</div></br></br>

                                   


                  <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    
                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive" style="overflow: scroll;">

                      <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1800px; height: 100px;"> <?php //echo '<pre>'; print_r($uniqueusers); exit; ?>

                     <!-- <h5 style="font-size:11px;">View all |&nbsp;Export Results-Excel File| &nbsp;Print Current Page</h5>-->
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

                        <th>Artwork</th>

                        <th>Status</th>

                       <!--  <th>Product Process</th> -->

                        <th>Version</th>

                        <th>Sample Requested Date</th>

                        <th>Unique Factory</th>

                        <th>Quote Required</th>

                        <th>Sample Number</th>

                        <th>Sample Date Arrival</th>

                        <th>Comments</th>

                        <th style="width:140px;">Actions</th>

                        

                    </tr>

                    </thead>

                    <?php //print_r($path);exit; ?>
                    <tbody>

                    

                    @foreach($productlist as $list)                        

                    <?php 

                   
                    $customers=App\Customers::where('id','=',$list->CustomerID)->first();

                    
                    $productprocess=App\ProductProcess::where('id','=',$list->ProductProcessID)->first();

                    $status=App\Status::where('id','=',$list->status)->first();

                    //print_r($path);
                    $concatimg = $path .'/'. $list->Artworkupload;
                    //$filePath = base_path()."/storage/app/".$list->Artworkupload;


                    //print_r($concatimg);

                    //$artworkphoto = explode(',', $list->Artworkupload);
                    //print_r($artworkphoto);
                        /* $productid = $list->id;


                         foreach($artworkphoto as $artimg)
                         {
                          $imageSrc = $files  . '/' . $artimg;
                          //echo $imageSrc;
                         }*/
						   $developmentid = str_pad($list->id, 4, '0',STR_PAD_LEFT);
						   //$list->created_at;
                                             ?>
                     @if($list->HookID!="")

                    <tr class="gradeX">

                        <td>{{ $developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td>{{$list->CustomerProductName}}</td> 

                        <td>{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td>{{$list->UniqueProductCode}}</td>

                        <td></td>

                        <td><img src="{{ route('user.productpic', ['id' => $list->id]) }}" width="150"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td>{{$list->Version}}</td>

                        <td>{{$list->SampleRequestedDate}}</td>

                        <td></td>

                        <td></td>

                        <td>{{$list->QuoteRequired}}</td>

                        <td>{{ $list->created_at }}</td>

                        <td>
                        
                       
                        </td>


                        <td>

                        <a class="edituniqueusers" href="" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  

                        <a class="edituniqueusers" href="" ><img  src="{{ asset('/img/file.png') }}" border="0"  title="Edit"/></a>                      

                        <span class="selectuniqueusers"><a href=""><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                        <span class="deleteclick" data-href=""><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        </td>

                        

                    </tr>
                    
                    @endif
                    
                    @if($list->TissuePaperID!="")
                    <tr class="gradeX">

                        <td>{{ $developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td>{{$list->CustomerProductName}}</td> 

                        <td>{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td>{{$list->UniqueProductCode}}</td>

                        <td></td>

                        <td><img src="{{ route('user.productpic', ['id' => $list->id]) }}" width="150"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td>{{$list->Version}}</td>

                        <td>{{$list->SampleRequestedDate}}</td>

                        <td></td>

                        <td></td>

                        <td></td>

                        <td>{{$list->created_at}}</td>

                        <td></td>


                        <td>

                        <a class="edituniqueusers" href="" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  

                        <a class="edituniqueusers" href="" ><img  src="{{ asset('/img/file.png') }}" border="0"  title="Edit"/></a>                      

                        <span class="selectuniqueusers"><a href=""><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                        <span class="deleteclick" data-href=""><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        </td>

                        

                    </tr>
                    
                    @endif
                    
                    @if($list->PackagingStickersID!="")
                    <tr class="gradeX">

                        <td>{{ $developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td>{{$list->CustomerProductName}}</td> 

                        <td>{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td>{{$list->UniqueProductCode}}</td>

                        <td></td>

                        <td><img src="{{ route('user.productpic', ['id' => $list->id]) }}" width="150"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td>{{$list->Version}}</td>

                        <td>{{$list->SampleRequestedDate}}</td>

                        <td></td>

                        <td></td>

                        <td></td>

                        <td></td>

                        <td></td>


                        <td>

                        <a class="edituniqueusers" href="" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  

                        <a class="edituniqueusers" href="" ><img  src="{{ asset('/img/file.png') }}" border="0"  title="Edit"/></a>                      

                        <span class="selectuniqueusers"><a href=""><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                        <span class="deleteclick" data-href=""><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        </td>

                        

                    </tr>
                    
                    
                    @endif

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Unique User(s) Found</td></tr>

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




<div class="modal inmodal" id="changepass" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                
                                    <div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Change My Password</h4>
                                           <p>Just fill in your old password and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                        
                              <form name="changepasswordform" id="changepasswordform" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">  
                                          {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                         
                              <div class="row">
                              <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Old Password</label>
                                    <div class="col-lg-8">                                    
                                    <input type="password" name="oldpassword" id="oldpassword" class="form-control required">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">New Password</label>
                                    <div class="col-lg-8">
                                    <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Re-Enter New Password</label>
                                    <div class="col-lg-8">
                                    <input type="password" name="confirmed" id="confirmed" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                               </div>
                               <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                               <input type="submit" name="changepasswordsubmit" id="changepasswordsubmit" class="btn savebtn" value="Save">
                               </div>
                               </form>
                                        
                                    </div>
                                </div>
                            </div>
                            </div>

@endsection

