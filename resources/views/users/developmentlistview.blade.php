@extends('users.layouts.developmentitemlist')
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

                  <div class="col-lg-12">  Development List View</div></br></br>

                                   


                  <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    
                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive" style="overflow-x: scroll;">

                      <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 2000px; height: 100px;"> <?php //echo '<pre>'; print_r($uniqueusers); exit; ?>

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

                    $productsubgroupdetails=App\ProductSubGroup::where('id','=',$list->ProductSubGroupID)->first();

                    $status=App\Status::where('id','=',$list->status)->first();

                    $hooklist =App\Hook::where('id','=',$list->HookID)->first();

//sathish 15-03-2018
$uniqueoffices =App\UniqueOffices::where('id','=',$list->CustomerID)->first();

                  
                    $concatimg = $path .'/'. $list->Artworkupload;
                   
						   $developmentid = str_pad($list->id, 4, '0',STR_PAD_LEFT);
						 
                ?>
                <!-- Vidhya:box display -->
                    @if($list->BoxID!="" && $list->BoxID <> 0)
                      <?php  $str = ltrim($developmentid, '0'); ?>
                      <tr class="gradeX" id="{{$str.'_'.'0'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 
                         <!-- /*vidhya:php
    //add duplicate changes*/ -->

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>{{$productsubgroupdetails->ProductSubGroupName}}
                       </td>

                        <td><img src="{{ route('user.productpic', ['id' => $list->BoxID]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$list->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                        <td>{{$uniqueoffices->OfficeFactoryName}}</td>
<!-- sathish 15-03-2018 -->
                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">
<!-- For only edit link by Rajesh -->
                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'0'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        <!-- Defect No:60 
                            //Vidhya:php team
                            //customerservice add view page -->
                        @if($user->userTypeID!=14)
                    <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'0'.'/'.$list->BoxID])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>    @endif                  

                        <span class=""><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'0'.'/'.'0'])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdelete', ['id' => $list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                     <!-- Vidhya:box display -->   

                    </tr>
                    @endif

                     @if($list->HookID!="" && $list->HookID <> 0)
                      <?php  $str = ltrim($developmentid, '0'); ?>
                      @foreach(explode(',',$list->HookID) as $vv)
                     
                    <tr class="gradeX" id="{{$str.'_'.'1'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>
                       <?php
             if($list->HookID!="")
             echo "Hook";echo "<br>";
            $hooklist =App\Hook::where('id','=',$vv)->first();
             ?></td>

                        <td><img src="{{ route('user.producthookpic', ['id' => $vv]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$hooklist->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                       <td>{{$uniqueoffices->OfficeFactoryName}}</td>
<!-- sathish 15-03-2018 -->
                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">
<!-- For only edit link by Rajesh -->
                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'1'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        <!-- Defect No:60 
                            //Vidhya:php team
                            //customerservice add view page -->
                        @if($user->userTypeID!=14)
                        <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'1'.'/'.$vv])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                      
                        @endif                     

                        <span class=""><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'1'.'/'.$vv])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdeletehook', ['id' => $vv.'/'.$list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                        

                    </tr>
                    
                    @endforeach
                    
                    @endif
                    
                    @if($list->TissuePaperID<>0 && $list->TissuePaperID!="")

                     <?php  $str = ltrim($developmentid, '0'); ?>
                     @foreach(explode(',',$list->TissuePaperID) as $vt)
                    <tr class="gradeX" id="{{$str.'_'.'2'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>
                       <?php
            
             if($list->TissuePaperID!="")
             echo "Tissue Paper";echo "<br>";
             $tisslist =App\Tissuepaper::where('id','=',$vt)->first();
             ?></td>

                        <td><img src="{{ route('user.productpictissue', ['id' => $vt]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$tisslist->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                        <td>{{$uniqueoffices->OfficeFactoryName}}</td>
<!-- sathish 15-03-2018 -->
                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">
<!-- For only edit link by Rajesh -->
                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'2'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        <!-- Defect No:60 
                            //Vidhya:php team
                            //customerservice add view page -->
                        @if($user->userTypeID!=14)
                        <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'2'.'/'.$vt])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                      
                        @endif                    

                        <span class="selectuniqueusers"><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'2'.'/'.$vt])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdeletetissue', ['id' => $vt.'/'.$list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                        

                    </tr>
                    @endforeach
                    
                    @endif
                    
                    @if($list->PackagingStickersID!="" && $list->PackagingStickersID<>0)

                    <?php  $str = ltrim($developmentid, '0'); ?>
                     @foreach(explode(',',$list->PackagingStickersID) as $vp)

                    <tr class="gradeX" id="{{$str.'_'.'3'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>
                       <?php
             
             if($list->PackagingStickersID!="")
             echo "Packaging Stickers";echo "<br>";
             $tisslist =App\PackagingStickers::where('id','=',$vp)->first(); 
             ?></td>

                        <td><img src="{{ route('user.productpicpackage', ['id' => $vp]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$tisslist->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                        <td>{{$uniqueoffices->OfficeFactoryName}}</td>
<!-- sathish 15-03-2018 -->
                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">
<!-- For only edit link by Rajesh -->
                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'3'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        <!-- Defect No:60 
                            //Vidhya:php team
                            //customerservice add view page -->
                        @if($user->userTypeID!=14)
                        <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'3'.'/'.$vp])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                      
                        @endif                     

                        <span class="selectuniqueusers"><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'3'.'/'.$vp])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdeletepackage', ['id' => $vp.'/'.$list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                        

                    </tr>
                    @endforeach
                    
                    @endif
                    @if($list->HangTagsID!="" && $list->HangTagsID<>0)

                    <?php  $str = ltrim($developmentid, '0'); ?>
                     @foreach(explode(',',$list->HangTagsID) as $vh)

                    <tr class="gradeX" id="{{$str.'_'.'3'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>
                       <?php
             
             if($list->HangTagsID!="")
             echo "Hang Tags";echo "<br>";
             $hangtag =App\HangTags::where('id','=',$list->HangTagsID)->first(); 
             ?></td>

                        <td><img src="{{ route('user.hangtagpic', ['id' => $list->HangTagsID]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$hangtag->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                        <td>{{$uniqueoffices->OfficeFactoryName}}</td>
<!-- sathish 15-03-2018 -->
                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">
<!-- For only edit link by Rajesh -->
                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'4'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        <!-- Defect No:60 
                            //Vidhya:php team
                            //customerservice add view page -->
                        @if($user->userTypeID!=14)
                        <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'4'.'/'.$vh])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                      
                        @endif                     

                        <span class="selectuniqueusers"><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'4'.'/'.$vh])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdeletehangtags', ['id' => $vh.'/'.$list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                        

                    </tr>
                    @endforeach
                    
                    @endif
                    @if($list->TapesID!="" && $list->TapesID<>0)

                    <?php  $str = ltrim($developmentid, '0'); ?>
                     @foreach(explode(',',$list->TapesID) as $vt)

                    <tr class="gradeX" id="{{$str.'_'.'3'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>
                       <?php
             
             if($list->TapesID!="")
             echo "Tapes";echo "<br>";
             $tape =App\Tapes::where('id','=',$list->TapesID)->first(); 
             ?></td>

                        <td><img src="{{ route('user.tapespic', ['id' => $list->TapesID]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$tape->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                        <td>{{$uniqueoffices->OfficeFactoryName}}</td>
<!-- sathish 15-03-2018 -->
                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">
<!-- For only edit link by Rajesh -->
                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'5'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        <!-- Defect No:60 
                            //Vidhya:php team
                            //customerservice add view page -->
                        @if($user->userTypeID!=14)
                        <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'5'.'/'.$vt])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                      
                        @endif                     

                        <span class="selectuniqueusers"><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'5'.'/'.$vt])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdeletetapes', ['id' => $vt.'/'.$list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                        

                    </tr>
                    @endforeach
                    
                    @endif

                    <!-- Zipper pullers table fields
                    //Vidhya:PHP -->
                    @if($list->ZipperPullersID!="" && $list->ZipperPullersID<>0)

                    <?php  $str = ltrim($developmentid, '0'); ?>
                     @foreach(explode(',',$list->ZipperPullersID) as $vz)

                    <tr class="gradeX" id="{{$str.'_'.'3'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>
                       <?php
             
             if($list->ZipperPullersID!="")
             echo "Zipper Pullers";echo "<br>";
             $zipperpull =App\ZipperPullers::where('id','=',$list->ZipperPullersID)->first(); 
             ?></td>

                        <td><img src="{{ route('user.zipperpic', ['id' => $list->ZipperPullersID]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$zipperpull->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                        <td>{{$uniqueoffices->OfficeFactoryName}}</td>
<!-- sathish 15-03-2018 -->
                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">
<!-- For only edit link by Rajesh -->
                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'6'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        <!-- Defect No:60 
                            //Vidhya:php team
                            //customerservice add view page -->
                        @if($user->userTypeID!=14)
                        <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'6'.'/'.$vz])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                      
                        @endif                     

                        <span class="selectuniqueusers"><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'6'.'/'.$vz])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdeletezipper', ['id' => $list->ZipperPullersID.'/'.$list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                        

                    </tr>
                    @endforeach


                     
                    
                    @endif

                    @if($list->WovenLabelID!="" && $list->WovenLabelID<>0)

                    <?php  $str = ltrim($developmentid, '0'); ?>
                     @foreach(explode(',',$list->WovenLabelID) as $vz)

                    <tr class="gradeX" id="{{$str.'_'.'3'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>
                       <?php
             
             if($list->WovenLabelID!="")
             echo "Woven";echo "<br>";
             $wovenlabe =App\Woven::where('id','=',$list->WovenLabelID)->first(); 
             ?></td>

                        <td><img src="{{ route('user.wovenlabelpic', ['id' => $list->WovenLabelID]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$wovenlabe->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                        <td>{{$uniqueoffices->OfficeFactoryName}}</td>
<!-- sathish 15-03-2018 -->
                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">
<!-- For only edit link by Rajesh -->
                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'7'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        <!-- Defect No:60 
                            //Vidhya:php team
                            //customerservice add view page -->
                        @if($user->userTypeID!=14)
                        <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'7'.'/'.$vz])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                      
                        @endif                     

                        <span class="selectuniqueusers"><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'7'.'/'.$vz])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdeletewoven', ['id' => $list->WovenLabelID.'/'.$list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                        

                    </tr>
                    @endforeach
                    @endif


                    <!-- vidhya:09-04-2018 -->
                    @if($list->HeatTransferLabelID!="" && $list->HeatTransferLabelID<>0)

                    <?php  $str = ltrim($developmentid, '0'); ?>
                     @foreach(explode(',',$list->HeatTransferLabelID) as $vhe)

                    <tr class="gradeX" id="{{$str.'_'.'3'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>
                       <?php
             
             if($list->HeatTransferLabelID!="")
             echo "Heat Transfer";echo "<br>";
             $heattran =App\HeatTransfer::where('id','=',$list->HeatTransferLabelID)->first(); 
             ?></td>

                        <td><img src="{{ route('user.heattransferpic', ['id' => $list->HeatTransferLabelID]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$heattran->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                        <td>{{$uniqueoffices->OfficeFactoryName}}</td>

                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">

                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'8'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        
                        @if($user->userTypeID!=14)
                        <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'8'.'/'.$vhe])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                      
                        @endif                     

                        <span class="selectuniqueusers"><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'8'.'/'.$vhe])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdeleteheat', ['id' => $list->HeatTransferLabelID.'/'.$list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                        

                    </tr>
                    @endforeach
                    @endif

                    <!-- vidhya:09-04-2018 -->
                    @if($list->PrintedLabelID!="" && $list->PrintedLabelID<>0)

                    <?php  $str = ltrim($developmentid, '0'); ?>
                     @foreach(explode(',',$list->PrintedLabelID) as $vpl)

                    <tr class="gradeX" id="{{$str.'_'.'3'}}">

                        <td class="processdetails">{{$developmentid}}</td>

                        <td>@if($list->CustomerID!=''){{$customers->CustomerName}}@endif</td>  

                        <td>{{$list->Brand}}</td>  

                         <td>{{$list->ProgramName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductName}}</td> 

                        <td class="duplicatemissing">{{$list->CustomerProductCode}}</td>

                        <!-- <td>{{$list->CustomerProductCode}}</td> -->

                        <td class="duplicatemissing">{{$list->UniqueProductCode}}</td>

                        <td>
                       <?php
             
             if($list->PrintedLabelID!="")
             echo "Printed label";echo "<br>";
             $tape =App\PrintedLabel::where('id','=',$list->PrintedLabelID)->first(); 
             ?></td>

                        <td><img src="{{ route('user.printedlabelpic', ['id' => $list->PrintedLabelID]) }}" width="100"/></td>

                        <td>@if($list->status!=''){{$status->StatusName}}@endif</td>

                        <!-- <td>@if($list->ProductProcessID!=''){{$productprocess->ProductProcess}}@endif</td> -->

                        <td class="version_duplicate">{{$tape->Version}}</td>

                        <td class="duplicatemissing">{{$list->SampleRequestedDate}}</td>

                        <td>{{$uniqueoffices->OfficeFactoryName}}</td>

                        <td>
                          <?php 
                        if($list->SampleandQuote =='1'){echo "Sample and Quote"; }else{echo "Only Quote" ;} ?> </td>

                        <td class="duplicatemissing">{{$list->NumberOfSamplesRequired}}</td>

                        <td>{{$list->created_at}}</td>

                        <td>
                        {{$list->Remarks}}
                       
                        </td>


                        <td class="processdetails">

                        <a class="edituniqueusers" href="{{ url(route('user.editdevelopmentitemproductdetails', ['id' => $list->id.'/'.'9'])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>  
                        
                        @if($user->userTypeID!=14)
                        <span class="developmentitemduplicate" data-href="{{ url(route('user.developmentitemlistduplicate', ['id' => $list->id.'/'.'9'.'/'.$vpl])) }}" onclick="duplicate_develop(this)" ><a href="javascript:;"><img  src="{{ asset('/img/file.png') }}" border="0"  title="Duplicate"/></a></span>                      
                        @endif                     

                        <span class="selectuniqueusers"><a href="{{ url(route('user.developmentitemproductdetails', ['id' => $list->id.'/'.'9'.'/'.$vpl])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 
                        @if($user->userTypeID!=14)
                        <span class="deletedevelopmentitemlist" data-href="{{ url(route('user.developmentitemlistdeleteprintedlab', ['id' => $list->PrintedLabelID.'/'.$list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        @endif
                        </td>

                        

                    </tr>
                    @endforeach
                    @endif

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Development Item List(s) Found</td></tr>

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

