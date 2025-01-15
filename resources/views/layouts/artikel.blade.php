<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/new/logo-1.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/new/logo-1.png') }}" type="image/x-icon">
    @yield('meta-title')
	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- # CSS Plugins -->
	<link rel="stylesheet" href="/plugins/slick/slick.css">
	<link rel="stylesheet" href="/plugins/font-awesome/fontawesome.min.css">
	<link rel="stylesheet" href="/plugins/font-awesome/brands.css">
	<link rel="stylesheet" href="/plugins/font-awesome/solid.css">

	<!-- # Main Style Sheet -->
	<link rel="stylesheet" href="/css/style.css">
    <!--  stylesheet public (bootstrap icons typography) and library  -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/css/libs/animate.min.css" rel="stylesheet">
    <!--  stylesheet lokal   -->
    <link rel="stylesheet" href="/css/global.css"/>
    @yield('styles')
    </head>
    <body>
        
        <!-- navbar -->
        @include('partials.nav')
        <!-- navbar -->
        
        
        <!-- content -->
        @yield('content')
        <!-- content -->
        
        @include('partials.footer')
        
        
        <!-- back to top -->
        @include('partials.btn-top')
        <!-- back to top -->
        
    <!-- # JS Plugins -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="/plugins/slick/slick.min.js"></script>
    <script src="/plugins/scrollmenu/scrollmenu.min.js"></script>

    <!-- Main Script -->
    <script src="/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });
    function handleTop() {
            $(window).scrollTop("0")
     }
     function handleDetailProduk(brand, id) {
         window.location.href = "/produk/" + brand + "/" + id
     }
    $(document).ready(function () {
        var heightHero = $(".hero").height()
        if ($(".hero").length > 0) {
        $(window).scroll(function() {
            var scrollTopWindow = parseInt($(this).scrollTop())
            
            if (scrollTopWindow >= heightHero) {
                $(".navbar").addClass("bg-pm")
                $(".navbar").addClass("shadow-sm")
                $(".menu-icon").addClass("text-dark")
                $(".nav-link").addClass("text-dark")
                $(".nav-link").removeClass("text-light")
                $(".btn-back-to-top").css("opacity", "1")
                $(".img-brand-nav").attr("src", "/images/nav-text-dark.png")
            }
            if (scrollTopWindow <= heightHero) {
                $(".navbar").removeClass("bg-pm")
                $(".navbar").removeClass("shadow-sm")
                $(".menu-icon").removeClass("text-dark")
                $(".nav-link").removeClass("text-dark")
                $(".nav-link").addClass("text-light")
                $(".btn-back-to-top").css("opacity", "0")
                $(".img-brand-nav").attr("src", "/images/nav-white.png")
                // $(".img-brand-nav").attr("src", "/images/new/logo-3.png")
            }
            
        })
        } else {
           $(".nav-link").addClass("text-dark")
           $(".nav-link").removeClass("text-light")
           $(".menu-icon").addClass("text-dark")
           $(".navbar").addClass("bg-pm")
           $(".navbar").addClass("shadow-sm")
           $(".img-brand-nav").attr("src", "/images/nav-text-dark.png")
        }
    })
    </script>
     @yield('scripts')
        
    </body>
</html>