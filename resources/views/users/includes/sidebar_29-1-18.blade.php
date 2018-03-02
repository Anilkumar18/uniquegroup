<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>                      

                            <a href="javascript:;"><img alt="image" class="img-circle" src="{{ asset('/img/profile_small.jpg') }}" /></a>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><!--{{$user->firstName}} {{$user->lastName}}-->{{$user->email}}</strong>
                             </span> <!--<span class="text-muted text-xs block">{{ ucfirst(trans($usertype->userType)) }} <b class="caret"></b></span> </span>-->
                             <span class="text-muted text-xs block">Unique Customer Service<b class="caret"></b></span> </span>
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

               

                                    
                <li>
                                      
                            <li class=""><a href="{{url(route('user.products')) }}">New Development</a></li>
                            <li class=""><a href="javascript:;">Development List</a></li>
                            <li class=""><a href="javascript:;">Development Item List</a></li>
                          
                </li>
            

               

            </ul>

        </div>
    </nav>