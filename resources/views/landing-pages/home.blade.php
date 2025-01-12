@extends('layouts.base')

@section('styles')
  <style>
/* only home */
/* .accordion-button:hover,
.accordion-button:active,
.accordion-button:focus {
    box-shadow: 0 0 0;
    color: white;
    background: rgba(243,168,27,1);
}
.accordion-button:after {
    background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23FFFFFF'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>") !important;
}
.accordion-button {
    border: 0 !important;
}
.accordion-item {
    overflow: hidden;
    border-radius: 30px !important;
}
.accordion-body {
    background: rgba(243,168,27,.2);
} */
.contain-artikel {
    justify-content: center;
}
.w-responsive-lg {
  width: 100%;
}
@media screen and (min-width: 700px) {
  .w-responsive-lg {
    width: 50%;
  }
}
  </style>

@endsection

@section('content')
    {{-- header lama --}}
    {{-- <header class="header-home hero color-pm bg-ac">
      <div class="container d-flex contain-header-home">
        <div class="content-header-1">
          <img src="images/hero-home.png" class=" wow fadeInUp" data-wow-delay="1s" alt="" />
        </div>
        <div class="d-flex flex-column justify-content-center content-header-2">
          <h0 class="fw-b wow fadeInUp" id="">Indramedia Menyediakan Yang Kamu Butuhkan</h0>
          <p class=" wow fadeInUp" data-wow-delay='.5s'>Bookstore, Digital, Computer, Web Development, Furniture Office &amp School, Fotografi</p>
          <div class="d-flex gap-3">
          <a class="btn-home text-decoration-none px-3 align-items-center d-flex wow fadeInUp" data-wow-delay=".5s" href="#produk-populer">Pesan Sekarang</a>
          <a class="btn-home-outline text-decoration-none px-4 py-2 wow fadeInUp" data-wow-delay="1s" href="{{ route('hubungi-kami') }}">Hubungi Kami</a>
          </div>
        </div>
      </div>
    </header> --}}
    
    {{-- header baru  --}}
    <header class="banner header-home bg-tertiary position-relative overflow-hidden">
      <div class="container contain-header-home">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="block text-center text-lg-start pe-0 pe-xl-5">
              <h1 class="text-capitalize fw-bold mb-4 wow fadeInLeft" data-wow-delay="1.2s">Indramedia Menyediakan Yang Kamu Butuhkan</h1>
              <p class="mb-4 wow fadeInLeft" data-wow-delay="1.4s">Bookstore, Digital, Computer, Web Development, Furniture Office & School, Fotografi. Kini Pemesanan Indramedia Bisa Dilakukan Secara Online Loh !</p>
              <a type="button" class="btn btn-primary wow fadeInLeft" data-wow-delay="1.6s" href="{{ route('produk.index') }}">
                Ayo Mulai 
                <span style="font-size: 14px;" class="ms-2 fas fa-arrow-right"></span>
              </a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ps-lg-5 text-center wow fadeIn" data-wow-delay="1s">
              <img loading="lazy" decoding="async"
                src="images/new/logo-1.png"
                alt="banner image" class="w-100">
            </div>
          </div>
        </div>
      </div>
      <div class="has-shapes">
        <svg class="shape shape-left text-light" viewBox="0 0 192 752" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M-30.883 0C-41.3436 36.4248 -22.7145 75.8085 4.29154 102.398C31.2976 128.987 65.8677 146.199 97.6457 166.87C129.424 187.542 160.139 213.902 172.162 249.847C193.542 313.799 149.886 378.897 129.069 443.036C97.5623 540.079 122.109 653.229 191 728.495"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M-55.5959 7.52271C-66.0565 43.9475 -47.4274 83.3312 -20.4214 109.92C6.58466 136.51 41.1549 153.722 72.9328 174.393C104.711 195.064 135.426 221.425 147.449 257.37C168.829 321.322 125.174 386.42 104.356 450.559C72.8494 547.601 97.3965 660.752 166.287 736.018"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M-80.3302 15.0449C-90.7909 51.4697 -72.1617 90.8535 -45.1557 117.443C-18.1497 144.032 16.4205 161.244 48.1984 181.915C79.9763 202.587 110.691 228.947 122.715 264.892C144.095 328.844 100.439 393.942 79.622 458.081C48.115 555.123 72.6622 668.274 141.552 743.54"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M-105.045 22.5676C-115.506 58.9924 -96.8766 98.3762 -69.8706 124.965C-42.8646 151.555 -8.29436 168.767 23.4835 189.438C55.2615 210.109 85.9766 236.469 98.0001 272.415C119.38 336.367 75.7243 401.464 54.9072 465.604C23.4002 562.646 47.9473 675.796 116.838 751.063"
            stroke="currentColor" stroke-miterlimit="10" />
        </svg>
        <svg class="shape shape-right text-light" viewBox="0 0 731 746" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M12.1794 745.14C1.80036 707.275 -5.75764 666.015 8.73984 629.537C27.748 581.745 80.4729 554.968 131.538 548.843C182.604 542.703 234.032 552.841 285.323 556.748C336.615 560.64 391.543 557.276 433.828 527.964C492.452 487.323 511.701 408.123 564.607 360.255C608.718 320.353 675.307 307.183 731.29 327.323"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M51.0253 745.14C41.2045 709.326 34.0538 670.284 47.7668 635.783C65.7491 590.571 115.623 565.242 163.928 559.449C212.248 553.641 260.884 563.235 309.4 566.931C357.916 570.627 409.887 567.429 449.879 539.701C505.35 501.247 523.543 426.331 573.598 381.059C615.326 343.314 678.324 330.853 731.275 349.906"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M89.8715 745.14C80.6239 711.363 73.8654 674.568 86.8091 642.028C103.766 599.396 150.788 575.515 196.347 570.054C241.906 564.578 287.767 573.629 333.523 577.099C379.278 580.584 428.277 577.567 465.976 551.423C518.279 515.172 535.431 444.525 582.62 401.832C621.964 366.229 681.356 354.493 731.291 372.46"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M128.718 745.14C120.029 713.414 113.678 678.838 125.837 648.274C141.768 608.221 185.939 585.788 228.737 580.659C271.536 575.515 314.621 584.008 357.6 587.282C400.58 590.556 446.607 587.719 482.028 563.16C531.163 529.111 547.275 462.733 591.612 422.635C628.572 389.19 684.375 378.162 731.276 395.043"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M167.564 745.14C159.432 715.451 153.504 683.107 164.863 654.519C179.753 617.046 221.088 596.062 261.126 591.265C301.164 586.452 341.473 594.402 381.677 597.465C421.88 600.527 464.95 597.872 498.094 574.896C544.061 543.035 559.146 480.942 600.617 443.423C635.194 412.135 687.406 401.817 731.276 417.612"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M817.266 289.466C813.108 259.989 787.151 237.697 759.261 227.271C731.372 216.846 701.077 215.553 671.666 210.904C642.254 206.24 611.795 197.156 591.664 175.224C555.853 136.189 566.345 75.5336 560.763 22.8649C552.302 -56.8256 498.487 -130.133 425 -162.081"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M832.584 276.159C828.427 246.683 802.469 224.391 774.58 213.965C746.69 203.539 716.395 202.246 686.984 197.598C657.573 192.934 627.114 183.85 606.982 161.918C571.172 122.883 581.663 62.2275 576.082 9.55873C567.62 -70.1318 513.806 -143.439 440.318 -175.387"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M847.904 262.853C843.747 233.376 817.789 211.084 789.9 200.659C762.011 190.233 731.716 188.94 702.304 184.292C672.893 179.627 642.434 170.544 622.303 148.612C586.492 109.577 596.983 48.9211 591.402 -3.74766C582.94 -83.4382 529.126 -156.746 455.638 -188.694"
            stroke="currentColor" stroke-miterlimit="10" />
          <path
            d="M863.24 249.547C859.083 220.07 833.125 197.778 805.236 187.353C777.347 176.927 747.051 175.634 717.64 170.986C688.229 166.321 657.77 157.237 637.639 135.306C601.828 96.2707 612.319 35.6149 606.738 -17.0538C598.276 -96.7443 544.462 -170.052 470.974 -202"
            stroke="currentColor" stroke-miterlimit="10" />
        </svg>
      </div>
    </header>

    <main class="w-100 content">
        
        <!-- section value -->
        <section class="section">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <div class="section-title pt-4">
                  <p class="text-primary text-uppercase fw-bold mb-3 wow fadeInUp">Layanan</p>
                  <h1 class=" wow fadeInUp">Layanan online dan offline kami</h1>
                  <p class=" wow fadeInUp">Kami menyediakan beragam produk dan jasa berkualitas tinggi untuk memenuhi kebutuhan Anda, baik secara online maupun offline.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 service-item wow fadeInUp" data-wow-delay=".5s">
                <a class="text-black" href="service-details.html">
                  <div class="block"> <span class="colored-box text-center h3 mb-4">01</span>
                    <h3 class="mb-3 service-title">Bookstore</h3>
                    <p class="mb-0 service-description">Temukan berbagai koleksi buku favorit Anda, mulai dari buku pelajaran hingga novel inspiratif yang siap menemani waktu luang Anda.</p>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6 service-item wow fadeInUp" data-wow-delay=".5s">
                <a class="text-black" href="service-details.html">
                  <div class="block"> <span class="colored-box text-center h3 mb-4">02</span>
                    <h3 class="mb-3 service-title">Digital</h3>
                    <p class="mb-0 service-description">Dapatkan solusi digital seperti print bergambar, fotocopy service, dan layanan IT untuk meningkatkan efisiensi bisnis Anda.</p>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6 service-item wow fadeInUp" data-wow-delay=".5s">
                <a class="text-black" href="service-details.html">
                  <div class="block"> <span class="colored-box text-center h3 mb-4">


                      03

                    </span>
                    <h3 class="mb-3 service-title">Computer & Web Development</h3>
                    <p class="mb-0 service-description">Kami menyediakan layanan pengembangan web, perbaikan dan aksesoris komputer sesuai kebutuhan Anda.</p>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6 service-item wow fadeInUp" data-wow-delay=".5s">
                <a class="text-black" href="service-details.html">
                  <div class="block"> <span class="colored-box text-center h3 mb-4">


                      04

                    </span>
                    <h3 class="mb-3 service-title">Furniture & School</h3>
                    <p class="mb-0 service-description">Sediakan peralatan sekolah dan furnitur berkualitas untuk memenuhi kebutuhan rumah dan ruang belajar Anda.</p>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6 service-item wow fadeInUp" data-wow-delay=".5s">
                <a class="text-black" href="service-details.html">
                  <div class="block"> <span class="colored-box text-center h3 mb-4">


                      05

                    </span>
                    <h3 class="mb-3 service-title">Fotografi</h3>
                    <p class="mb-0 service-description">Abadikan momen-momen istimewa Anda dengan layanan fotografi profesional kami, baik untuk acara pribadi maupun bisnis.</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>
        <!-- section value -->
        
        <!-- section product kami -->
        <section id="produk-kami" class="container my-5 pb-5 w-100 text-dark">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
              <h1 class="fw-bold m-0  wow fadeInUp">Produk Kami</h1>
              <div class="">
                <form class="d-flex wrap-sm mt-sm-2 gap-3" action="{{ route('home') }}" onsubmit="return false" method="GET">
                  <input type="text" name="q" class="form-control search-home" placeholder="Cari produk.." id="searchInput">
                  <select name="product_filter" style="" class="select2-filter search-home" id="filterInput">
                    <option value=""></option>
                  </select>
                  <button class="btn btn-primary w-sm-100" type="button" onclick="terapkan()" style="width: 220px">Terapkan</button>
                </form>
              </div>
            </div>
            {{-- <div class="w-100 my-3 justify-content-center d-flex wow fadeInUp" data-wow-delay=".7s">
                <button class="py-2 d-flex justify-content-center align-items-center px-4 text-light rounded-2 border-0 btn-sort"><i class="bi-sort-up" style="margin-right:5px"></i>Indramedia</button>
            </div> --}}
            <div class="d-flex justify-content-start mt-4 flex-wrap gap-2" id="products">
              @if (!empty($products) && count($products) > 0)
              @foreach ($products as $product)
              <div class="box-product position-relative rounded-2 wow fadeInUp" data-wow-delay=".4s" onclick="handleDetailProduk('{{ $product->brand }}', '{{ $product->name }}')">
                  @if ($product->is_promo == 1 && $product->promo && $product->promo->status === "active" && ($product->promo->start_date <= now() && $product->promo->end_date >= now()))
                    <div class="position-absolute start-0 top-0 bg-danger text-light p-1" style="z-index: 999">
                      <span>-{{ floatval($product->promo->percentage) }}%</span>
                    </div>
                  @endif
                  <div class="contain-img-produk">
                    <img class="box-product-img" style="object-fit: fill" src="{{ $product->image_path }}" alt="" />
                  </div>
                  <div class="px-2 d-flex flex-column">
                      <label class="box-product-title">{{ $product->name }}</label>
                      <div class="mb-2 d-flex gap-2 flex-wrap">
                        <div class="badge bg-{{ $product->brand === 'indramedia' ? 'primary' : 'success' }}">{{ ucfirst($product->brand) }}</div>
                        <div class="badge bg-danger"><i>COD</i></div>
                     </div>
                     <label class="box-product-price text-danger" style="{{ $product->is_promo == 1 ? 'display: none;' : 'display: flex;' }}">{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</label>
                     @if ($product->is_promo == 1 && $product->promo && $product->promo->status === "active" && ($product->promo->start_date <= now() && $product->promo->end_date >= now()))
                        <div class="d-flex align-items-center gap-2">
                          <label class="box-product-price text-danger" >{{ 'Rp ' . number_format($product->promo->promo_price, 2, ',', '.') }}</label>
                          <del class="box-product-price-slash text-danger" >{{ 'Rp ' . number_format($product->promo->initial_price, 2, ',', '.') }}</del>
                        </div>
                     @endif
                      <div class="mt-1 color-ac align-items-center box-product-star d-flex gap-2">
                         {{-- Tampilkan jumlah bintang penuh --}}
                          @for ($i = 0; $i < $product->star; $i++)
                              <span class="bi-star-fill"></span>
                          @endfor
                          {{-- Tampilkan jumlah bintang kosong (maksimal 5 bintang) --}}
                          @for ($i = $product->star; $i < 5; $i++)
                              <span class="bi-star"></span>
                          @endfor
                          <span class="text-dark">({{ $product->reviews }})</span>
                      </div>
                  </div>
              </div>
            @endforeach
            @else
            <div class="w-100 d-flex flex-wrap align-items-center">
              <img src="{{ asset('/images/no_data.png') }}" style="width: 300px" alt="">
              <h4>Ups, Produk tidak Tersedia.</h4>
            </div>
            @endif
            </div>
            {{-- <div>
              <div class="mt-3 d-flex justify-content-center text-center">
                <!-- Tampilkan Pagination -->
                <nav aria-label="Page navigation" class="d-flex" style="flex-direction: column">
                    {{ $dataPopular->links('pagination::bootstrap-5') }}
                </nav>
             </div>          
            </div> --}}
        </section>
        <!-- section product kami -->

        {{-- section cta 1 --}}
        <section class="about-section section bg-tertiary position-relative overflow-hidden">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-5">
                <div class="section-title">
                  <p class="text-primary text-uppercase fw-bold mb-3 wow fadeInUp">Keunggulan Kami</p>
                  <h1 class=" wow fadeInUp">Respon Cepat & Pembayaran Fleksibel</h1>
                  <p class="lead mb-0 mt-4">
                    <p class="wow fadeInUp">
                      Kami mengutamakan kenyamanan dan kemudahan untuk pelanggan dengan memberikan layanan yang responsif dan fleksibel. 
                      Kami selalu siap membantu menjawab kebutuhan Anda dengan cepat, kapan saja Anda butuhkan.
                    </p>
                    <p class="wow fadeInUp">
                      Selain itu, kami menyediakan berbagai pilihan metode pembayaran yang fleksibel agar Anda dapat melakukan transaksi 
                      dengan mudah dan tanpa hambatan. Pelayanan berkualitas kami dirancang untuk memberikan pengalaman terbaik kepada Anda.
                    </p>
                  </p> 
                  <a class="btn btn-primary mt-4 wow fadeInUp" href="{{ route('hubungi-kami') }}">Hubungi Kami</a>
                </div>
              </div>
              <div class="col-lg-7 text-center text-lg-end">
                <img loading="lazy" decoding="async" src="images/about-us.png" alt="About Ourselves" class="img-fluid wow fadeInUp">
              </div>
            </div>
          </div>
          <div class="has-shapes">
            <svg class="shape shape-left text-light" width="381" height="443" viewBox="0 0 381 443" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M334.266 499.007C330.108 469.108 304.151 446.496 276.261 435.921C248.372 425.346 218.077 424.035 188.666 419.32C159.254 414.589 128.795 405.375 108.664 383.129C72.8533 343.535 83.3445 282.01 77.7634 228.587C69.3017 147.754 15.4873 73.3967 -58.0001 40.9907"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M349.584 485.51C345.427 455.611 319.469 433 291.58 422.425C263.69 411.85 233.395 410.538 203.984 405.823C174.573 401.092 144.114 391.878 123.982 369.632C88.1716 330.038 98.6628 268.513 93.0817 215.09C84.62 134.258 30.8056 59.8999 -42.6819 27.494"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M364.904 472.013C360.747 442.114 334.789 419.503 306.9 408.928C279.011 398.352 248.716 397.041 219.304 392.326C189.893 387.595 159.434 378.381 139.303 356.135C103.492 316.541 113.983 255.016 108.402 201.593C99.9403 120.76 46.1259 46.4028 -27.3616 13.9969"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M380.24 458.516C376.083 428.617 350.125 406.006 322.236 395.431C294.347 384.856 264.051 383.544 234.64 378.829C205.229 374.098 174.77 364.884 154.639 342.638C118.828 303.044 129.319 241.519 123.738 188.096C115.276 107.264 61.4619 32.906 -12.0255 0.500103"
                stroke="currentColor" stroke-miterlimit="10" />
            </svg>
            <svg class="shape shape-right text-light" width="406" height="433" viewBox="0 0 406 433" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M101.974 -86.77C128.962 -74.8992 143.467 -43.2447 146.175 -12.7857C148.883 17.6734 142.273 48.1263 139.087 78.5816C135.916 109.041 136.681 141.702 152.351 167.47C180.247 213.314 240.712 218.81 289.413 238.184C363.095 267.516 418.962 340.253 430.36 421.687"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M118.607 -98.5031C145.596 -86.6323 160.101 -54.9778 162.809 -24.5188C165.517 5.94031 158.907 36.3933 155.72 66.8486C152.549 97.3082 153.314 129.969 168.985 155.737C196.881 201.581 257.346 207.077 306.047 226.451C379.729 255.783 435.596 328.52 446.994 409.954"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M135.241 -110.238C162.23 -98.3675 176.735 -66.7131 179.443 -36.254C182.151 -5.79492 175.541 24.6581 172.354 55.1134C169.183 85.573 169.948 118.234 185.619 144.002C213.515 189.846 273.98 195.342 322.681 214.716C396.363 244.048 452.23 316.785 463.627 398.219"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M151.879 -121.989C178.867 -110.118 193.373 -78.4638 196.081 -48.0047C198.789 -17.5457 192.179 12.9074 188.992 43.3627C185.821 73.8223 186.586 106.483 202.256 132.251C230.153 178.095 290.618 183.591 339.318 202.965C413.001 232.297 468.867 305.034 480.265 386.468"
                stroke="currentColor" stroke-miterlimit="10" />
            </svg>
          </div>
        </section>
        {{-- section cta 1 --}}

        {{-- section cta 2 --}}
        <section class="section">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-lg-5">
                <div class="section-title">
                  <p class="text-primary text-uppercase fw-bold mb-3 wow fadeInUp">Perbedaan Kami</p>
                  <h1 class=" wow fadeInUp">Apa Yang Membuat <br> Kami Beda Dari Yang Lain?</h1>
                  <div class="content mb-0 mt-4">
                    <p class="wow fadeInUp">
                      Kami tidak hanya memberikan layanan yang cepat dan efisien, tetapi juga memastikan proses yang aman dan terpercaya. 
                      Dengan tim profesional, kami hadir untuk membantu Anda setiap saat dengan solusi yang terbaik.
                    </p>
                    <p class="wow fadeInUp">
                      Setiap langkah kami dirancang untuk memprioritaskan kepuasan Anda. Mulai dari komunikasi yang responsif hingga harga yang bersaing, 
                      kami memberikan nilai lebih untuk kebutuhan Anda. Temukan perbedaan nyata bersama kami hari ini!
                    </p>
                      <a class="btn btn-primary mt-4 wow fadeInUp" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="difference-of-us-item p-3 rounded mr-0 me-lg-4 wow fadeInUp">
                  <div class="d-block d-sm-flex align-items-center m-2">
                    <div class="icon me-4 mb-4 mb-sm-0"> <i class="fas fa-shield-alt mt-4" style="font-size:36px"></i>
                    </div>
                    <div class="block">
                      <h3 class="mb-3">Proses Cepat Dan Aman</h3>
                      <p class="mb-0">Kami menjamin setiap proses dilakukan dengan efisien tanpa mengorbankan keamanan. Kepuasan dan rasa aman Anda adalah prioritas kami.</p>
                    </div>
                  </div>
                </div>
                <div class="difference-of-us-item p-3 rounded mr-0 me-lg-4 wow fadeInUp">
                  <div class="d-block d-sm-flex align-items-center m-2">
                    <div class="icon me-4 mb-4 mb-sm-0"> <i class="fas fa-blender-phone mt-4" style="font-size:36px"></i>
                    </div>
                    <div class="block">
                      <h3 class="mb-3">Respon Pertanyaan Yang Cepat</h3>
                      <p class="mb-0">Tim kami selalu siap menjawab pertanyaan Anda dengan cepat dan informatif, memastikan kebutuhan Anda terpenuhi tanpa penundaan.</p>
                    </div>
                  </div>
                </div>
                <div class="difference-of-us-item p-3 rounded mr-0 me-lg-4 wow fadeInUp">
                  <div class="d-block d-sm-flex align-items-center m-2">
                    <div class="icon me-4 mb-4 mb-sm-0"> <i class="fas fa-money-bill-alt mt-4" style="font-size:36px"></i>
                    </div>
                    <div class="block">
                      <h3 class="mb-3">Harga Terjangkau</h3>
                      <p class="mb-0">Kami menawarkan layanan berkualitas tinggi dengan harga yang tetap terjangkau, memberikan solusi terbaik tanpa membebani anggaran Anda.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        {{-- section cta 2 --}}

        {{-- section testiomonal --}}
        <section class="section testimonials overflow-hidden bg-tertiary">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div class="section-title text-center">
                  <p class="text-primary text-uppercase fw-bold mb-3 wow fadeInUp">Pengalaman Pelanggan</p>
                  <h1 class="mb-4 wow fadeInUp">Dipercaya oleh Lebih dari 1.200+ Pelanggan</h1>
                  <p class="lead mb-0 wow fadeInUp">Kami berkomitmen memberikan layanan terbaik untuk memenuhi kebutuhan Anda. Berikut adalah pengalaman dari pelanggan kami yang puas.</p>
                </div>
              </div>
            </div>
            <div class="row position-relative">
              <div class="col-lg-4 col-md-6 pt-1 wow fadeInUp" data-wow-delay=".5s">
                <div class="shadow rounded bg-white p-4 mt-4">
                  <div class="d-block d-sm-flex align-items-center mb-3">
                    <img loading="lazy" decoding="async"
                      src="images/testimonials/01.jpg"
                      alt="Leslie Alexander" class="img-fluid" width="65" height="66">
                    <div class="mt-3 mt-sm-0 ms-0 ms-sm-3">
                      <h4 class="h5 mb-1">Leslie Alexander</h4>
                      <p class="mb-0">Web Designer</p>
                    </div>
                  </div>
                  <div class="content">Lorem ipsum dolor <a href="http://google.com">@reamansimond</a> demina egestas sit purus
                    felis arcu. Vitae, turpisds tortr etiam faucibus ac suspendisse.</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 pt-1 wow fadeInUp" data-wow-delay=".5s">
                <div class="shadow rounded bg-white p-4 mt-4">
                  <div class="d-block d-sm-flex align-items-center mb-3">
                    <img loading="lazy" decoding="async"
                      src="images/testimonials/02.jpg"
                      alt="Arlene McCoy" class="img-fluid" width="65" height="66">
                    <div class="mt-3 mt-sm-0 ms-0 ms-sm-3">
                      <h4 class="h5 mb-1">Arlene McCoy</h4>
                      <p class="mb-0">Content Strategist</p>
                    </div>
                  </div>
                  <div class="content">Lorem ipsum dolor <a href="http://google.com">@reamansimond</a> demina egestas sit purus
                    felis arcu. Vitae, turpisds tortr etiam faucibus ac suspendisse.</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 pt-1 wow fadeInUp" data-wow-delay=".5s">
                <div class="shadow rounded bg-white p-4 mt-4">
                  <div class="d-block d-sm-flex align-items-center mb-3">
                    <img loading="lazy" decoding="async"
                      src="images/testimonials/03.jpg"
                      alt="Marvin McKinney" class="img-fluid" width="65" height="66">
                    <div class="mt-3 mt-sm-0 ms-0 ms-sm-3">
                      <h4 class="h5 mb-1">Marvin McKinney</h4>
                      <p class="mb-0">Video Game Writer</p>
                    </div>
                  </div>
                  <div class="content">Lorem ipsum dolor <a href="http://google.com">@reamansimond</a> demina egestas sit purus
                    felis arcu. Vitae, turpisds tortr etiam faucibus ac suspendisse.</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 pt-1 wow fadeInUp" data-wow-delay=".5s">
                <div class="shadow rounded bg-white p-4 mt-4">
                  <div class="d-block d-sm-flex align-items-center mb-3">
                    <img loading="lazy" decoding="async"
                      src="images/testimonials/04.jpg"
                      alt="Devon Lane" class="img-fluid" width="65" height="66">
                    <div class="mt-3 mt-sm-0 ms-0 ms-sm-3">
                      <h4 class="h5 mb-1">Devon Lane</h4>
                      <p class="mb-0">Nursing Assistant</p>
                    </div>
                  </div>
                  <div class="content">Lorem ipsum dolor <a href="http://google.com">@reamansimond</a> demina egestas sit purus
                    felis arcu. Vitae, turpisds tortr etiam faucibus ac suspendisse.</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 pt-1 wow fadeInUp" data-wow-delay=".5s">
                <div class="shadow rounded bg-white p-4 mt-4">
                  <div class="d-block d-sm-flex align-items-center mb-3">
                    <img loading="lazy" decoding="async"
                      src="images/testimonials/05.jpg"
                      alt="Bessie Cooper" class="img-fluid" width="65" height="66">
                    <div class="mt-3 mt-sm-0 ms-0 ms-sm-3">
                      <h4 class="h5 mb-1">Bessie Cooper</h4>
                      <p class="mb-0">Video Game Writer</p>
                    </div>
                  </div>
                  <div class="content">Lorem ipsum dolor <a href="http://google.com">@reamansimond</a> demina egestas sit purus
                    felis arcu. Vitae, turpisds tortr etiam faucibus ac suspendisse.</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 pt-1 wow fadeInUp" data-wow-delay=".5s">
                <div class="shadow rounded bg-white p-4 mt-4">
                  <div class="d-block d-sm-flex align-items-center mb-3">
                    <img loading="lazy" decoding="async"
                      src="images/testimonials/06.jpg"
                      alt="Kathryn Murphy" class="img-fluid" width="65" height="66">
                    <div class="mt-3 mt-sm-0 ms-0 ms-sm-3">
                      <h4 class="h5 mb-1">Kathryn Murphy</h4>
                      <p class="mb-0">Film Critic</p>
                    </div>
                  </div>
                  <div class="content">Lorem ipsum dolor <a href="http://google.com">@reamansimond</a> demina egestas sit purus
                    felis arcu. Vitae, turpisds tortr etiam faucibus ac suspendisse.</div>
                </div>
              </div>
            </div>
          </div>
          <div class="has-shapes">
            <svg class="shape shape-left text-light" width="290" height="709" viewBox="0 0 290 709" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M-119.511 58.4275C-120.188 96.3185 -92.0001 129.539 -59.0325 148.232C-26.0649 166.926 11.7821 174.604 47.8274 186.346C83.8726 198.088 120.364 215.601 141.281 247.209C178.484 303.449 153.165 377.627 149.657 444.969C144.34 546.859 197.336 649.801 283.36 704.673"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M-141.434 72.0899C-142.111 109.981 -113.923 143.201 -80.9554 161.895C-47.9878 180.588 -10.1407 188.267 25.9045 200.009C61.9497 211.751 98.4408 229.263 119.358 260.872C156.561 317.111 131.242 391.29 127.734 458.631C122.417 560.522 175.414 663.463 261.437 718.335"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M-163.379 85.7578C-164.056 123.649 -135.868 156.869 -102.901 175.563C-69.9331 194.256 -32.086 201.934 3.9592 213.677C40.0044 225.419 76.4955 242.931 97.4127 274.54C134.616 330.779 109.296 404.957 105.789 472.299C100.472 574.19 153.468 677.131 239.492 732.003"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M-185.305 99.4208C-185.982 137.312 -157.794 170.532 -124.826 189.226C-91.8589 207.919 -54.0118 215.597 -17.9666 227.34C18.0787 239.082 54.5697 256.594 75.4869 288.203C112.69 344.442 87.3706 418.62 83.8633 485.962C78.5463 587.852 131.542 690.794 217.566 745.666"
                stroke="currentColor" stroke-miterlimit="10" />
            </svg>
            <svg class="shape shape-right text-light" width="731" height="429" viewBox="0 0 731 429" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12.1794 428.14C1.80036 390.275 -5.75764 349.015 8.73984 312.537C27.748 264.745 80.4729 237.968 131.538 231.843C182.604 225.703 234.032 235.841 285.323 239.748C336.615 243.64 391.543 240.276 433.828 210.964C492.452 170.323 511.701 91.1227 564.607 43.2553C608.718 3.35334 675.307 -9.81661 731.29 10.323"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M51.0253 428.14C41.2045 392.326 34.0538 353.284 47.7668 318.783C65.7491 273.571 115.623 248.242 163.928 242.449C212.248 236.641 260.884 246.235 309.4 249.931C357.916 253.627 409.887 250.429 449.879 222.701C505.35 184.248 523.543 109.331 573.598 64.0588C615.326 26.3141 678.324 13.8532 731.275 32.9066"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M89.8715 428.14C80.6239 394.363 73.8654 357.568 86.8091 325.028C103.766 282.396 150.788 258.515 196.347 253.054C241.906 247.578 287.767 256.629 333.523 260.099C379.278 263.584 428.277 260.567 465.976 234.423C518.279 198.172 535.431 127.525 582.62 84.8317C621.964 49.2292 681.356 37.4924 731.291 55.4596"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M128.718 428.14C120.029 396.414 113.678 361.838 125.837 331.274C141.768 291.221 185.939 268.788 228.737 263.659C271.536 258.515 314.621 267.008 357.6 270.282C400.58 273.556 446.607 270.719 482.028 246.16C531.163 212.111 547.275 145.733 591.612 105.635C628.572 72.19 684.375 61.1622 731.276 78.0432"
                stroke="currentColor" stroke-miterlimit="10" />
              <path
                d="M167.564 428.14C159.432 398.451 153.504 366.107 164.863 337.519C179.753 300.046 221.088 279.062 261.126 274.265C301.164 269.452 341.473 277.402 381.677 280.465C421.88 283.527 464.95 280.872 498.094 257.896C544.061 226.035 559.146 163.942 600.617 126.423C635.194 95.1355 687.406 84.8167 731.276 100.612"
                stroke="currentColor" stroke-miterlimit="10" />
            </svg>
          </div>
        </section>
        {{-- section testiomonal --}}
        
        {{-- section faq --}}
        <section class="section">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12">
                <div class="section-title text-center mb-5 pb-2">
                  <p class="text-primary text-uppercase fw-bold mb-3 wow fadeInUp">Bantuan dan Informasi</p>
                  <h1 class=" wow fadeInUp">Pertanyaan yang Sering Diajukan</h1>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="accordion shadow rounded py-5 px-0 px-lg-4 bg-white position-relative wow fadeInUp" data-wow-delay=".5s" id="accordionFAQ">
                  <div class="accordion-item p-1 mb-2">
                    <h2 class="accordion-header accordion-button h5 border-0 active"
                      id="heading-ebd23e34fd2ed58299b32c03c521feb0b02f19d9" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse-ebd23e34fd2ed58299b32c03c521feb0b02f19d9" aria-expanded="true"
                      aria-controls="collapse-ebd23e34fd2ed58299b32c03c521feb0b02f19d9">Pertanyaan 1
                    </h2>
                    <div id="collapse-ebd23e34fd2ed58299b32c03c521feb0b02f19d9"
                      class="accordion-collapse collapse border-0 show"
                      aria-labelledby="heading-ebd23e34fd2ed58299b32c03c521feb0b02f19d9" data-bs-parent="#accordionFAQ">
                      <div class="accordion-body py-0 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae vel quos velit harum consequatur, provident officia tempora vero illo perferendis.</div>
                    </div>
                  </div>
                  <div class="accordion-item p-1 mb-2">
                    <h2 class="accordion-header accordion-button h5 border-0 "
                      id="heading-a443e01b4db47b3f4a1267e10594576d52730ec1" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse-a443e01b4db47b3f4a1267e10594576d52730ec1" aria-expanded="false"
                      aria-controls="collapse-a443e01b4db47b3f4a1267e10594576d52730ec1">Pertanyaan 2
                    </h2>
                    <div id="collapse-a443e01b4db47b3f4a1267e10594576d52730ec1" class="accordion-collapse collapse border-0 "
                      aria-labelledby="heading-a443e01b4db47b3f4a1267e10594576d52730ec1" data-bs-parent="#accordionFAQ">
                      <div class="accordion-body py-0 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae vel quos velit harum consequatur, provident officia tempora vero illo perferendis..</div>
                    </div>
                  </div>
                  <div class="accordion-item p-1 mb-2">
                    <h2 class="accordion-header accordion-button h5 border-0 "
                      id="heading-4b82be4be873c8ad699fa97049523ac86b67a8bd" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse-4b82be4be873c8ad699fa97049523ac86b67a8bd" aria-expanded="false"
                      aria-controls="collapse-4b82be4be873c8ad699fa97049523ac86b67a8bd">Pertanyaan 3
                    </h2>
                    <div id="collapse-4b82be4be873c8ad699fa97049523ac86b67a8bd" class="accordion-collapse collapse border-0 "
                      aria-labelledby="heading-4b82be4be873c8ad699fa97049523ac86b67a8bd" data-bs-parent="#accordionFAQ">
                      <div class="accordion-body py-0 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae vel quos velit harum consequatur, provident officia tempora vero illo perferendis..</div>
                    </div>
                  </div>
                  <div class="accordion-item p-1 mb-2">
                    <h2 class="accordion-header accordion-button h5 border-0 "
                      id="heading-3e13e9676a9cd6a6f8bfbe6e1e9fc0881ef247b3" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse-3e13e9676a9cd6a6f8bfbe6e1e9fc0881ef247b3" aria-expanded="false"
                      aria-controls="collapse-3e13e9676a9cd6a6f8bfbe6e1e9fc0881ef247b3">Pertanyaan 4
                    </h2>
                    <div id="collapse-3e13e9676a9cd6a6f8bfbe6e1e9fc0881ef247b3" class="accordion-collapse collapse border-0 "
                      aria-labelledby="heading-3e13e9676a9cd6a6f8bfbe6e1e9fc0881ef247b3" data-bs-parent="#accordionFAQ">
                      <div class="accordion-body py-0 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae vel quos velit harum consequatur, provident officia tempora vero illo perferendis..</div>
                    </div>
                  </div>
                  <div class="accordion-item p-1 mb-2">
                    <h2 class="accordion-header accordion-button h5 border-0 "
                      id="heading-0c2f829793a1f0562fea97120357dd2d43319164" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse-0c2f829793a1f0562fea97120357dd2d43319164" aria-expanded="false"
                      aria-controls="collapse-0c2f829793a1f0562fea97120357dd2d43319164">Pertanyaan 5
                    </h2>
                    <div id="collapse-0c2f829793a1f0562fea97120357dd2d43319164" class="accordion-collapse collapse border-0 "
                      aria-labelledby="heading-0c2f829793a1f0562fea97120357dd2d43319164" data-bs-parent="#accordionFAQ">
                      <div class="accordion-body py-0 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae vel quos velit harum consequatur, provident officia tempora vero illo perferendis..</div>
                    </div>
                  </div>
                  <div class="accordion-item p-1 mb-2">
                    <h2 class="accordion-header accordion-button h5 border-0 "
                      id="heading-8fe6730e26db16f15763887c30a614caa075f518" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse-8fe6730e26db16f15763887c30a614caa075f518" aria-expanded="false"
                      aria-controls="collapse-8fe6730e26db16f15763887c30a614caa075f518">Pertanyaan 6
                    </h2>
                    <div id="collapse-8fe6730e26db16f15763887c30a614caa075f518" class="accordion-collapse collapse border-0 "
                      aria-labelledby="heading-8fe6730e26db16f15763887c30a614caa075f518" data-bs-parent="#accordionFAQ">
                      <div class="accordion-body py-0 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae vel quos velit harum consequatur, provident officia tempora vero illo perferendis..</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mt-4 mt-lg-0 wow fadeInUp" data-wow-delay=".8s">
                <div class="contact-info shadow rounded py-5 px-4 ms-0 ms-lg-4 bg-white position-relative">
                    <div class="block mt-0">
                        <h4 class="h5">Masih Punya Pertanyaan?</h4>
                        <div class="content">Hubungi Kami Dan Kami Akan Segera Menjawabnya
                            <br> <a href="https://wa.me/6285746214441">+6285746214441</a> 
                            <br> <a href="mailto:serivce@indramedia.com">serivce@indramedia.com</a>
                            <br>Senin - Sabtu
                            <br>9AM TO 8PM Operasional</div>
                    </div>
                    <div class="block mt-4">
                        <h4 class="h5">Alamat Kantor</h4>
                        <div class="content">Jl. Kp. Buntar.
                            <br>RT.02/RW.08, Muarasari.
                            <br>Kec. Bogor Sel, Kota Bogor
                            <br>Jawa Barat 16137
                        </div>
                    </div>
                    <div class="block mt-4">
                        <h4 class="h5">Kami Tersedia Di</h4>
                        <div class="content">
                            <a href="https://shopee.co.id/putramedia_bookstore">Shopee PUTRAMEDIA</a>
                            <br><a href="https://shopee.co.id/indramedia_digital">Shopee INDRAMEDIA</a>
                    </div>
                    {{-- <div class="block">
                        <ul class="list-unstyled list-inline my-4 social-icons">
                            <li class="list-inline-item me-3"><a title="Explorer Instagram1 Profile" class="text-black" href="https://www.instagram.com/endezkitchen/"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="list-inline-item me-3"><a title="Explorer Youtube Profile" class="text-black" href="https://www.youtube.com/@indramediadigital7749"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li class="list-inline-item me-3"><a title="Explorer Instagram2 Profile" class="text-black" href="https://www.instagram.com/bukusekolahan.id"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            </div>
          </div>
        </section>
        {{-- section faq --}}
        
        <!-- section blog -->
        <!-- section blog -->
        
    </main>

    @section('scripts')
    <script>
      function terapkan() {
          const query = $('#searchInput').val();
          const brand = $('#filterInput').val();
          
          const url = new URL(window.location.href);  
          url.searchParams.set('q', query);
          url.searchParams.set('b', brand);
          
          window.history.pushState(null, '', url);
            $.ajax({
            type: "GET",
            url: "{{ route('home') }}",
            data: { 
              q: $('#searchInput').val(),
              b: $('#filterInput').val(),
            },   
            dataType: "json",  
            success: function (response) {
                // console.log(response.items)
                $('#products').html("");
                if (response.items && response.items.length > 0) {
                response.items.forEach(element => {
                    let starHtml = '';
                    let promoSpanHtml = '';
                    let promoPriceHtml = '';
                    const maxStars = 5;
                    for (let i = 0; i < element.star; i++) {
                        starHtml += `<span class="bi-star-fill"></span>`;
                    }
                    for (let i = element.star; i < maxStars; i++) {
                        starHtml += `<span class="bi-star"></span>`;
                    }
                    // console.log(formatDate(new Date()))
                    // console.log(element.promo.start_date)
                    if (element.is_promo == 1 && element.promo) {
                      if (element.promo.status === "active" && (element.promo.start_date <= formatDate(new Date()) && element.promo.end_date >= formatDate(new Date()))) {
                        promoSpanHtml = `
                          <div class="position-absolute start-0 top-0 bg-danger text-light p-1" style="z-index: 999">
                            <span>-${parseFloat(element.promo.percentage)}%</span>
                          </div>
                        `;
                        promoPriceHtml = `
                        <div class="${element.is_promo == 1 ? 'd-flex' : 'd-none'} align-items-center gap-2">
                              <label class="box-product-price fw-bold text-danger" >${new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(element.promo.promo)}</label>
                              <del class="box-product-price-slash fw-bold text-danger">${new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(element.promo.initial)}</del>
                            </div>
                        `;
                      }
                    }
                      
                    const newEl = `
                    <div class="box-product position-relative rounded-2" onclick="handleDetailProduk('${element.brand}', '${element.name}')">
                        ${promoSpanHtml}
                        <div class="contain-img-produk">
                            <img class="box-product-img" style="object-fit: fill" src="${element.image_path}" alt="${element.name}" />
                        </div>
                        <div class="px-2 d-flex flex-column">
                            <label class="box-product-title">${element.name}</label>
                            <div class="mb-2 d-flex gap-2 flex-wrap">
                                <div class="badge bg-${element.brand === 'indramedia' ? 'primary' : 'success'}">${element.brand[0].toUpperCase() + element.brand.slice(1)}</div>
                                <div class="badge bg-danger"><i>COD</i></div>
                            </div>
                            <label class="box-product-price fw-bold text-danger ${element.is_promo == 1 ? 'd-none' : 'd-flex'}">${new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(element.price)}</label>
                            ${promoPriceHtml}
                            <div class="mt-1 color-ac align-items-center box-product-star d-flex gap-2">
                                ${starHtml}
                              <span class="text-dark">(${element.reviews || 0})</span>
                          </div>
                        </div>
                    </div>
                    `;
                    $('#products').append(newEl);
                });
              } else {
                var noDataElem = `
                <div class="w-100 d-flex flex-wrap align-items-center">
                  <img src="{{ asset('images/no_data.png') }}" style="width: 300px" alt="">
                  <h4>Ups, Produk tidak Tersedia.</h4>
                </div>
                `;
                $('#products').html(noDataElem);
              }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching search results:", error); // Tangani error jika ada
            }
          });
        }

      $(document).ready(function () {
        $('.select2-filter').select2({
          width: '45%',
          placeholder: 'Filter Produk',
          ajax: {
              url: "{{ route('master.brand') }}", 
              dataType: 'json',
              delay: 250,
              processResults: function(data, params) {
                  console.log("Fetched data:", data); // Check data structure here
                  return {
                      results: data.items.map(function(item) {
                          return {
                              id: item.name,
                              text: item.name.toUpperCase(),
                          };
                      })
                  };
              },
              cache: true
          },
        })
        
        $('#searchInput').keydown(function(e) {
          if (e.key === 'Enter') {
              e.preventDefault(); 
              terapkan()
          }
        });


        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('q');
        const brandQuery = urlParams.get('b');

        if (searchQuery) {
            $('#searchInput').val(searchQuery);
        }

        if (brandQuery && (brandQuery === "indramedia" || brandQuery === "endez")) {
            $('#filterInput').select2('trigger', 'select', {
                data: { id: brandQuery, text: brandQuery.toUpperCase() } 
            });
        }
      })
    </script>
    @endsection
@endsection