    <nav class="navbar py-2 navbar-expand-lg position-fixed w-100 top-0 start-0">
      <div class="container-fluid">
        <img src="/images/nav-white.png" class="img-brand-nav" alt="Logo navbar" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="bi-list menu-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-light @if (url()->current() === url('/')) active @endif" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-light dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Produk
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item @if (url()->current() === url('/produk/indramedia')) active @endif" href="{{ route('produk.indramedia') }}">Indramedia</a></li>
                <li><a class="dropdown-item @if (url()->current() === url('/produk/endez')) active @endif" href="{{ route('produk.endez') }}">Endez</a></li>
                    <li>
                      <a class="dropdown-item" href="https://order.indramedia.com/">Order Ditempat (Indramedia Store)</a>
                    </li>
                    <li>
                      <a class="dropdown-item @if (url()->current() === url('/lacak-pesanan')) active @endif" href="{{ route('lacak-pesanan') }}">Lacak Pesanan</a>
                    </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light @if (url()->current() === url('/artikel')) active @endif" href="{{ route('artikel') }}">Artikel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light @if (url()->current() === url('/tentang-kami')) active @endif" href="{{ route('tentang-kami') }}">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light @if (url()->current() === url('/hubungi-kami')) active @endif" href="{{ route('hubungi-kami') }}">Hubungi Kami</a>
            </li>
            <!-- if user not logged in yet -->
            @guest
            <li class="nav-item dropdown">
              <a class="nav-link gap-4 text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi-person-fill"></i><span style="margin-left:3px">Kamu belum login</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="text-primary dropdown-item" href="{{ route('login') }}">Login</a></li>
                <li><a class="text-primary dropdown-item" href="{{ route('register') }}">Register</a></li>
              </ul>
            </li>
            @endguest
            <!-- if user not logged in yet -->
            <!-- if user has login  -->
            @auth
            <li class="nav-item dropdown d-flex">
             {{-- <a class="nav-link text-light position-relative" href="{{ route('cart.checkout') }}">
                <i class="bi-cart-fill"></i>
                <span class="position-absolute translate-middle badge rounded-pill bg-danger" style="bottom: 15px;left: -10x;font-size: 8px">
                  @php
                    $cartCount = Auth::check() ? Auth::user()->cartItems()->count() : 0;
                  @endphp
                  {{ $cartCount > 99 ? '99+' : $cartCount }}
                  <span class="visually-hidden">total keranjang</span>
                </span>
              </a> --}}
              <a class="nav-link gap-4 text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi-person-fill"></i><span style="margin-left:3px">Hai, {{ Auth::user()->username }}</span>
              </a>
              <ul class="dropdown-menu">
                {{-- <li><a class="dropdown-item" href="{{ route('akun') }}">Kelola Akun</a></li> --}}
                @if (Auth::user()->role === "admin")
                <li><a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                @endif
                <li><a class="text-danger dropdown-item" href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </li>
            @endauth
            <!-- if user has login -->
          </ul>
        </div>
      </div>
    </nav>