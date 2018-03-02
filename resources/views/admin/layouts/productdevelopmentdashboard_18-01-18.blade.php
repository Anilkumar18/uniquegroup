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

    <link href="{{ asset("/custom_css/admin.css")}}" rel="stylesheet">

    

     <link href="{{ asset("/custom_css/jquery.dataTables.min.css")}}" rel="stylesheet">

    

    <link href="{{ asset("/custom_css/custom.css")}}" rel="stylesheet">

     <link href="{{ asset("/custom_css/responsive.css")}}" rel="stylesheet">

    



<link rel="stylesheet" href="{{ asset("/custom_css/custom_style.css")}}">

 

    <!-- CSRF Token -->



    <meta name="csrf-token" content="{{ csrf_token() }}">







    <title>{{ config('Theuniquegroup | Dashboard', 'Theuniquegroup | Dashboard') }}</title>







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

    @include('admin.includes.sidebar')



    <div id="page-wrapper" class="gray-bg">



        @include('admin.includes.header')



        <div class="wrapper wrapper-content animated fadeInRight">

            @yield('content')

        </div>







        @include('admin.includes.footer')



    </div>

</div>











  <!-- Scripts -->



   <script src="{{ asset('/js/app.js') }}"></script>











    <script src="{{ asset('/js/custom/pdmdashboard_custom.js') }}"></script>



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



