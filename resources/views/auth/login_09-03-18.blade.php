@extends('layouts.login')

@section('content')

        
            
        <header class="clsheader">
            <div class="request_more"><a href="http://www.theuniquegroup.com/contact-us/" target="_blank"><img src="{{ asset("/loginimages/UNIQUE_LOGO.png")}}"> </a></div>
            <div class="clsseprator"></div>
            <div class="clssitelink">
          <p> <a href="#"> UNIQUE.COM </a> </p>
        </div>

        <div class="clsmaillink">
          <a href="#"><img src="{{ asset("/loginimages/email.png")}}" /></a>
        </div>
            
        </header>
      <div class="banner_img">
            <img src="{{asset("loginimages/image003.png")}}"></div>
        <div class="container">
          
        <section class="logo"><img src="" /></section>
        
        <section class="maincontent">
                               
            
            
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

         
            <div class="usernamelog">
            <label for="inputUsername">USERNAME</label>         
           <input type="text" id="userName" name="userName" class="txtbox" placeholder="" autocomplete="on" value="{{ old('userName') }}" required autofocus>
            </div>
            
            <div class="psw">
            <label for="inputPassword">PASSWORD</label>
            <input type="password" id="password" name="password" class="txtbox" placeholder="" required>
            </div>
            
            <!-- <div class="checkbtn">
            <input type="checkbox" id="remember_me" name="remember_me" > <label for="remember_me">Remember Me</label>
            </div> -->
            
            <div class="frmbtn">
             <button type="submit" name="submitlogin" id="submitlogin" >Login</button>
            </div>

       </div>
     
      </form>
       <input type="hidden" value="" id="chainidstatus" name="chainidstatus">
             <div class="register">
                 <p> <!-- <a href="" data-toggle="modal" data-target="#myModalRegister">Register Username and Password! &nbsp;&nbsp;<span>/</span></a> -->
                     <a href="" data-toggle="modal" data-target="#myModalForgot">&nbsp;&nbsp;Forgot Password?</a>
                 </p>
            </div>
          
        </div>

    
    </section>

</div>
          
          
         
      
@endsection
