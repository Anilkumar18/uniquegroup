<html>
<head>
<script>
function refresh()
{
	//alert("refresh page");
	//window.location.href();
	
	window.location="{{ url(route('dashboard')) }}";
}
</script>
<style>
/*.dropbtn1 {

    background-color: #00AEEF;

    color: white;

    padding: 4px;

    font-size: 14px;

    border: none;

    cursor: pointer;

	width: 160px;

	height:32px;

	border-radius: 10px;

	padding: 4px;

	margin-top: 12px;

}



.dropdown1 {

    position: relative;

    display: inline-block;

}



.dropdown-content1 {

    display: none;

    position: absolute;

    background-color: #0095cd;

    min-width: 160px;

    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

    z-index: 1;

	color:white;

}



.dropdown-content1 a {

    color: black;

    padding: 12px 16px;

    text-decoration: none;

    display: block;

}



.dropdown-content1 a:hover {background-color: #00AEEF}



.dropdown1:hover .dropdown-content1 {

    display: block;

}



.dropdown1:hover .dropbtn1 {

    background-color: #00AEEF;

}*/
</style>
</head>
<body>
<div class="row border-bottom">

            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">

                <div class="navbar-header">

                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    <form role="search" class="navbar-form-custom" method="post" action="#">

                                                  <!-- <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">-->

                          <div class="dropdown form-group">
                          <!--onclick="event.preventDefault()-->
<?php $pdmnotallowed=array(2,17,8,16,15);?>
<?php 
$pageurlarray=explode('/', Request::fullUrl());

//$maintenancearray=array('dashboard','customers','addnewcustomer','customersdetails','addcustomer','addcustomers','customer_delete','selectcustomer','customerusers','addcustomerusers','selectcustomerusers','customerusersdetails','customeruser_delete');
$productarray=array('productdetails','update_productsdetails','developmentlist','productimg','developmentlist_delete','viewdevelopment','duplicatedevelopment','developmentitemlist','productimgtissue','productimghook','productimgpackage','viewdevelopmentitemlist','developmentitemlist_delete','developmentitemlisthook_delete','developmentitemlisttissue_delete','developmentitemlistpackage_delete','duplicatedevelopmentitem','add_productsdetails','add_productsgroupdetails','add_season','add_quantity','add_region','add_inventorydetails','add_productquoteinfo','add_costinfo','add_costingandrequirements','addproductgroups','add_products','add_productsgroupdetails1','development','editdevelopmentitemlist','editproductdetails','accounts_productdetails');
$ecomercearray=array('completeorder','orderlist','placeorder','placeorderlist','currentorder');


$maintenancemenu='showmenu';
$ecomercemenuclass='hidemenu';
$productmenuclass='hidemenu';
//if (array_intersect($pageurlarray, $maintenancearray)) {$maintenancemenu='showmenu';}else{$maintenancemenu='hidemenu';}
if (array_intersect($pageurlarray, $productarray)) { ?>
    <button class="dropbtn" type="button">PDM&nbsp;<span class="fa fa-chevron-down"></span></button>
    <?php
}elseif (array_intersect($pageurlarray, $ecomercearray)) { ?>
    <button class="dropbtn" type="button">Ecommerce&nbsp;<span class="fa fa-chevron-down"></span></button>
<?php }else{ ?>
 <button class="dropbtn" type="button">Maintenance&nbsp;<span class="fa fa-chevron-down"></span></button>
<?php }
                          ?>
                          <div class="dropdown-content" align="center" id="dropdownbox">
                            
@if($usertype->id == 1 || $usertype->id == 9)
                            <a href="javascript:;" onClick="selectmaintainance(this);" id="pdm">Maintenance</a>
@endif
<?php if (!in_array($usertype->id, $pdmnotallowed)) { ?>
    <a href="javascript:;" onClick="selectpdm(this);" id="pdm">PDM</a>
<?php } ?>
                            <a href="javascript:;" onClick="selectecommerce(this);" id="ecommerce">Ecommerce</a>

                          </div>

                        </div>

                       

                    </form>

                </div>

                <ul class="nav navbar-top-links navbar-right">

                

                <li class="uniquelogo-img"><a class="dropdown-toggle count-info"  href="dashboard" title="DashBoard">

             <img alt="image"  src="{{ asset("/img/Unique.png")}}" style="margin-right: 363px;">

             </a></li>

             



                     <!--<li style="margin-right:50px;"><a class="dropdown-toggle count-info"  href="dashboard" title="DashBoard">

             <i class="fa fa-th-large fa-2x"></i><span class="label label-warning"></span>

             </a></li>-->

                    

                <!--<li>

                    <span class="m-r-sm text-muted welcome-message">Welcome to Theuniquegroup Admin Dashboard.</span>

                </li>-->



                    <li>

                        <a href="{{ url('/logout') }}" onClick="event.preventDefault(); document.getElementById('logout-form').submit();">

                            <i class="fa fa-sign-out"></i> Log out

                        </a>

                    </li>

                </ul>



            </nav>

<div class="col-lg-12">   

        <div class="col-lg-12">   

        <div class="col-lg-12 clsheaderbanner">

         <img class="dashboard-mainimg"  src="{{ asset("/img/banner001.png")}} " />

         </div>

         </div>

     </div>        

           

        </div>

       

         

         <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">



        {{ csrf_field() }}



    </form>
 
</body>    
    
</html>    