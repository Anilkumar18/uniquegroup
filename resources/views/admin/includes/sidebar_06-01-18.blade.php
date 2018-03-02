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
|| Request::is('admin/pdmmaintenance/productionregions'))

{



    $pdm='active';

}



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

                            <span class="clear">  <span class="text-muted text-xs block">{{$user->email}}</span> <span class="block m-t-xs"> <strong class="font-bold">{{$user->firstName}} {{$user->lastName}}<b class="caret"></b></strong>

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

                <li class="active">

                    <a href="{{ url(route('dashboard'))  }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>

                </li>

                <li class="<?php echo $customer;?>">

                        

                        <a href="#"> <span class="nav-label">Customer Maintenance</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                             

                          <li {{{ (Request::is('admin/customers') ? 'class=active' : '') }}}{{{ (Request::is('admin/addnewcustomer') ? 'class=active' : '') }}}{{{ (Request::is('admin/customersdetails') ? 'class=active' : '') }}}><a href="{{ url(route('admin.customers')) }}">Customers</a></li>                          

                            <li {{{ (Request::is('admin/customerusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/addcustomerusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/customerusersdetails') ? 'class=active' : '') }}}><a href="{{ url(route('admin.customerusers')) }}">Customer Users</a></li>  

                        </ul>

                    </li>

                    <li class="<?php echo $vendor;?>">

                        <a href="#"> <span class="nav-label">Vendor Maintenance</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                            <li {{{ (Request::is('admin/vendors') ? 'class=active' : '') }}}{{{ (Request::is('admin/addvendors') ? 'class=active' : '') }}}{{{ (Request::is('admin/vendorsdetails') ? 'class=active' : '') }}}><a href="{{  url(route('admin.vendors')) }}">Vendors</a></li>

                            <li {{{ (Request::is('admin/vendorusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/addvendorusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/vendorusersdetails') ? 'class=active' : '') }}}><a href="{{ url(route('admin.vendorusers')) }}">Vendor Users</a></li>

                        </ul>

                    </li>

                    <li class="<?php echo $unique;?>">

                        <a href="#"> <span class="nav-label">Unique Maintenance</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                            <li {{{ (Request::is('admin/facilities') ? 'class=active' : '') }}}{{{ (Request::is('admin/addnewfacility') ? 'class=active' : '') }}}{{{ (Request::is('admin/uniquefacilitydetails') ? 'class=active' : '') }}}><a href="{{  url(route('admin.uniquefacility')) }}">Unique Facilities</a></li>

                            <li {{{ (Request::is('admin/uniqueusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/adduniqueusers') ? 'class=active' : '') }}}{{{ (Request::is('admin/uniqueusersdetails') ? 'class=active' : '') }}}><a href="{{  url(route('admin.uniqueusers')) }}">Unique Users</a></li>

                        </ul>

                    </li>

                    <li>
                        <a href="#"> <span class="nav-label">Customer Product Maintenance</span><span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level collapse">
                          
                            <?php
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

                    <li class="<?php echo $pdm;?>">

                        <a href="#"> <span class="nav-label">PDM Maintenance</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                              <li {{{ (Request::is('admin/pdmmaintenance/dashboard') ? 'class=active' : '') }}}><a href="{{ url(route('admin.pdmhome')) }}">Dashboard</a></li>   

                              <li {{{ (Request::is('admin/pdmmaintenance/productgroupandsubgroup') ? 'class=active' : '') }}}><a href="{{ url(route('admin.pdmproductgroups')) }}">Product Group & <br /> Sub Group</a></li>  
                                
                               <li {{{ (Request::is('admin/pdmmaintenance/mktproductionregions') ? 'class=active' : '') }}} || {{{ (Request::is('admin/pdmmaintenance/marketingregions') ? 'class=active' : '') }}}|| {{{ (Request::is('admin/pdmmaintenance/productionregions') ? 'class=active' : '') }}}><a href="{{ url(route('admin.mktproductionregions')) }}">Mkt & <br /> Production Regions</a></li>  

                          <li {{{ (Request::is('admin/states') ? 'class=active' : '') }}}{{{ (Request::is('admin/addstate') ? 'class=active' : '') }}}{{{ (Request::is('admin/statedetails') ? 'class=active' : '') }}}><a href="{{ url(route('admin.states')) }}">States</a></li>                          

                            <li {{{ (Request::is('admin/countries') ? 'class=active' : '') }}}><a href="{{ url(route('admin.countries')) }}">Countries</a></li>  
                            
                             <li><a href="{{ url(route('admin.productdevelopmenthome'))}}">Product Development</a></li> 

                        </ul>

                    </li>

                   

            </ul>



        </div>

    </nav>