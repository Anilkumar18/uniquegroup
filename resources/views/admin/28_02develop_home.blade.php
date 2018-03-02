@extends('admin.layouts.dashboard')


@section('content')

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

</style>



<div class="headerlink">
<h5>>PDM Product Development Management</h5>
</div>



  <div class="ibox-title">

 <div class="col-lg-12 clsprodhomedd" style="background-color: #fff; padding-bottom: 50px;">
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

         

          

       
                  

  </div>





         

@endsection



