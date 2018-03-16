<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('Unique Group | Log in', 'Unique Group | Log in') }}</title>

    <!-- Styles -->

  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
   
   
   
   @charset "utf-8";
/* CSS Document */

*{margin:0; padding:0;}

body{margin:0; padding:0; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; }

.wrapper{width:100%; height:auto; background:#545456; float:left;}
header{ float:left; width:100%; height:50px; /*background-color:#999;*/ margin-top:20px;}
.request_more{ margin:10px 0 10px 50px; float:left;}
.request_more img{ width:150px; height:25px; border-radius:3px; color:#fff; font-size:11px; }
/*.request_more button:hover{ border:solid thin #00CCFF; background:none; color:#00CCFF; font-weight:400; cursor:pointer; }*/
.sociallinks{float:left; margin:15px 0 10px 20px;}
.sociallinks img{width:15px;  padding:0 2px 0 0;}
.sociallinks img:hover{ opacity:.7;}
.sociallinks a{text-decoration:none;}

.container{ width:33.3%; height:100%; margin:0 auto; /*background-color:#e1e1e1;*/ }
.container .logo{ width:100%; height:auto;}
.container .logo img{ width:90%; margin-top:-35px;}

.maincontent{ width:100%; height:auto; text-align:center;}
.maincontent img{ width:45px; margin-top:0px;  }
.maincontent p{ width:80%; margin:0 auto; color:#fff; font-size:11px; font-family: myriad pro;}
//.maincontent span{ font-weight:800;}

.maincontent .feat_images{width:92%; height:auto;  margin-left: 22px; margin-top:10px; }
.maincontent .feat_images img{width:16%; margin:0 5% 0 2%;}

.login_form{width:80%; height:350px;   background:#a5a5a6; border-radius:0px 30px 30px 30px; margin:0 auto; margin-top:10px; } 
.login_form p{ color:#111; text-align:left; margin-left:20px; padding-top:10px; font-family: myriad pro; }

form{ width:100%; height:auto;text-align:left;}

.txtbox {    width: 100%;    padding: 5px 10px;    margin: 4px 0;    display: inline-block;    border: 1px solid #ccc;    box-sizing: border-box; }

.form-container {   width:100%; /*background-color:#333;*/ height:110px; padding-left:15%; padding-top:10px;}

.usernamelog{ float:left; text-align:left; margin-top:20    px; width:60%; height:80px; margin-left:-12px; /*background-color:#999;*/}
.usernamelog label{float:left; text-align:left; font-size:11px; position:relative; left:10%;font-family: myriad pro; }
.usernamelog input{float:left; position:relative; bottom:25px; left:80px; font-size: 12px;}

.psw{float:left; margin-top:-40px; width:60%; margin-left:-12px; /* background-color:#999;*/} 
.psw label{float:left; text-align:left; font-size:11px; position:relative; left:10%;font-family: myriad pro;}
.psw input{float:left; position:relative; bottom:25px; left:80px;font-size: 12px;}

.checkbtn{float:left; margin-top:0px; width:60%; margin-left:-12px;float:left; text-align:left; font-size:11px; position:relative;font-family: myriad pro;font-size: 12px;left:80px; bottom:20px;}
.checkbtn label{ margin-left:5px;}


.frmbtn{ width:100%; float:left;margin-left: -22px; margin-top:-16px;}
.frmbtn button {    background-color: #0fbfea;    color: white;    padding: 4px 8px;    border: solid 1px #0fbfea;    cursor: pointer; margin-left:55%;     }
.frmbtn button:hover { border: solid thin #FFF; color:#fff;}

.register{width:100%;}
.register p{width:100%; float:left; text-align:left; margin-left:10%; font-family: myriad pro;}
.register p a{  float:left; text-align:left; text-decoration:none; color:#515151; }
.register p a:hover{ color:#000;}

.footerflags{ width:100%;margin-top:26px;}
.flagone{ width:10%;text-align:center; float:left; margin-top: -6px;}
.flagone img{ width:15%; margin-top:20px;margin-bottom: 6px; }
.flagone p{ color:#fff; font-size:14px; font-family: myriad pro;}

input[type=checkbox], input[type=radio] {    position: relative;
    top: 2.5px;}
/******************************************************** RESPONSIVE CODINGS *************************************************/

@media screen and (min-width:1280px){   

    .container .logo img{ width:90%; margin-top:-20px; margin-left:5%;}
    .maincontent img{ width:45px; margin-top:4px; margin-bottom:8px; }
}

@media screen and (min-width:1024px) and (max-width:1279px){
    .container { width: 50%; text-align:center;  }  
    .container .logo img{ width:80%; margin-top:-20px; margin-left:10%;}
    .maincontent img{ width:50px; margin-top:0px;  }
    .maincontent .feat_images img {margin: 0 0 0 4%;}
    .maincontent .feat_images {margin-left: -15px;width:100%}
    .form-container {padding-left: 5%;}
    .flagone img {width: 30%; }

}

@media screen and (min-width:800px) and (max-width:1024px){
    .container { width: 50%; text-align:center;  }  
    .request_more img{ width:120px; }
    .container .logo img{ width:100% !important; margin-top:0px; margin-left:0% !important;}
    .maincontent img{ width:50px; margin-top:0px;  }
    .maincontent .feat_images img {margin: 0 6% 0 1%;}
    .maincontent .feat_images {margin-left: 9px;width: 100%;}
    .login_form {    width: 90%;}
    .form-container {    padding-left: 5%;}
    .register p{margin-left:6%; font-size:11px; }
    .flagone img {width: 35%; }


}

@media screen and (min-width:600px) and (max-width:799px){
.container { width: 75%; text-align:center;  }  
    header{ height:40px; margin-top:10px;}
    .request_more img{ width:120px; }
    .sociallinks{float:right; margin:15px 15% 10px 20px;}
    .container .logo img{ width:90%; margin-top:50px;}
    .maincontent p{ width:100%; font-size:12px; margin-top:20px;}
    .feat_images{width:100%; height:auto; /*background-color:#003;*/ margin:0 auto; margin-top:23px; }
    .feat_images img{width:20%; margin:0 0% 0 0%;}
    .login_form {height: 220px;width: 80%;}
    .form-container {    padding-left: 0%;}
    .register p{margin-left:8%; font-size:11px; }
    .flagone p{ color:#fff; font-size:10px;}
    .flagone img {width: 50%; }
    .usernamelog{margin-left:15px; }
    .psw{margin-left:15px; }
    .frmbtn{margin-left:15px; }
    .modal-header .close {margin-left: -14px;}


}

@media screen and (min-width:480px) and (max-width:599px){
.container {    width: 100%; text-align:center;  }  
    header{ height:40px; margin-top:10px;}
    .request_more img{ width:120px; }
    .sociallinks{float:right; margin:15px 15% 10px 20px;}
    .container .logo img{ width:90%; margin-top:50px;}
    .maincontent p{ width:100%; font-size:12px; margin-top:20px;}
    .maincontent .feat_images{width:100%; height:auto; /*background-color:#003;*/ margin:0 auto; margin-top:23px; }
    .maincontent .feat_images img{width:20%; margin:0 0% 0 0%;}
    .login_form {height: 220px;width: 83%;}
    .usernamelog{margin-left:16px;}
    .psw{margin-left:16px;}
    .form-container {    padding-left: 0%;}
    .register p{margin-left:10%; font-size:11px; }
    .flagone p{ color:#fff; font-size:10px;}
    .flagone img {width: 50%; }
    .modal-header .close {margin-left: -20px;}

}

@media screen and (min-width:320px) and (max-width:479px){

.container {    width: 100%; text-align:center;  }  
header{ text-align:center;}
.request_more{ margin:0 !important; float:none;}
.sociallinks{float:none; margin:0 !important;}
.sociallinks img{ padding:0 !important; margin-top:10px;}
.container .logo img{ width:90%; margin-top:50px;}
.maincontent img{ margin-top:22px;  }
.maincontent p{ width:90%; margin-left: 10px; color:#fff; margin-top:20px;font-size: 12px;}
.maincontent .feat_images{width:100%;margin-top:20px;margin-left: -3px;}
.maincontent .feat_images img{width:20%; margin:0% !important;}
.login_form{width:100%; height:340px; border-radius:0px 25px 25px 25px;margin-top:50px; }
.login_form p{ color:#313131; float:left; margin-top:20px;} 
.usernamelog{ float:left; margin-top:25px; width:70%; height:80px; margin-left:-15%;}
.psw{ float:left; margin-top:25px; width:70%; height:80px; margin-left:-15%; margin-top:-15px;} 
.register p{ text-align:left; margin-left:6%; font-size:12px;}

.flagone{ width:30%; margin-left:0 !important;  }
.flagone img{ width:30%; }
.flagone p{ color:#fff;}

}

@media screen and (max-width:319px){

.container {    width: 120%; text-align:center; margin-left:-28px; }    
header{ text-align:center;}
.request_more{ margin:0 !important; float:none;}
.sociallinks{float:none; margin:0 !important;}
.sociallinks img{ padding:0 !important; margin-top:10px;}
.container .logo img{ width:90%; margin-top:50px;}
.maincontent img{ margin-top:8px;  }
.maincontent p{ width:93%; margin:0 auto; color:#fff; margin-top:20px;font-size: 12px;margin-left:10px;}
.maincontent .feat_images{width:100%;margin-top:20px;margin-left: -2px;}
.maincontent .feat_images img{width:20%; margin:0% !important;}
.login_form{width:90%; height:340px; border-radius:0px 25px 25px 25px; margin-left:5%; margin-top:16px; }
.login_form p{ color:#313131; float:left; margin-top:20px;} 
.usernamelog{ float:left; margin-top:25px; width:70%; height:80px; margin-left:-17%;}
.psw{ float:left; margin-top:25px; width:70%; height:80px; margin-left:-17%; margin-top:-28px;} 
.register p{ text-align:left; margin-left:8%; font-size:12px;}
.frmbtn { margin-top: -36px;}
.flagone{ width:30%; margin-left:0 !important;  }
.flagone img{ width:30%; }
.flagone p{ color:#fff;}

}
   
.errorval1 {
    left: 110px;
    color: #FF0000;
    font-size: 13px;
    text-align: center;
} 
  .animated_fade_block {
    height:auto !important;
    width:auto !important;
}
.modal_headinner {
    padding:0;
}
.header_passinner {
    background-color:#4d4d4d;
}
.modalhead_btn {
    float: right;
    left: 572px;
    position: absolute;
    top: 10px;
}
.modalhead_btn_inner {
    background: #ffffff;
    padding: 0 3px;
}
.userpass_text {
    font-size:24px;
    background-color: #4d4d4d;
    float: left;
    padding:4px;
    text-align: center;
    width: 100%;
    color:#CCCCCC;
}
.form-group input {
    float: left;
    margin: 0 20px 5px;
    width: 90%;
}
.form-group input:focus { 
    border-color: #3c8dbc !important;
}
.col-sm-10 input {
    float: left;
    margin: 0 0 0 0;
    width: 100%;
}
.poinput_labelfirst {
    margin:20px 18px 10px 20px;
}
.poinput_labellast {
    margin:0 18px 12px 20px;
}
.poinput_errormess {
    margin: 0 20px 5px;
    color:#FF0000 !important
}
.modal-footer .bttn {
    background-color:#00c0ef;
    margin-right: 20px;
}
.back-login a {
    background-color: #dcdcdc;
    color: #949494;
    float: left;
    padding: 14px 10px 14px 40px;
    margin-top: -13px;
    width: 100%;
}
.modal-body {
    padding: 20px !important;
}
.modal-body .form-group .content p {
    float: left;
    margin: 0;
    padding: 0 18px 18px 5px;
    width: 100%;
    word-break: break-word;
}
.email_address {
    margin:5px 18px 10px 20px;
}
.modal-header {
    padding:0 !important;
}
.email_address_input {
    float: left;
    margin: 0 20px 5px;
    width: 90%;
}
.inmodal .modal-body {
    background:#FFFFFF !important;
    width: 100%;
}
.modal-footer input {
    background-color: #00c0ef !important;
    border-color: #269abc !important;
}
.errorval1{ display:none;}
.sessmsg{
left: 110px;
    color: #FF0000;
    font-size: 13px;
    text-align: center;
 } 
  .sucessmsg
 {
    left: 110px;
    color: #1ab394;
    font-size: 13px;
    text-align: center;
 }
 .errmsg
 {
    left: 110px;
    color: #FF0000;
    font-size: 13px;
    text-align: center;
 }
 
   </style>

 

    <!-- Scripts -->

    <script>

        window.Laravel = <?php echo json_encode([

            'csrfToken' => csrf_token(),

        ]); ?>

    </script>


</head>

 <body style="background:#545456">
         
         <div class="wrapper">

    @yield('content')

    <!-- Scripts -->
</div>
    <script src="{{ asset('/js/app.js') }}"></script>

</body>

</html>

