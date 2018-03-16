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
    <link href="{{ asset("/custom_css/admin.css")}}" rel="stylesheet">
    
     <link href="{{ asset("/custom_css/jquery.dataTables.min.css")}}" rel="stylesheet">
    
    <link href="{{ asset("/custom_css/custom.css")}}" rel="stylesheet">
     <link href="{{ asset("/custom_css/responsive.css")}}" rel="stylesheet">
    

<link rel="stylesheet" href="{{ asset("/custom_css/custom_style.css")}}">

<link rel="stylesheet" href="{{ asset("/css/plugins/sweetalert/sweetalert.css")}}">

<link href="{{ asset("/custom_css/pdm.css")}}" rel="stylesheet">

<link href="{{ asset("/custom_css/maintenence.css")}}" rel="stylesheet">
 
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

   </div> 
 
    


    <div id="page-wrapper" class="gray-bg dashbard-1">

     @include('users.includes.header')        

            @yield('content')

       

        @include('users.includes.footer')

    
</div>

  <!-- Scripts -->

   <script src="{{ asset('/js/app.js') }}"></script>

   <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
   
   <script src="{{ asset('/js/custom/developmentlist_custom.js') }}"></script>

    @include('users.includes.commonjs')

    <script type="text/javascript">
        $(".deletedevelopmentlist").click(function(){ 
  
  
   
   var href=$(this).data("href");
   
      if(href!="")
     
     {      
        swal({
        title: "Are you sure to delete the selected Development Product Item?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00ADEF",
        confirmButtonText: "Yes, do it!",
        closeOnConfirm: false
      },
      function(){
        document.thisForm.action=href;
      document.thisForm.submit();
      });
      }
  });

        
        $(".developmentduplicate").click(function(){ 
    
     var href=$(this).data("href");
   //alert(href);
      var clonetr=$(this).parent().parent();
        $.ajax({
             url     : href,
             type    : 'get',
             cache   :false,
             success :function(data)
             {
               debugger;
                  
                clonetr.clone().appendTo("#example1:last");

        var pp=$("#example1 tr:last");

            pp.find('.processdetails').each(function() {
               pp.find('.version_duplicate').each(function() {           
            $(this).html($(this).html().replace(data[0]["version_old"],data[0]["version_new"]));
        });
                var text = $(this).html();

                
                $(this).html(replaceAll(text, data[0]["edit_id"],  data[0]["duplicate_id"]))

                
            });
           
            $(".deletedevelopmentlist").click(function(){ 
  
   var href=$(this).data("href");
   
      if(href!="")
     
     {      
        swal({
        title: "Are you sure to delete the selected Development Product Item?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00ADEF",
        confirmButtonText: "Yes, do it!",
        closeOnConfirm: false
      },
      function(){
        document.thisForm.action=href;
      document.thisForm.submit();
      });
      }
  });

             },
             error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }

        });

    
  });

        function escapeRegExp(string){
        return string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
        }
         
        /* Define functin to find and replace specified term with replacement string */
        function replaceAll(str, term, replacement) {
          return str.replace(new RegExp(escapeRegExp(term), 'g'), replacement);
        }

    </script>





</body>

</html>

