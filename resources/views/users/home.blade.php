@extends('users.layouts.dashboard')



@section('content')

<style>
/*Rajesh 01032018*/
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
/*Rajesh 01032018 Ends*/
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




<div class="row border-bottom white-bg">

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
                    <?php //print_r($chainSessionData->chainName);?>
                    

          </div>
                </div>  

            </div>



<div class="ibox-title" id="maintenancedashboard" style="display:none;">

 

         

           <div class="form-group">

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Customer Maintenance &nbsp; <span class=" fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.customers')) }}">Customers</a>

                             <a href="{{ url(route('admin.customerusers')) }}">Customer User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Vendor Maintenance &nbsp; <span class=" fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.vendors')) }}">Vendors</a>

                             <a href="{{  url(route('admin.vendorusers')) }}">Vendor User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Unique Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.uniquefacility')) }}">Unique Facilities</a>

                             <a href="{{  url(route('admin.uniqueusers')) }}">Unique User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Product Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                            <?php
                            //print_r($user->customerID);
                            if($user->userTypeID==9)
                            {
                              $customerdetails=App\Customers::where('id','=',$user->customerID)->get();
                            }else
                            $customerdetails=App\Customers::all();
                          foreach($customerdetails as $customers)
                          {
                          ?>
                             <a href="{{  url(route('admin.producthome',['sidebarid'=>$customers->id])) }}">{{$customers->CustomerName}}</a>
                           <?php
                           }
                           ?>

                            
                          </div>

                                             

              </div>

              <div class="dropdown col-lg-2">

                    <a href="{{  url(route('admin.productdevelopmenthome')) }}"><button class="dropbtn">PDM Maintenance&nbsp; <span class="fa fa-chevron-down"></span></button></a>

                    <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.pdmproductgroups')) }}">Product Group & <br /> Sub Group</a>

                             <a href="">User Type</a>

                             <a href="{{ url(route('admin.mktproductionregions')) }}">Marketing & <br /> Production Regions</a>

                             <a href="{{ url(route('admin.productdetails')) }}">Production Details</a>

                             <a href="{{ url(route('admin.productdevelopmenthome'))}}">Product Development</a>

                          </div>

                                             

              </div>

           </div>
           
           
           
           
           
           
          

             

             

              

              

           </div>

 <div class="ibox-title" id="pdmdashboard" style="display:block;">
 <div class="row">



 <div class="col-lg-12">
            
                <div class="wrapper wrapper-content">

                 <div style="margin-top:30px;"></div>
                 
              

                 @if ($usertype->id ==7)
                 
               

                 <div class="row"><center><a href="{{url(route('user.products'))}}"><div class="button_wrapper btn btn-w-m btn-success newdevelopmentbtn"><center>New Development</center></div></a></center></div></br>
                 <div class="row"><center><a href="{{url(route('user.developmentlist')) }}"><div class="button_wrapper btn btn-w-m btn-success newdevelopmentbtn"><center><center>Development List</center></center><!--<div class="tooltip2"></div>--></div></a></center></div></br>         
                 <div class="row"><center><a href="{{url(route('user.developmentlistview')) }}"><div class="button_wrapper btn btn-w-m btn-success newdevelopmentbtn"><center>Development Item List</center><!--<div class="tooltip2"></div>--></div></a></center></div></br>
                 
                  @elseif($usertype->id ==14)
                  <div class="col-lg-12 clsprodhomedd">
                    
                   <div class=""><center><a href="{{url(route('user.developmentlist')) }}"><div class="button_wrapper btn btn-w-m btn-success newdevelopmentbtn"><center><center>Development List</center></center><!--<div class="tooltip2"></div>--></div></a></center></div></br>         
                 <div class=""><center><a href="{{url(route('user.developmentlistview')) }}"><div class="button_wrapper btn btn-w-m btn-success newdevelopmentbtn"><center>Development Item Detailed List</center><!--<div class="tooltip2"></div>--></div></a></center></div></br>
                  </div>
                 
                  @elseif($usertype->id ==12)
                  
               
                    <div class="col-lg-12 clsprodhomedd">
                    <div class="clsdropdown">
                  
                    
                      <center><button class="clsdropbtn btn btn-w-m btn-success" style="min-width:201px; background-color:#0099CC; color:#fff;">New Development<span class=" fa fa-chevron-down"></span></button></center>
                      <div class="clsdropdown-content" style="min-width:201px; background-color:#0099CC; color:#fff;">
                        @foreach($productgrouplist as $groupdetails)
                         <a href="{{url(route('user.products',['id'=>$groupdetails->id]))}}">{{$groupdetails->ProductGroup}}</a>
                         @endforeach
                      </div>  
                     
                    </div>
                    &nbsp; &nbsp;
                    <div class="clsdropdown">
                  
                    
                       <a href="{{url(route('user.developmentlist')) }}"><center><button class="clsdropbtn btn btn-w-m btn-success" style="min-width:201px; background-color:#0099CC; color:#fff;">Development List<!--<span class=" fa fa-chevron-down"></span>--></button></center></a>
                      <!--<div class="clsdropdown-content" style="min-width:201px; background-color:#0099CC; color:#fff;">
                        @foreach($productgrouplist as $groupdetails)
                         <a href="">{{$groupdetails->ProductGroup}}</a>
                         @endforeach
                      </div>-->  
                     
                    </div>
                    &nbsp;&nbsp;
                     <div class="clsdropdown">
                  
                    
                      <a href="{{url(route('user.developmentlistview')) }}"><center><button class="clsdropbtn btn btn-w-m btn-success" style="min-width:201px; background-color:#0099CC; color:#fff;">Development Item Detailed List<!--<span class=" fa fa-chevron-down"></span>--></button></center></a>
                      <!--<div class="clsdropdown-content" style="min-width:201px; background-color:#0099CC; color:#fff;">
                        @foreach($productgrouplist as $groupdetails)
                         <a href="">{{$groupdetails->ProductGroup}}</a>
                         @endforeach
                      </div>-->  
                     
                    </div>

                    </div>
                      <div class="col-lg-12 clsprodhomedd">
                    <div class="clsdropdown">
                  
                    </div>

               <div class="footerdiv"></div>

            </div>

        </div>
                     
                 
                
                 
                 
                 
                 @elseif($usertype->id ==15)
                 
                  @foreach($productgrouplist as $groupdetails)
                    <div class="col-lg-12 clsprodhomedd">
                    <div class="clsdropdown">
                    <?php
                      $productgroupid=$groupdetails->id;
                       $productsubgroupdetails=App\ProductSubGroup::where('Product_groupID','=',$productgroupid)->get();
                       //print_r($productgroupid);
                     ?>
                     @if(count($productsubgroupdetails) > 0)
                      <center><button class="clsdropbtn btn btn-w-m btn-success" style="min-width:201px; background-color:#0099CC; color:#fff;">{{$groupdetails->ProductGroup}}<span class=" fa fa-chevron-down"></span></button></center>
                      <div class="clsdropdown-content" style="min-width:201px; background-color:#0099CC; color:#fff;">
                        @foreach($productsubgroupdetails as $subgrouplist)
                         <a href="{{ url(route('users.listofproducts',['id'=>$subgrouplist->id]))}}">{{$subgrouplist->ProductSubGroupName}}</a>
                         @endforeach
                      </div>  
                      @else
                      <center><button class="clsdropbtn btn btn-w-m btn-success" style="min-width:201px; background-color:#0099CC; color: #fff;"><a href="{{ url(route('admin.viewgrouplist',['id'=>$groupdetails->id]))}}">{{$groupdetails->ProductGroup}}</a></button></center>
                      @endif
                    </div>
                    </div>
                    @endforeach
              
                
                 @endif

                

              </div>

               <div class="footerdiv"></div>

            </div>

        </div>




   

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">

        {{ csrf_field() }}
    </form>
 

@endsection

