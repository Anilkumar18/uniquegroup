<html>	
<head>
<script>
function selectpdm(t)
      {
       
		var pp=$(t).parent().parent();
		
		
		pp.find('button').html($(t).html()+'<span class="fa fa-chevron-down"></span>');
		
		$("#maintenancedashboard").css("display","none");
		
		$("#pdmdashboard").css("display","block");

		$('.sidebarmenu').removeClass('showmenu');
		$('.sidebarmenu').addClass('hidemenu');
		$('.productmenu').removeClass('hidemenu');
		  $('.productmenu').addClass('showmenu');
		
		
		
		
		
		//$(".dropdown-content").css("display","block");
		
		//document.getElementById(".pdm").style.backgroundColor = "lightblue";
		
		//$("#pdm").css("background-color","black");
		
		//document.getElementById(dropdownbox).style.display="block"; 
		
		//window.location="{{url(route('admin.developmenthome'))}}";
		 
       }
	   function selectecommerce(t)
	   {
		var pp=$(t).parent().parent();
		
		pp.find('button').html($(t).html()+'<span class="fa fa-chevron-down"></span>');
		 $('.sidebarmenu').removeClass('showmenu');
		 $('.sidebarmenu').addClass('hidemenu');
		  $('.ecommercemenu').removeClass('hidemenu');
		  $('.ecommercemenu').addClass('showmenu');

		  $("#maintenancedashboard").css("display","none");
		  $("#pdmdashboard").css("display","none");

		//alert("url  ="+window.location.href);
		// $("#ecommerce").css("background-color","black");
		// $("#pdm").css("background-color","#00AFEB");
		   
		
	   }
	   function selectmaintainance(t)
	   {
		var pp=$(t).parent().parent();
		
		pp.find('button').html($(t).html()+'<span class="fa fa-chevron-down"></span>');
		 $("#maintenancedashboard").css("display","block");
		  $("#pdmdashboard").css("display","none");
		  $('.sidebarmenu').removeClass('showmenu');
		 $('.sidebarmenu').addClass('hidemenu');
		  $('.maintenancemenu').removeClass('hidemenu');
		  $('.maintenancemenu').addClass('showmenu');

		  //alert("url  ="+window.location.href);
	   }
	   function newdevelopment()
	   {
		   // alert("Tetsibng");
		$("#customermaintenance").css("display","none"); 
		$("#vendormaintenance").css("display","none");
		$("#uniquemaintenance").css("display","none");
		$("#productmaintenance").css("display","none");
		$("#pdmmaintenance").css("display","none");
		$("#pdmmaintenance1").css("display","none");
		
		
	   }
	   function checkurl()
	   {}
</script>

</head>

<body>
	<?php

use App\ProductGroup;

    $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
    error_reporting(0);
  
$productdetails='';
if(Request::is('productdetails/*')
)
  {
    $productdetails='active';
   }  
   $productgroupid=Session::get('productgroupid');

$pageurlarray=explode('/', Request::fullUrl());

//$maintenancearray=array('dashboard','customers','addnewcustomer','customersdetails','addcustomer','addcustomers','customer_delete','selectcustomer','customerusers','addcustomerusers','selectcustomerusers','customerusersdetails','customeruser_delete');
$productarray=array('productdetails','update_productsdetails','developmentlist','productimg','developmentlist_delete','viewdevelopment','duplicatedevelopment','developmentitemlist','productimgtissue','productimghook','productimgpackage','viewdevelopmentitemlist','developmentitemlist_delete','developmentitemlisthook_delete','developmentitemlisttissue_delete','developmentitemlistpackage_delete','duplicatedevelopmentitem','add_productsdetails','add_productsgroupdetails','add_season','add_quantity','add_region','add_inventorydetails','add_productquoteinfo','add_costinfo','add_costingandrequirements','addproductgroups','add_products','add_productsgroupdetails1','development','editdevelopmentitemlist');
$ecomercearray=array();

$maintenancemenu='showmenu';
$ecomercemenuclass='hidemenu';
//if (array_intersect($pageurlarray, $maintenancearray)) {$maintenancemenu='showmenu';}else{$maintenancemenu='hidemenu';}
if (array_intersect($pageurlarray, $productarray)) {$productmenuclass='showmenu';$maintenancemenu='hidemenu';}else{$productmenuclass='hidemenu';}
//if (array_intersect($pageurlarray, $ecomercearray)) {$ecomercemenuclass='showmenu';}else{$ecomercemenuclass='hidemenu';}
?>

  <?php
$customer='';
//if(!Request::is('admin/customers') || !Request::is('admin/addnewcustomer')) { $id = $customers->id; }
//if(!Request::is('admin/addnewcustomer')) { $id = $customers->id; }

if(Request::is('admin/customers')|| Request::is('admin/addnewcustomer') || Request::is('admin/customersdetails') || Request::is('admin/customerusers')|| Request::is('admin/addcustomerusers')|| Request::is('admin/customerusersdetails')) 

{


	
    $customer='active';

}

$vendor='';

if(Request::is('admin/vendorusers') || Request::is('admin/addvendorusers') || Request::is('admin/vendorusersdetails') || Request::is('admin/vendors') || Request::is('admin/addvendors') || Request::is('admin/vendorsdetails'))

{



    $vendor='active';

}

$unique='';

if(Request::is('admin/facilities') || Request::is('admin/addnewfacility') || Request::is('admin/uniquefacilitydetails') || Request::is('admin/uniqueusers') || Request::is('admin/adduniqueusers') || Request::is('admin/uniqueusersdetails'))

{



    $unique='active';

}



$pdm='';

if(Request::is('admin/countries') || Request::is('admin/states') || Request::is('admin/addstate') || Request::is('admin/statedetails') || Request::is('admin/pdmmaintenance/dashboard') ||  Request::is('admin/pdmmaintenance/productgroupandsubgroup')|| Request::is('admin/pdmmaintenance/mktproductionregions')
|| Request::is('admin/pdmmaintenance/productionregions') || Request::is('admin/pdmmaintenance/productdetails') || Request::is('admin/pdmmaintenance/productdevelopment/*') || Request::is('admin/pdmmaintenance/dashboard')
)
  {
    $pdm='active';
   }

$prodevmgmt='';

if(Request::is('admin/development/dashboard') || Request::is('developmentlist') || Request::is('developmentitemlist') 
)
  {
    $prodevmgmt='active';
   }

/*if (Request::is('admin/pdmmaintenance/productdevelopment/*'))
{
   echo "dlakjfhdfkjhdsafkjhsdakjfhajsdfhj";

}*/


?>

 

<nav class="navbar-default navbar-static-side" role="navigation">

        <div class="sidebar-collapse">

            <ul class="nav metismenu" id="side-menu">

                <li class="nav-header">

                    <div class="dropdown profile-element">

                        <span>                      



                            <a href="javascript:;"><img alt="image" class="img-circle" src="{{ asset('/img/profile_small.jpg') }}" /></a>

                             </span>

                            <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                             <?php
							 $usertypedetails=App\UserType::where('id','=',$user->userTypeID)->first();
							 ?>

                            <span class="clear"> <span class="text-muted text-xs block">{{$user->email}}</span> <span class="block m-t-xs"> <strong class="font-bold">{{$usertypedetails->userType}}<b class="caret"></b></strong>

                             </span>

                             </span>

                             </a>

                            <ul class="dropdown-menu animated fadeInRight m-t-xs">

                                <li><a href="{{ url('/logout') }}" onClick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>

                            </ul>

                    </div>

                     <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">

        			{{ csrf_field() }}

    				</form>

                    <div class="logo-element">

                        IN+

                    </div>

                </li>
                @if($usertype->id == 15)
                        <li class="productlist">
                            <a href=""><span class="nav-label">Products</span><span class="fa arrow"></span></a>
                             <?php
                             $productgrouplist=App\ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
                                  
                              ?>
                                @foreach($productgrouplist as $groupdetails)
                            <ul class="nav nav-second-level collapse">
                                <?php
                                  $productgroupid=$groupdetails->id;
                                   $productsubgroupdetails=App\ProductSubGroup::where('Product_groupID','=',$productgroupid)->get();
                                   
                                 ?>

                                    @if(count($productsubgroupdetails) > 0)   
                                     <li><a href="#"><span class="nav-label">{{$groupdetails->ProductGroup}}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    @foreach($productsubgroupdetails as $subgrouplist)
                                    <li class="nice"><a href="{{ url(route('users.listofproducts',['id'=>$subgrouplist->id]))}}">{{$subgrouplist->ProductSubGroupName}}</a></li>
                                     @endforeach
                                  </ul>
                                  </li>
                                  @else
                                        <li class=""><a href="{{ url(route('users.viewgrouplist',['id'=>$groupdetails->id]))}}">{{$groupdetails->ProductGroup}}</a></li>
                                    @endif
                            </ul>
                                @endforeach
                        </li>
                        <li class=""><a href="javascript:;">Current Orders</a></li>
                                <li class=""><a href="javascript:;">Completed Orders</a></li>
                                
                                @endif
                @if($usertype->id ==1 || $usertype->id == 9)
                <li class="active">

                    <a href="{{ url(route('dashboard'))  }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>

                </li>

                <li class="<?php echo $customer;?> sidebarmenu maintenancemenu <?php echo $maintenancemenu; ?>" id="customermaintenance">

                        

                        <a href="#"> <span class="nav-label">Customer Maintenance</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                             

                          <li {{{ (Request::is('admin/customers') ? 'class=active' : '') }}}{{{ (Request::is('admin/addnewcustomer') ? 'class=active' : '') }}}{{{ (Request::is('admin/customersdetails') ? 'class=active' : '') }}}><a href="{{ url(route('admin.customers')) }}">Customers</a></li>                          

                            <li {{{ (Request::is('admin/customerusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/addcustomerusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/customerusersdetails') ? 'class=active' : '') }}}><a href="{{ url(route('admin.customerusers')) }}">Customer Users</a></li>  

                        </ul>


                    </li>

                    <li class="<?php echo $vendor;?> sidebarmenu maintenancemenu <?php echo $maintenancemenu; ?>" id="vendormaintenance">

                        <a href="#"> <span class="nav-label">Vendor Maintenance</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                            <li {{{ (Request::is('admin/vendors') ? 'class=active' : '') }}}{{{ (Request::is('admin/addvendors') ? 'class=active' : '') }}}{{{ (Request::is('admin/vendorsdetails') ? 'class=active' : '') }}}><a href="{{  url(route('admin.vendors')) }}">Vendors</a></li>

                            <li {{{ (Request::is('admin/vendorusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/addvendorusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/vendorusersdetails') ? 'class=active' : '') }}}><a href="{{ url(route('admin.vendorusers')) }}">Vendor Users</a></li>

                        </ul>

                    </li>

                    <li class="<?php echo $unique;?> sidebarmenu maintenancemenu <?php echo $maintenancemenu; ?>" id="uniquemaintenance">

                        <a href="#"> <span class="nav-label">Unique Maintenance</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                            <li {{{ (Request::is('admin/facilities') ? 'class=active' : '') }}}{{{ (Request::is('admin/addnewfacility') ? 'class=active' : '') }}}{{{ (Request::is('admin/uniquefacilitydetails') ? 'class=active' : '') }}}><a href="{{  url(route('admin.uniquefacility')) }}">Unique Facilities</a></li>

                            <li {{{ (Request::is('admin/uniqueusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/adduniqueusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/uniqueusersdetails') ? 'class=active' : '') }}}><a href="{{  url(route('admin.uniqueusers')) }}">Unique Users</a></li>

                        </ul>

                    </li>

                    <li id="productmaintenance" class="sidebarmenu maintenancemenu <?php echo $maintenancemenu; ?>">
                        <a href="#"> <span class="nav-label">Customer Product Maintenance</span><span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level collapse">
                          
                            <?php
                             if($usertype->id==9)
                            {
                              $customerdetails=App\Customers::where('id','=',$user->customerID)->get();
                            }else
                            $customerdetails=App\Customers::all();
							foreach($customerdetails as $customers)
							{
							?>
                             <li><a href="{{  url(route('admin.producthome',['sidebarid'=>$customers->id])) }}">{{$customers->CustomerName}}</a></li>
                             <?php
							 }
							 ?>
                            
                        </ul>
                    </li>
                    <?php
					
					if(Request::is('admin/pdmmaintenance/*'))
					{
					?>

                    <li class="<?php echo $pdm;?> sidebarmenu maintenancemenu <?php echo $maintenancemenu; ?>" id="pdmmaintenance">
                      
          
                       
                       <a href="{{ url(route('admin.pdmhome')) }}"> <span class="nav-label">PDM Maintenance</span>
                        <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                            <!--  <li {{{ (Request::is('admin/pdmmaintenance/dashboard') ? 'class=active' : '') }}}><a href="{{ url(route('admin.pdmhome')) }}">Dashboard</a></li>-->   

                              <li {{{ (Request::is('admin/pdmmaintenance/productgroupandsubgroup') ? 'class=active' : '') }}}><a href="{{ url(route('admin.pdmproductgroups')) }}">Product Group & <br /> Sub Group</a></li>

                              <li><a href="">User Type</a></li>  
                                
                               <li {{{ (Request::is('admin/pdmmaintenance/mktproductionregions') ? 'class=active' : '') }}} || {{{ (Request::is('admin/pdmmaintenance/marketingregions') ? 'class=active' : '') }}}|| {{{ (Request::is('admin/pdmmaintenance/productionregions') ? 'class=active' : '') }}}><a href="{{ url(route('admin.mktproductionregions')) }}">Marketing & <br /> Production Regions</a></li>  

                        <!--  <li {{{ (Request::is('admin/states') ? 'class=active' : '') }}}{{{ (Request::is('admin/addstate') ? 'class=active' : '') }}}{{{ (Request::is('admin/statedetails') ? 'class=active' : '') }}}><a href="{{ url(route('admin.states')) }}">States</a></li> 
                          
                                                        

                            <li {{{ (Request::is('admin/countries') ? 'class=active' : '') }}}><a href="{{ url(route('admin.countries')) }}">Countries</a></li> -->
                            
                             <li {{{ (Request::is('admin/pdmmaintenance/productdetails') ? 'class=active' : '') }}}><a href="{{ url(route('admin.productdetails')) }}">Production Details</a></li>      
                            
                             <li {{{ (Request::is('admin/pdmmaintenance/productdevelopment/*') ? 'class=active' : '') }}}><a href="{{ url(route('admin.productdevelopmenthome'))}}">Product Development</a></li> 



                        </ul>

                    </li>
                    
                    <?php
					}


					elseif($pdm=="")
					{
					?>
                    <li id="pdmmaintenance1" class="sidebarmenu maintenancemenu <?php echo $maintenancemenu; ?>">
                      <a href="{{ url(route('admin.pdmhome')) }}"> <span>PDM Maintenance</span>
                        <span class="fa arrow"></span>
                        </a>
                    </li>
                   <?php
					}
					
				   ?>
           <li class="sidebarmenu productmenu <?php echo $prodevmgmt; ?> <?php echo $productmenuclass; ?>" id="pdmproductdevelopment">
             <a href=""><span class="nav-label">Product Development Management</span>
                        <span class="fa arrow"></span></a>
           <ul class="nav nav-second-level collapse">
            
              <li class="<?php echo $prodevmgmt; ?>"><a href="{{url(route('admin.developmenthome')) }}" onClick="newdevelopment();">New Development</a></li>
             
              <li class="<?php echo $prodevmgmt; ?>"><a href="{{url(route('user.developmentlist')) }}">Development List</a></li>
              <li class="<?php echo $prodevmgmt; ?>"><a href="{{url(route('user.developmentlistview')) }}">Development Item List</a></li>
            </ul>
           </li>
          
          <li class="productlist sidebarmenu productmenu <?php echo $productmenuclass; ?>" id="products">
                            <a href=""><span class="nav-label">Products</span><span class="fa arrow"></span></a>
                             <?php
                             $productgrouplist=App\ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
                                  
                              ?>
                                @foreach($productgrouplist as $groupdetails)
                            <ul class="nav nav-second-level collapse">
                                <?php
                                  $productgroupid=$groupdetails->id;
                                   $productsubgroupdetails=App\ProductSubGroup::where('Product_groupID','=',$productgroupid)->get();
                                   
                                 ?>

                                    @if(count($productsubgroupdetails) > 0)   
                                     <li><a href="#"><span class="nav-label">{{$groupdetails->ProductGroup}}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    @foreach($productsubgroupdetails as $subgrouplist)
                                    <li class="nice"><a href="{{ url(route('admin.listofproducts',['id'=>$subgrouplist->id]))}}">{{$subgrouplist->ProductSubGroupName}}</a></li>
                                     @endforeach
                                  </ul>
                                  </li>
                                  @else
                                        <li class=""><a href="{{ url(route('admin.viewgrouplist',['id'=>$groupdetails->id]))}}">{{$groupdetails->ProductGroup}}</a></li>
                                    @endif
                            </ul>
                                @endforeach
                        </li>

                                <li class="sidebarmenu ecommercemenu <?php echo $ecomercemenuclass; ?>" id="currentorders"><a href="javascript:;">Current Orders</a></li>
                                <li class="sidebarmenu ecommercemenu <?php echo $ecomercemenuclass; ?>" id="completedorders"><a href="javascript:;">Completed Orders</a></li>
          @endif
                

                @if($usertype->id ==7 || $usertype->id==13 || $usertype->id ==14)
                  <li>
                    <a href="{{ url(route('dashboard'))  }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                          
                        <li>
                                      
                            <li class=""><a href="{{url(route('user.developmentlist')) }}">Development List</a></li>
                            <li class=""><a href="{{url(route('user.developmentlistview')) }}">Development Item List</a></li>
                            <li class=""><a href="javascript:;">Current Orders</a></li>
                                <li class=""><a href="javascript:;">Completed Orders</a></li>
                          
                        </li>
                        @endif


                        @if($usertype->id == 12)
                        <li class=""><a href="{{url(route('user.developmentlist')) }}">Development List</a></li>
                            <li class=""><a href="{{url(route('user.developmentlistview')) }}">Development Item List</a></li>
                        <li class="productlist">

                            <a href=""><span class="nav-label">Products</span><span class="fa arrow"></span></a>
                             <?php
                             $productgrouplist=App\ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
                                  
                              ?>
                                @foreach($productgrouplist as $groupdetails)
                            <ul class="nav nav-second-level collapse">
                                <?php
                                  $productgroupid=$groupdetails->id;
                                   $productsubgroupdetails=App\ProductSubGroup::where('Product_groupID','=',$productgroupid)->get();
                                   
                                 ?>

                                    @if(count($productsubgroupdetails) > 0)   
                                     <li><a href="#"><span class="nav-label">{{$groupdetails->ProductGroup}}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    @foreach($productsubgroupdetails as $subgrouplist)
                                    <li class="nice"><a href="{{ url(route('users.listofproducts',['id'=>$subgrouplist->id]))}}">{{$subgrouplist->ProductSubGroupName}}</a></li>
                                     @endforeach
                                  </ul>
                                  </li>
                                  @else
                                        <li class=""><a href="{{ url(route('users.viewgrouplist',['id'=>$groupdetails->id]))}}">{{$groupdetails->ProductGroup}}</a></li>
                                    @endif
                            </ul>
                                @endforeach
                               <li class=""><a href="javascript:;">Current Orders</a></li>
                                  <li class=""><a href="javascript:;">Completed Orders</a></li>  
                        </li>

                                
                                @endif
                                @if($usertype->id ==2 || $usertype->id==8 || $usertype->id ==16 || $usertype->id ==17)
                                  <li class=""><a href="javascript:;">Current Orders</a></li>
                                  <li class=""><a href="javascript:;">Completed Orders</a></li>
                                @endif
                        
            </ul>



        </div>

    </nav>
   
   </body>


</html>