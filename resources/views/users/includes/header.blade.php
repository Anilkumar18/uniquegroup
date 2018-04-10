@include('admin.includes.commonjs')
<!-- Rajesh 01032018 -->
<style>

.dashboard-mainimg {

    width: 100%;

    height: auto;

}

.dropbtn {

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



.dropdown {

    position: relative;

    display: inline-block;

}



.dropdown-content {

    display: none;

    position: absolute;

    background-color: #0095cd;

    min-width: 160px;

    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

    z-index: 1;

  color:white;

}



.dropdown-content a {

    color: black;

    padding: 4px 16px;

    text-decoration: none;

    display: block;

  font-size: 13px;

}



.dropdown-content a:hover {background-color: #00AEEF}



.dropdown:hover .dropdown-content {

    display: block;

}



.dropdown:hover .dropbtn {

    background-color: #00AEEF;

}

.dropdown-content.drop a {

    color: #fff;

}

.dropdown-content.drop a:hover{

  background-color:#457093;

}
.newdevelopmentbtn
{
min-width:201px; background-color:#0099CC; height:30px;
}
.footerdiv
{
margin-top:30px;
}
.productgroupbtn
{
  min-width:201px; background-color:#0099CC; color: #fff;
}

</style>

<!-- Rajesh 01032018 -->
<div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                     <form role="search" class="navbar-form-custom" method="post" action="#">

                                                  <!-- <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">-->

                          <div class="dropdown form-group">
                          <!--onclick="event.preventDefault()-->
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
<?php $pdmnotallowed=array(2,17,8,16,15);?>

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
                
                <li 1class="uniquelogo-img"><a class="dropdown-toggle count-info"  href="dashboard" title="DashBoard">
             <img alt="image"  src="{{ asset("/img/Unique.png")}}" style="margin-right: 363px;">
             </a></li>
                <li class="dropdown shownotification">
  <?php 
 $ProductDetails=DB::Select('call sp_getcheckoutdetails()');
 
?>
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-shopping-cart fa-2x saveicon"></i>  <span class="label label-warning"><?php echo count($ProductDetails); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                      <li>
                            <div class="text-center 1link-block">
                                <a href="{{url(route('order.checkout')) }}" class="btn btn-primary fa fa-shopping-cart">
                                Checkout
                                </a>
                            </div>
                        </li>
                      <?php foreach ($ProductDetails as $Productlist) { ?>
                        <li>
                          <input type="text" id="removeorderurl" style="display: none;" value=" {{url(route('order.remove', ['id' =>''])) }}">
                           
                         
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ route('user.productpic', ['id' =>$Productlist->id]) }}">
                                </a>
                                <div class="media-body">
                                    <!--<p>Order ID:&nbsp;&nbsp;<strong>22</strong></p>-->
                                    <p>PO Number:&nbsp;&nbsp;<strong><?php echo $Productlist->poNumber ?></strong>
                                    </p><div class="cartactions">
                                    <span><a href="{{ route('order.edit', ['id' =>$Productlist->placeorderID]) }}"><img src="{{ asset('/img/edit.png') }}" border="0" title="Edit Order"></a></span>
                                    <span><a href="{{url(route('order.checkout')) }}"><img src="{{ asset('/img/view.png') }}" border="0" title="View Order"></a></span>
                                     <span><a href="javascript:;"><img src="{{ asset('/img/delete.png') }}" border="0" title="Delete Order" onclick="cartDelete(<?php echo $Productlist->placeorderID; ?>);"></a></span>
                                     </div>
                                    <p></p>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <?php } ?>
                        <li>
                            <div class="text-center 1link-block">
                                <a href="{{url(route('order.checkout')) }}" class="btn btn-primary fa fa-shopping-cart">
                                Checkout
                                </a>
                            </div>
                        </li>
                        
                    </ul>
                </li> 
                
                    <li>
                        <a href="{{ url('/logout') }}" onClick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
            
        </div>

        <div style="clear: both;"></div>

         <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">

        {{ csrf_field() }}

    </form>


