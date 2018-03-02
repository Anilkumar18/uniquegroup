<?php

use App\ProductGroup;

    $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
    error_reporting(0);

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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{$user->email}}</strong>
                             </span> <!--<span class="text-muted text-xs block">{{ ucfirst(trans($usertype->userType)) }} <b class="caret"></b></span> </span>-->
                             <?php
							 $usertypedetails=App\UserType::where('id','=',$user->userTypeID)->first();
							 ?>
                             <span class="text-muted text-xs block">{{$usertypedetails->userType}}<b class="caret"></b></span> </span>
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
                <li>
                    <a href="{{ url(route('dashboard'))  }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>

               

                      @if ($usertype->id ==7 || $usertype->id==12 || $usertype->id==13 || $usertype->id ==14)             
                        <li>
                                      
                            <li class=""><a href="{{url(route('user.products')) }}">New Development</a></li>
                            <li class=""><a href="{{url(route('user.developmentlist')) }}">Development List</a></li>
                            <li class=""><a href="javascript:;">Development Item List</a></li>
                          
                        </li>
                        @elseif($usertype->id ==15)
                        <li>
                            <a href=""><span class="nav-label">Products</span><span class="fa arrow"></span></a>
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
                                        <li class=""><a href="">{{$groupdetails->ProductGroup}}</a></li>
                                    @endif
                            </ul>
                                @endforeach

                                <li class=""><a href="javascript:;">Current Orders</a></li>
                                <li class=""><a href="javascript:;">Completed Orders</a></li>
                                <li class=""><a href="javascript:;">Change My password</a></li>
                        </li>
                        @endif
            

               

            </ul>

        </div>
    </nav>