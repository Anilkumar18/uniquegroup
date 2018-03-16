@include('validateuser')
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
    
    <link href="{{ asset("/custom_css/newdevelopment.css")}}" rel="stylesheet">

<link href="{{ asset("/css/plugins/steps/jquery.steps.css")}}" rel="stylesheet">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Laravel') }}</title>



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

        @include('users.includes.header')

       
            @yield('content')
        



        @include('users.includes.footer')

    </div>
</div>





  <!-- Scripts -->

   <script src="{{ asset('/js/app.js') }}"></script>
   
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>



   <script src="{{ asset('/js/custom/products_custom.js') }}"></script>
 
<!-- Steps -->
    <script src="{{ asset('/js/plugins/staps/jquery.steps.min.js') }}"></script>

    <script src="{{ asset('/js/custom/update_stepprocess.js') }}"></script>

    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
   
    @include('admin.includes.commonjs')


<script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#productsadd").steps({
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
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

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
                //Defect: validation
                //Vidhya:php team
                //Add validation code
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            },RawMaterial: {
                              required: true
                          },Thickness: {
                              required: true,
                              digits:true
                          },Width: {
                              required: true
                              
                          },Height: {
                              required: true
                          },Length: {
                              required: true
                          },print_color1: {
                              required: true
                          },CuttingName: {
                              required: true
                          },ProductionRegions1: {
                              required: true
                          },ProductionRegions: {
                              required: true
                          },uniquefactory1: {
                              required: true
                          },factoryName: {
                              required: true
                          },imgInp3: {
        required: function(element){
            return $("#selectimage3").val().length == 0;
        }
    },Color: {
      required: true
    },
   Hook_Width: {
      required: true
    },
   Hook_Length: {
      required: true
    },
    hook_Thickness:{
      required: true
    },
  Hook_UniqueProductCode: {
      required: true,
      alphanumeric: true
    },
  Hooks_ProductionRegions1: {
      required: true
    },
  uniquefactory_hooks1: {
      required: true
    },
  Hook_StatusName: {
      required: true
    },
  imgInp: {
      required: function(element){
            return $("#selectimage").val().length == 0;
        }
    },
  Tissuepaper_Thickness: {
      required: true,
      digits:true
    },
  tissuepaper_Width: {
      required: true
    },
  tissuepaper_Length: {
      required: true
    },
  GroundPaperColor: {
      required: true
    },
  Tissuepaper_PrintType: {
      required: true
    },
  tissueprintcolor: {
      required: true
    },
  tissuepaper_print_color1: {
      required: true
    },
  TissuePaper_ProductionRegions1: {
      required: true
    },
  uniquefactory_tissuepaper1: {
      required: true
    },
  Tissuepaper_Cutting: {
      required: true
    },
  Tissuepaper_UniqueProductCode: {
      required: true,
      alphanumeric: true
    },
  Tissuepaper_factoryName: {
      required: true
    },
  Tissuepaper_StatusName: {
      required: true
    },
  imgInp1: {
      required: function(element){
            return $("#tissuelist_selectimage").val().length == 0;
        }
    },
  PackageThickness: {
      required: true,
      digits:true
    },
  package_Width: {
      required: true
    },
  package_Length: {
      required: true
    },
  TypeofAdhesive: {
      required: true
    },
  Shape: {
      required: true
    },
  Package_PrintType: {
      required: true
    },
  packageprintcolor: {
      required: true
    },
  packageprint_color1: {
      required: true
    },
  Package_Cutting: {
      required: true
    },
  Package_UniqueProductCode: {
      required: true,
      alphanumeric: true
    },
  PackagingStickers_ProductionRegions1: {
      required: true
    },
  uniquefactory_packagingstickers1: {
      required: true
    },
  Package_StatusName: {
      required: true
    },
  imgInp2: {
      required: function(element){
            return $("#selectimage2").val().length == 0;
        }
    },
  UnitofMeasurement: {
      required: true
    },
  MinQuantity: {
      required: true,
      number: true
    },
  Minordervalue: {
      required: true,
      number: true
    },
  packsize: {
      required: true,
      number: true
    },
  samplecost: {
      required: true,
      number: true
    },
    PricingMethod:{
      required:true
    },
    productcode:{
      required:true,
      digits:true
    },
    uniqueproductcode:{
      required:true,
      alphanumeric: true
    },
    productname:{
      required:true
    },
    Inventory:{
            required:true
          },
    inventoryProjection:{
      digits:true
    },
    inventoryMaximumpiecesonstock:{
     required: function(element){
            return $("#Inventory").val()== 1;
        },
      digits:true
    },
    MoldCosting:{
      digits:true
    },
    inventoryMinimumpiecesonstock:{
      required: function(element){
            return $("#Inventory").val()== 1;
        },
      digits:true
    },inventoryProductionRegions1:{
   required: function(element){
            return $("#Inventory").val()== 1;
        } 
 },
 inventoryuniquefactory1:{
  required: function(element){
            return $("#Inventory").val()== 1;
        }
 },
    NumberOfSamplesRequired:{
      required: true,
      digits:true
    },
   ProductSubGroupName:{
    required: true
  },
  CustomerName:{
    required: true
  },
  Warehouse_Name:{
    required: true
  },
  StatusName:{
    required: true
  },
  ProductProcess:{
    required: true
  },
  description:{
    required: true
  },
  SampleLeadTime:
  {
    required:true,
    digits:true
  },
  ProductionLeadTime:
  {
    required:true,
    digits:true
  },
  HooksMaterial:
  {
    required:true
  },
  Tissuepaper_RawMaterial:{
    required:true
  },
  PackagingStickersTypes: {
    required:true
  },imgInpsample: {
    required:true
  }


                        },
                        messages: {
                         productcode: {
                         required: "Please Enter the Product Code",
                         digits: "Please Enter the Valid code"
                         },
                         uniqueproductcode: {
                         required: "Please Enter the Unique Product Code",
                         alphanumeric: "Enter Numbers and Letters Only"
                         },
                         Hook_UniqueProductCode: {
                          required: "Please Enter the Unique Product Code",
                         alphanumeric: "Enter Numbers and Letters Only"
                         },
                         Tissuepaper_UniqueProductCode: {
                          required: "Please Enter the Unique Product Code",
                         alphanumeric: "Enter Numbers and Letters Only"
                         },
                         Package_UniqueProductCode: {
                          required: "Please Enter the Unique Product Code",
                         alphanumeric: "Enter Numbers and Letters Only"
                         },
                         MoldCosting: {
                          required: "Please Enter the Mold Costing Code",
                         digits: "Please Enter the Valid code"
                         },
                         inventoryMaximumpiecesonstock: {
                          required: "Please Enter the Maximum Stock Number",
                         digits: "Please Enter the Valid Number"
                         },
                         inventoryMinimumpiecesonstock: {
                          required: "Please Enter the Minimum Stock Number",
                         digits: "Please Enter the Valid Number"
                         },
                         SampleLeadTime: {
                          required: "Please Enter the Lead Time",
                         digits: "Please Enter the Valid Number"
                         },
                         ProductionLeadTime: {
                          required: "Please Enter Production Lead Time",
                         digits: "Please Enter the Valid Number"
                         }
                        }
                    });
       });
    </script>
</body>

</html>

