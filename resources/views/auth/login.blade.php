@extends('layouts.login')

@section('content')

        
            
        <header>
            <div class="request_more"><a href="http://www.theuniquegroup.com/contact-us/" target="_blank"><img src="{{ asset("/loginimages/request_button_image.png")}}"> </a></div>
            <div class="sociallinks">
                <a href="https://www.linkedin.com/company/theuniquegroup" target="_blank"> <img src="{{ asset("/loginimages/linked-in.png")}}" /> </a>
                <a href="https://www.facebook.com/theuniquegroup" target="_blank"> <img src="{{ asset("/loginimages/fb.png")}}" /></a>
                <a href="https://twitter.com/theunqpackaging" target="_blank"> <img src="{{ asset("/loginimages/twitter.png")}}" /> </a>
                <a href="https://instagram.com/theuniquegroup/" target="_blank"> <img src="{{ asset("/loginimages/instagram.png")}}" /> </a>
            </div>
        </header>
      
        <div class="container">

        <section class="logo"><img src="{{ asset("/loginimages/logo_image.png")}}" /></section>
        <section class="maincontent">
            <img src="{{ asset("/loginimages/heloo_image.png")}}" />
            <p>Welcome to <span>The Unique Group</span> online order system.<br> Using our system you can place and track orders for all our products.</p>
        
            <div class="feat_images">
            <img src="{{asset("loginimages/featured_img_001.png")}}"> <img src="{{asset("loginimages/featured_img_002.png")}}"> <img src="{{asset("loginimages/featured_img_003.png")}}"> <img src="{{asset("loginimages/featured_img_004.png")}}"></div>
            
            <div class="login_form">
           @if ($errors->has('userName'))<div class="errmsg">{{ $errors->first('userName') }}</div>@endif
           @if ($errors->has('password'))<div class="errmsg">{{ $errors->first('password') }}</div>@endif
           @if (session('info'))
        <div class="alert alert-info" role="alert">
            <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
            {{ session('info') }}
        </div>
        @endif 
        @if (session('error'))
        <div class="alert alert-danger" role="danger">
            <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
            {{ session('error') }}
        </div>
        @endif
        <p>Please enter your login details:</p>
             
        <form role="form" class="form-horizontal" name="login" id="login"  method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
           
       <div class="form-container">

        <!-- <div class="usernamelog" style="width: 100%; height: 40px;">
            <label for="inputUsername" style="width: 27%;">Chain</label>         
           <select name="chainID" id="chainID" class="txtbox" style="width: 60%;">
            <option value="">Please select a user type</option>
            // @foreach ($customers as $chain_list)
              <option value="{{$chain_list->id}}"> {{ $chain_list->chainName}}</option>
             // @endforeach
            </select>
            </div>-->
       
            <div class="usernamelog">
            <label for="inputUsername">Username</label>         
           <input type="text" id="userName" name="userName" class="txtbox" placeholder="Username" autocomplete="on" value="{{ old('userName') }}" required autofocus>
            </div>
            
            <div class="psw">
            <label for="inputPassword">Password</label>
            <input type="password" id="password" name="password" class="txtbox" placeholder="Password" required>
            </div>
            
            <div class="checkbtn">
            <input type="checkbox" id="remember_me" name="remember_me" > <label for="remember_me">Remember Me</label>
            </div>
            
            <div class="frmbtn">
             <button type="submit" name="submitlogin" id="submitlogin" >Login</button>
            </div>

       </div>
     
      </form>
       <input type="hidden" value="" id="chainidstatus" name="chainidstatus">
             <div class="register">
                 <p> <a href="" data-toggle="modal" data-target="#myModalRegister">Register Username and Password! &nbsp;&nbsp;<span>/</span></a>
                     <a href="" data-toggle="modal" data-target="#myModalForgot">&nbsp;&nbsp;Forgotten password?</a>
                 </p>
            </div>
          
        </div>

    
    </section>

</div>
          
          
          <footer class="footerflags">
          <div class="flagone" style="margin-left:10%;">
            <img src="loginimages/canada_flag_image.png"/><p>CANADA</p>
          </div>
        
          <div class="flagone">
            <img src="loginimages/china_flag_image.png"/><p>CHINA</p>
          </div>
        
          <div class="flagone">
            <img src="loginimages/hongkjong_flag_image.png"/><p>HONG KONG</p>
          </div>
        
          <div class="flagone">
            <img src="loginimages/india_flag_image.png"/><p>INDIA</p>
          </div>
        
          <div class="flagone">
            <img src="loginimages/mexico_flag_image.png"/><p>MEXICO</p>
          </div>
        
          <div class="flagone">
             <img src="loginimages/turku_flag_image.png"/><p>TURKEY</p>
          </div>
        
         <div class="flagone">
            <img src="loginimages/uk_flag_image.png"/><p>UK</p>
         </div>
        
         <div class="flagone">
            <img src="loginimages/usa_flag_image.png"/><p>USA</p>
         </div>
    
    </footer>
      
@endsection
