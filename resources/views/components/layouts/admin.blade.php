<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('backend/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}" type="image/x-icon">
    <title>Riho </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css" integrity="sha512-<hash>" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ico-font-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/icofont@1.0.1-alpha.1/icofont.min.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/7.2.3/css/flag-icons.min.css" integrity="sha512-bZBu2H0+FGFz/stDN/L0k8J0G8qVsAL0ht1qg5kTwtAheiXwiRKyCq1frwfbSFSJN3jooR5kauE0YjtPzhZtJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Feather icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icon@0.1.0/css/feather.min.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/jsgrid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('backend/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
     
    @livewireStyles
  </head>
  <body> 
    <!-- loader starts-->
    <div class="loader-wrapper">
      <div class="loader"> 
        <div class="loader4"></div>
      </div>
    </div>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('components.layouts.header')
    @include('components.layouts.sidebar')
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
    {{ $slot }}

     </div>
        </div>

     <!-- latest jquery-->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('backend/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('backend/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('backend/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('backend/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('backend/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('backend/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('backend/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('backend/js/sidebar-pin.js') }}"></script>
    <script src="{{ asset('backend/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('backend/js/slick/slick.js') }}"></script>
    <script src="{{ asset('backend/js/header-slick.js') }}"></script>
       <!-- Theme js-->
    <script src="{{ asset('backend/js/script.js') }}"></script>
    @customLivewireScripts
  </body>

</html>

<script>
$('#addoks').on('click', function(){
  setTimeout(function(){
    alert('sfdfsfs');
  },3000);
})
</script>