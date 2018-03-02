@extends('admin.layouts.pdmproductgroups')

@section('content')
<style>
.productibox-title{float:left; /*background-color:#CCCCCC;*/ width:100%;}
.clsdropbtn_productgroup {
     background-color: #00AEEF;
    color: white;
    padding: 4px;
    font-size: 13px;
    border: none;
    cursor: pointer;
	width: 92px;
	height:27px;
	border-radius: 5px;
	padding: 4px;
	margin-top: 12px;
}

.clsprodhomedd_productgroup {
    float: left;
    width: 100%;
    text-align: center;
}
.headerlink
{
 width:100%;
 float:left;
}
span.fa.fa-chevron-down {
    float: right;
    margin-right: 2px;
}
.productgroupdiv
{
border:1; color:#333333; width:100%; height:100%;
}
.cleardiv
{
clear:both; height:10px;
}
.tablegroupleft
{
width: 50%;float: left;
}
.tablegroupright
{
width: 50%;float: right;
}
</style>
<link href="{{ asset("/css/plugins/sweetalert/sweetalert.css")}}" rel="stylesheet">
<div class="headerlink">
<h5> >PDM Maintenance- Product Group & Sub Group</h5>
</div>
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

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}
                             
                         <!--Packaging-->
                        <div class="table-responsive">

                    

                    <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft"> 
    <thead>
            <tr>
                <th>Product Group</th>                         
                <th>
                      <a href="" data-toggle="modal" data-target="#myModal"><button class="clsdropbtn_productgroup"> Add New</button> </a>
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            $groupdetails=App\ProductGroup::selectGroups("Packaging");
							
							
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:196px;">
                           
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
            <tr>
                <th>Product SubGroup</th>                         
                <th>
                     <a href="" data-toggle="modal" data-target="#myModal1"><button class="clsdropbtn_productgroup productsubgroup"> Add New</button> </a>
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("Packaging");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td>{{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                    <!--labels-->
                    <div class="cleardiv"></div>
                    <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft"> 
  
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("Labels");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
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
  
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("Labels");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">{{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                       <!--Hang Tags-->
                       <div class="cleardiv"></div>
                      
                      <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft" > 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("HangTags");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
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
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("HangTags");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">{{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                      <!--patches-->
                       <div class="cleardiv"></div>
                       
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("Patches");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
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
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("Patches");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">{{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                      
                       <!--pocket flashers-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("PocketFlashers/Overrider");
							
							?>
                   
                        <tr class="gradeX">
                            <td>
                           
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
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("PocketFlashers/Overrider");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                       <!--Seals-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("Seals");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
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
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("Seals");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                       <!--Cords-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft" > 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("Cords");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
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
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("Cords");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                       <!--Hooks-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example tablegroupleft"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("Hooks");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
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
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("Hooks");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                      
                       <!--Metal Findings-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 50%;float: left;" > 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("MetalFindings");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
                            {{$groupdetails->ProductGroup}}
                           
							</td>
                            <td>
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productgrouplist.select', ['id' => $groupdetails->id])) }}"  href="javascript:;" class="editproductgroup" data-id="{{ $groupdetails->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductgroup" data-href="{{ url(route('productgrouplist.delete', ['id' => $groupdetails->id])) }}"  data-valueid="{{ $groupdetails->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                            
                        </tr>
                        
                        
                   
    </tbody>
    

</table>

                       <table class="table table-striped table-bordered table-hover dataTables-example " style="width: 50%;float: right;"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("MetalFindings");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                       <!--Tapes-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 50%;float: left;" > 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("Tapes");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
                            {{$groupdetails->ProductGroup}}
                           
							</td>
                            <td>
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productgrouplist.select', ['id' => $groupdetails->id])) }}"  href="javascript:;" class="editproductgroup" data-id="{{ $groupdetails->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductgroup" data-href="{{ url(route('productgrouplist.delete', ['id' => $groupdetails->id])) }}"  data-valueid="{{ $groupdetails->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                            
                        </tr>
                        
                        
                   
    </tbody>
    

</table>

                       <table class="table table-striped table-bordered table-hover dataTables-example " style="width: 50%;float: right;"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("Tapes");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                      
                        <!--Webbing-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 50%;float: left;" > 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("Webbing");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
                            {{$groupdetails->ProductGroup}}
                           
							</td>
                            <td>
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productgrouplist.select', ['id' => $groupdetails->id])) }}"  href="javascript:;" class="editproductgroup" data-id="{{ $groupdetails->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductgroup" data-href="{{ url(route('productgrouplist.delete', ['id' => $groupdetails->id])) }}"  data-valueid="{{ $groupdetails->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                            
                        </tr>
                        
                        
                   
    </tbody>
    

</table>

                       <table class="table table-striped table-bordered table-hover dataTables-example " style="width: 50%;float: right;"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("Webbing");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                      
                       <!--Zipper Pullers-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 50%;float: left;" > 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("ZipperPullers");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
                            {{$groupdetails->ProductGroup}}
                           
							</td>
                            <td>
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productgrouplist.select', ['id' => $groupdetails->id])) }}"  href="javascript:;" class="editproductgroup" data-id="{{ $groupdetails->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductgroup" data-href="{{ url(route('productgrouplist.delete', ['id' => $groupdetails->id])) }}"  data-valueid="{{ $groupdetails->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                            
                        </tr>
                        
                        
                   
    </tbody>
    

</table>

                       <table class="table table-striped table-bordered table-hover dataTables-example " style="width: 50%;float: right;"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("ZipperPullers");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                       <!--Variable Data-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 50%;float: left;" > 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("VariableData");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
                            {{$groupdetails->ProductGroup}}
                           
							</td>
                            <td>
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productgrouplist.select', ['id' => $groupdetails->id])) }}"  href="javascript:;" class="editproductgroup" data-id="{{ $groupdetails->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductgroup" data-href="{{ url(route('productgrouplist.delete', ['id' => $groupdetails->id])) }}"  data-valueid="{{ $groupdetails->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                            
                        </tr>
                        
                        
                   
    </tbody>
    

</table>

                       <table class="table table-striped table-bordered table-hover dataTables-example " style="width: 50%;float: right;"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("VariableData");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
                      </div>
                       <!--Miscellaneaus-->
                        <div class="cleardiv"></div>
                        
                        <div class="productgroupdiv">
                      
                      <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 50%;float: left;" > 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                     
                </th>    
            </tr>
    </thead>
    <tbody>
           
                   
                     <?php
                            
							
							$groupdetails=App\ProductGroup::selectGroups("Miscellaneaus");
							
							?>
                   
                        <tr class="gradeX">
                            <td style="min-width:166px;">
                           
                            {{$groupdetails->ProductGroup}}
                           
							</td>
                            <td>
                              <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productgrouplist.select', ['id' => $groupdetails->id])) }}"  href="javascript:;" class="editproductgroup" data-id="{{ $groupdetails->id }}" data-toggle="modal" data-target="#myModal"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductgroup" data-href="{{ url(route('productgrouplist.delete', ['id' => $groupdetails->id])) }}"  data-valueid="{{ $groupdetails->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                            
                        </tr>
                        
                        
                   
    </tbody>
    

</table>

                       <table class="table table-striped table-bordered table-hover dataTables-example " style="width: 50%;float: right;"> 
    <thead>
            <tr>
                <th>&nbsp;</th>                         
                <th>&nbsp;
                
                </th>    
            </tr>
    </thead>
    <tbody>
                      <?php
                            $subgroupdetails=App\ProductGroup::selectsubgroups("Miscellaneaus");
							//print_r($subgroupdetails);
							?>
                          @foreach($subgroupdetails as $subgrouplist)
                        <tr class="gradeX">
                            <td style="min-width:103px;">
                            {{$subgrouplist->ProductSubGroupName}}</td>
                            <td>
                               <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('productsubgrouplist.select', ['id' => $subgrouplist->id])) }}"  href="javascript:;" class="editproductsubgroup" data-id="{{ $subgrouplist->id }}" data-toggle="modal" data-target="#myModal1"> <img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                         <span class="deleteproductsubgroup" data-href="{{ url(route('productsubgrouplist.delete', ['id' => $subgrouplist->id])) }}"  data-valueid="{{ $subgrouplist->id }}" style="padding-left: 25px;"><a href="javascript:;"> <img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                            </td>
                        </tr>
                        @endforeach
    </tbody>
   

</table>
                      
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