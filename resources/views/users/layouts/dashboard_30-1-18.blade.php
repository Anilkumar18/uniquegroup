<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="{{ asset("/custom_css/bootstrap.min.css")}}" rel="stylesheet">

    <link href="{{ asset("/font-awesome/css/font-awesome.css")}}" rel="stylesheet">

     <!-- Toastr style -->
    <link href="{{ asset("/custom_css/plugins/toastr/toastr.min.css")}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset("/custom_css/plugins/gritter/jquery.gritter.css")}}" rel="stylesheet">

    <link href="{{ asset("/custom_css/animate.css")}}" rel="stylesheet">
    
    <link href="{{ asset("/custom_css/style.css")}}" rel="stylesheet">


    <link href="{{ asset("/custom_css/custom_style.css")}}" rel="stylesheet">



    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('Theuniquegroup | Dashboard', 'Theuniquegroup | Dashboard') }}</title>


 <style type="text/css">
     
     .dashboard-mainimg{width:100%; height:auto;}

     .saveicon {
    color: #1ab394;
}
.saveimgicon {
    margin-top: -7px;
}
li.uniquelogo-img {text-align: center; width:75.5%;}
 </style>

    <!-- Styles -->

   <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" > -->



    <!-- Scripts -->

    <script>

        window.Laravel = <?php echo json_encode([

            'csrfToken' => csrf_token(),

        ]); ?>

    </script>

</head>

<body>

  <div id="wrapper">

    <!-- Header -->
    @include('users.includes.sidebar')

   </div> 
 
    @include('users.includes.header')  


    <div id="page-wrapper" class="gray-bg dashbard-1">

             

            @yield('content')

       

        @include('admin.includes.footer')

    
</div>

  <!-- Scripts -->

   <script src="{{ asset('/js/app.js') }}"></script>

    @include('admin.includes.commonjs')



<script type="text/javascript">


    
    

     $(document).ready(function() {    

    var passvalidator =$( "#changepasswordform" ).validate({
          rules: {
            oldpassword: {
              required: true
            },
                password : {
                    required : true
                },
                confirmed : {                    
                    equalTo : "#password"
                }
            
          }
        }); 

    });
</script>

</body>

</html>

