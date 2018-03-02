@extends('users.layouts.dashboard')



@section('content')

<style>
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

