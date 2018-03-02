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
                 
              

                 @if ($usertype->id ==7 || $usertype->id==12 || $usertype->id==14 )
                 
               

                 <div class="row"><center><a href="{{url(route('user.products'))}}"><div class="button_wrapper btn btn-w-m btn-success newdevelopmentbtn"><center>New Development</center></div></a></center></div></br>
                 <div class="row"><center><a href="javascript:"><div class="button_wrapper btn btn-w-m btn-success newdevelopmentbtn"><center><center>Development List</center></center><!--<div class="tooltip2"></div>--></div></a></center></div></br>         
                 <div class="row"><center><a href="javascript:;"><div class="button_wrapper btn btn-w-m btn-success newdevelopmentbtn"><center>Development Item List</center><!--<div class="tooltip2"></div>--></div></a></center></div></br>
                 
                 
                 
                  
                
                 @endif

                

              </div>

               <div class="footerdiv"></div>

            </div>

        </div>




   

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">

        {{ csrf_field() }}
    </form>
 

@endsection

