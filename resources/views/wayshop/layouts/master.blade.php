<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>K and K || Ecommerce Shop</title>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('front_asset/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('front_asset/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('front_asset/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('front_asset/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('front_asset/img/apple-touch-icon-144x144-precomposed.png')}}">
	
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('front_asset/css/bootstrap.custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/style.css')}}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="{{asset('front_asset/css/home_1.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/product_page.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/account.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/cart.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/checkout.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/listing.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/about.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/blog.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/blog.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/contact.css')}}" rel="stylesheet">

    
    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('front_asset/css/custom.css')}}" rel="stylesheet">


  <!-- Autocomplete CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('jqueryui/jquery-ui.min.css')}}">



</head>

<body>
	
	<div id="page">
    @include('wayshop.layouts.header')
    @yield('content')
    @include('wayshop.layouts.footer')	
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="{{asset('front_asset/js/common_scripts.min.js')}}"></script>
    <script src="{{asset('front_asset/js/main.js')}}"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="{{asset('front_asset/js/modernizr.js')}}"></script>
	<script src="{{asset('front_asset/js/video_header.min.js')}}"></script>
  <script src="{{asset('front_asset/js/carousel-home.min.js')}}"></script>
  <script  src="{{asset('front_asset/js/carousel_with_thumbs.js')}}"></script>
  <script src="{{asset('front_asset/js/sticky_sidebar.min.js')}}"></script>
	<script src="{{asset('front_asset/js/specific_listing.js')}}"></script>
  <script src="js/carousel-home.js"></script>

  <!-- Autocomplete search js -->
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<!-- Toaster -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break; 
            }
            @endif 
    </script>



  <script>
    $(document).ready(function(){
      $("#selSize").change(function(){
    <!-- alert("test"); -->
       var idSize = $(this).val();
       if(idSize==""){
           return false;
       }
       $.ajax({
           type : 'get',
           url : '/get-product-price',
           data : {idSize:idSize},
           success:function(resp){
            <!-- alert(resp); -->
            var arr= resp.split('#');
            $("#getPrice").html("Rs. "+arr[0]);
            $('#price').val(arr[0]);
           },error:function(){
               alert("Error");
           }
         });
      });
    
      $("#billtoship").click(function(){
      if(this.checked){
        $("#shipping_name").val($("#billing_name").val());
        $("#shipping_address").val($("#billing_address").val());
        $("#shipping_city").val($("#billing_city").val());
        $("#shipping_state").val($("#billing_state").val());
        $("#shipping_country").val($("#billing_country").val());
        $("#shipping_pincode").val($("#billing_pincode").val());
        $("#shipping_mobile").val($("#billing_mobile").val());
      }else{
        $("#shipping_name").val('');
        $("#shipping_address").val('');
        $("#shipping_city").val('');
        $("#shipping_state").val('');
        $("#shipping_country").val('');
        $("#shipping_pincode").val('');
        $("#shipping_mobile").val('');
      }

    });
    });
    function selectPaymentMethod(){
      if($('.stripe').is(':checked') || $('.cod').is(':checked')){
        // alert('checked');
      }else{
        alert('Please Select Payment Method');
        return false;
      }
    }
  </script>



	<script>
		// Video Header
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>
	<script src="{{asset('front_asset/js/isotope.min.js')}}"></script>

	<script>
		// Isotope filter
		$(window).on('load',function(){
		  var $container = $('.isotope-wrapper');
		  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
		});
		$('.isotope_filter').on( 'click', 'a', 'change', function(){
		  var selector = $(this).attr('data-filter');
		  $('.isotope-wrapper').isotope({ filter: selector });
		});
	</script>

  <!-- Autocomplete -->
   <!-- Script -->
   <script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

    $( "#employee_search" ).autocomplete({
        source: function( request, response ) {
        // Fetch data
        $.ajax({
            url:"{{route('employees.getEmployees')}}",
            type: 'post',
            dataType: "json",
            data: {
            _token: CSRF_TOKEN,
            search: request.term
            },
            success: function( data ) {
            response( data );
            }
        });
        },
        select: function (event, ui) {
        // Set selection
        $('#employee_search').val(ui.item.label); // display the selected text
        $('#employeeid').val(ui.item.value); // save selected id to input
        return false;
        }
    });

    });
</script>

</body>
</html>