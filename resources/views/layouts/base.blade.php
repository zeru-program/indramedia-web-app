<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indramedia Store</title>
    <!--  stylesheet public (bootstrap icons typography) and library  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
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
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
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