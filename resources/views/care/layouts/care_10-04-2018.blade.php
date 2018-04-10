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

 <link href="{{ asset("/custom_css/plugins/steps/jquery.steps.css")}}" rel="stylesheet">

    <!-- Gritter -->

    <link href="{{ asset("/custom_css/plugins/gritter/jquery.gritter.css")}}" rel="stylesheet">



    <link href="{{ asset("/custom_css/animate.css")}}" rel="stylesheet">

    <link href="{{ asset("/custom_css/admin.css")}}" rel="stylesheet">

    <link href="{{ asset("/custom_css/ecommerce.css")}}" rel="stylesheet">

    

     <link href="{{ asset("/custom_css/jquery.dataTables.min.css")}}" rel="stylesheet">

    

    <link href="{{ asset("/custom_css/custom.css")}}" rel="stylesheet">

     <link href="{{ asset("/custom_css/responsive.css")}}" rel="stylesheet">

    
<link href="{{ asset('/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">


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

    @include('sidebar')



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




    <script src="{{ asset('/js/custom/ecommerce.js') }}"></script>


<link href="{{ asset('/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
<link href="{{ asset('/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

<link href="{{ asset('/css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet">
    @include('admin.includes.commonjs')



<script src="{{ asset('/js/plugins/staps/jquery.steps.min.js') }}"></script>



<script type="text/javascript">



     $(document).ready(function(){
            $("#wizard").steps();
            $(".wizard").ready(function(){ $(".steps li").addClass("done");});
            $("#form").steps({
                enableAllSteps: true,
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            },
                            careWash:{
                                 required: true
                            },
                            careBleach:{
                                 required: true
                            },
                            careDryClean:{
                                 required: true
                            },
                            careDry:{
                                 required: true
                            },
                            careIron:{
                                 required: true
                            },
                            styleNo:{
                                required:true
                            },
                            season:{
                                required:true
                            },
                            countryOfOrigin:{
                                required:true
                            },
                            fabriccompositionstatus:
                            {
                                required:true
                            }
                        },
          messages: {
                fabriccompositionstatus: {
                    required: "Fabric Composition should be 100%"
                }
            }
                    });
       });

</script>





</body>



</html>



