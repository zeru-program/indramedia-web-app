<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
    <title>Indramedia - Register</title>
    <!--  stylesheet public (bootstrap icons typography) and library  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <!--  stylesheet lokal   -->
    <link rel="stylesheet" href="/css/global.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
     @yield('styles')
</head>
<body>
    <main class="w-100 bg-light d-flex justify-content-center py-5 align-items-start">
        <section class="d-flex container-fluid flex-column justify-content-center shadow-sm rounded-2 box-auth" style="background: #FFFFFF">
            <h1 class="text-center fw-b">Register</h1>
            <span class="text-center mb-4">Indramedia store</span>
            <form action="{{ route('register.post') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-2 col-12">
                        <label for="username">Username</label>
                        <input type="text" name="username" minlength="3" placeholder="masukan username" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-12">
                        <label for="password">Password</label>
                        <div class="position-relative">
                            <input type="password" name="password" id="password" minlength="3" placeholder="masukan password" class="form-control" style="padding-right: 45px" required>
                            <div class="position-absolute" style="font-size: 25px;right: 20px;top: 8px;cursor: pointer" onclick="handleEye()">
                                <i class="bi-eye-slash-fill icon-eyes-pass"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" minlength="6" placeholder="masukan email" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-12">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" min="6" placeholder="masukan phone" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-12">
                        <label for="gender">Gender</label>
                        <div class="w-100 h-auto py-2 form-control">
                            <div class="form-check">
                                <input class="form-check-input" name="gender" type="radio" value="true" id="gender_input_laki" required>
                                <label class="form-check-label" for="gender_input_laki">
                                  Laki-laki
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" name="gender" type="radio" value="false" id="gender_input_perempuan">
                                <label class="form-check-label" for="gender_input_perempuan">
                                  Perempuan
                                </label>
                              </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="w-100 mt-4 btn btn-primary">Register</button>
                <div class="w-100 d-flex justify-content-center mt-3">
                    <span class="text-center">
                        Sudah Punya Akun?
                        <a href="{{ route('login') }}"> Login Disini.</a>
                    </span>
                </div>
            </form>
        </section>
    </main>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    </script>
    @if (session()->has('error'))
    <script>
        toastMixin.fire({
            animation: true,
            icon: 'error',
            title: "{{ session('error') }}"
        });
    </script>
    @endif
    @if ($errors->any())
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ $errors }}"
            });
        </script>
    @endif
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