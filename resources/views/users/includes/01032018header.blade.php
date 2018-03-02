@include('admin.includes.commonjs')
<div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                     <form role="search" class="navbar-form-custom" method="post" action="#">

                                                  <!-- <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">-->

                          <div class="dropdown form-group">
                          <!--onclick="event.preventDefault()-->

                          <button class="dropbtn" type="button">Maintenance&nbsp;<span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content" align="center" id="dropdownbox">

                            <a href="javascript:;" onClick="selectmaintainance(this);" id="pdm">Maintenance</a>
                            <a href="javascript:;" onClick="selectpdm(this);" id="pdm">PDM</a>

                            <a href="javascript:;" onClick="selectecommerce(this);" id="ecommerce">Ecommerce</a>

                          </div>

                        </div>

                       

                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                
                <li 1class="uniquelogo-img"><a class="dropdown-toggle count-info"  href="dashboard" title="DashBoard">
             <img alt="image"  src="{{ asset("/img/Unique.png")}}" style="margin-right: 363px;">
             </a></li>
                <li></li>   
                
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


