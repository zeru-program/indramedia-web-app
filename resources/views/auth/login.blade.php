<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indramedia - Login</title>
    <!--  stylesheet public (bootstrap icons typography) and library  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <!--  stylesheet lokal   -->
    <link rel="stylesheet" href="/css/global.css"/>
     @yield('styles')
</head>
<body>
    <main class="w-100 bg-light vh-100 d-flex justify-content-center align-items-center position-fixed start-0 top-0">
        <section class="d-flex container-fluid flex-column justify-content-center shadow-sm rounded-2 box-auth" style="background: #FFFFFF">
            <h0 class="text-center fw-bold">Login</h0>
            <h1 class="text-center mb-4">Indramedia store</h1>
            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-2 col-12">
                        <label for="username">Username</label>
                        <input type="text" name="username" autocomplete minlength="3" placeholder="masukan username" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-12">
                        <label for="password">Password</label>
                        <div class="position-relative">
                            <input type="password" name="password" id="password" minlength="3" placeholder="masukan password" class="form-control" style="padding-right: 40px" required>
                            <div class="position-absolute" style="right: 15px;top: 8px;cursor: pointer" onclick="handleEye()">
                                <i class="bi-eye-slash-fill icon-eyes-pass"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @if(session()->has('error_login'))
                  <span class="w-100 d-flex justify-content-center text-danger text-center mt-2" style="font-size: 14px">{{ session('error_login') }}</span>
                @endif
                <button type="submit" class="w-100 mt-4 btn btn-primary">Login</button>
            </form>
        </section>
    </main>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
        let isPassEyeClicked = false;
        function handleEye() {
            isPassEyeClicked = !isPassEyeClicked
            if (isPassEyeClicked) {
                $('#password').attr("type", "text")
                $('.icon-eyes-pass').removeClass('bi-eye-slash-fill')
                $('.icon-eyes-pass').addClass('bi-eye-fill')
            } else {
                $('#password').attr("type", "password")
                $('.icon-eyes-pass').removeClass('bi-eye-fill')
                $('.icon-eyes-pass').addClass('bi-eye-slash-fill')
            }
        }
    </script>
</body>
</html>