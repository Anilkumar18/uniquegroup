  @extends('order.layouts.orderdashboard')

@section('content')
<style>
.productibox-title{float:left; /*background-color:#CCCCCC;*/ width:100%;}
.clsdropbtn {
     background-color: #00AEEF;
    color: white;
    padding: 4px;
    font-size: 13px;
    border: none;
    cursor: pointer;
	width: 160px;
	height:32px;
	border-radius: 5px;
	padding: 4px;
	margin-top: 12px;
}

.clsdropdown {
    position: relative;
    display: inline-block;
}

.clsdropdown-content {
    display: none;
    position: absolute;
    background-color: #0095cd;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	color:white;
}

.clsdropdown-content a {
   color: black;
    padding: 4px 16px;
    text-decoration: none;
    display: block;
	font-size: 13px;
}

.clsdropdown-content a:hover {background-color: #457093}

.clsdropdown:hover .clsdropdown-content {
    display: block;
}

.clsdropdown:hover .clsdropbtn {
    background-color: #00AEEF;
}


.clsprodhomedd {
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
</style>


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Checkout List </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Home</a>
                        </li>
                        
                        <li class="active">
                            <strong>Checkout List</strong>
                        </li>
                       
                    </ol>
                </div>
                <div class="col-lg-4">
          <div class="title-action">
                    </div>
                </div>
                
                <div class="col-lg-12">
          <div class="logoutSucc">
                                            </div>
                </div>
                
                
            </div>
<div class="ibox-title productibox-title">
<div class="ibox-title">
                        <h5>Checkout List</h5>
                        <div class="ibox-tools">
                        <div class="1link-block" style="margin-top:20px;margin-right: 402px;"> 
                        <a href="{{url(route('order.delivery')) }}" class="btn btn-primary fa fa-plus"> Place Order</a>
                         <a href="{{url(route('user.placeorderview')) }}" class="btn btn-primary fa fa-cart-arrow-down"> Continue Shopping</a>
                        </div>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                         
                          <!--  <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>-->
                        </div>
                    </div>
                    <div class="ibox-content">

                    
                    <div class="row">
                    <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs orderlist_border">
                            <li class="active"><a data-toggle="tab" href="#tab-3">Order Details</a></li>
                        </ul>
                        
                   
                
                         <div id="tab-3" class="tab-pane active">
                         <div class="panel-body panel_orderlist">
                         <div class="step-content">  
                         
                         
                         
                         
                         <div class="row">
                <div class="col-lg-12">
                          <div class="tabs-container">
                          
                        <ul class="nav nav-tabs orderlist_border">
                        <?php
$carestatus=0;$zipperstatus=0;$HangTags=0;$PrintedLabel=0;$HeatTransfer=0;
foreach ($ProductDetails as $Productlist) {
  ?>
@if($Productlist->carecount==1 && $carestatus==0)
<li class="active"><a data-toggle="tab" href="#tab-1">Care Labels</a></li>
<?php $carestatus=1; ?>
 @elseif($Productlist->PrintedLabelcount==1 && $PrintedLabel==0)
 <li class=""><a data-toggle="tab" href="#tab-44">Printed Labels</a></li>
 <?php $PrintedLabel=1; ?>
  @elseif($Productlist->HeatTransfercount==1 && $HeatTransfer==0)
 <li class=""><a data-toggle="tab" href="#tab-55">Heat Transfer Labels</a></li>
 <?php $HeatTransfer=1; ?>
@elseif($Productlist->HangTagscount==1 && $HangTags==0)
 <li class=""><a data-toggle="tab" href="#tab-66">Hangtag</a></li>
 <?php $HangTags=1; ?>
@elseif($Productlist->ZipperCount==1 && $zipperstatus==0)
 <li class=""><a data-toggle="tab" href="#tab-77">Zipper Pulls</a></li>
 <?php $zipperstatus=1; ?>
@endif
  <?php
}
                         ?>
                        
                                                 
                                                       
                        </ul>
                        
                        <div class="tab-content">
                         @if($carestatus==1)
                         <div id="tab-1" class="tab-pane active">
                                    @include('order.checkout.care')
                                  </div>
                        @endif

                        @if($PrintedLabel==1)
                         <div id="tab-44" class="tab-pane">
                                    @include('order.checkout.printedlabel')
                                  </div>
                        @endif
                        @if($HeatTransfer==1)
                         <div id="tab-55" class="tab-pane">
                                    @include('order.checkout.heattransfer')
                                  </div>
                        @endif
                        @if($HangTags==1)
                         <div id="tab-66" class="tab-pane">
                                    @include('order.checkout.hangtag')
                                  </div>
                        @endif
                           @if($zipperstatus==1)
                           <div id="tab-77" class="tab-pane">
                                 @include('order.checkout.zipper')
                               </div>
                                @endif 

                                
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        </div></div></div>
                         
                         </div></div></div> 
                         
                         
                        
                       
                        
                      </div></div></div>
                             
                                  
                          <div class="text-center 1link-block" style="margin-top:20px; margin-left:5px;">
                            <a href="javascript:;" class="btn btn-primary fa fa-plus"> Place Order</a>
                              <a href="{{url(route('user.placeorderview')) }}" class="btn btn-primary fa fa-cart-arrow-down" style="margin-left:5px;"> Continue Shopping</a>
                           </div>  
                    
          
                      
        
                    </div>





</div>


</div>

@endsection 