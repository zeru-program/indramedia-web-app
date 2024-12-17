@extends('layouts.base')

@section('styles')
  <style>
   .accordion-button:not(.collapsed) {
      color: #ffffff;
      background-color: #F3A81B;
    }
    @media screen and (min-width: 700px) {
        .accordion-produk {
            width: 35%;
        }
        .contain-produk {
            width: 65%;
        }
        .contain-div-produk {
            align-items: start;
            gap: 10px;
            display: flex;
        }
    }
  </style>
@endsection

@section('content')
    <header class="header-home hero color-pm bg-ac">
      <div class="container d-flex contain-header-home">
        <div class="content-header-1">
          <img src="images/hero-home.png" alt="" />
        </div>
        <div class="d-flex flex-column justify-content-center content-header-2">
          <h0 class="fw-b" id="">Lacak Pesanan Mu</h0>
          <input type="number" name="id" class="form-control mb-2 " placeholder="masukan id pesanan.." id="order_id" required>
          <div class="d-flex gap-3">
          <button class="btn-home-outline text-decoration-none px-4 py-2 align-items-center justify-content-center d-flex" type="button" onclick="handleTrack()"><span>Lacak</span><i class="bi-arrow-right mx-2"></i></button>
          </div>
        </div>
      </div>
    </header>
    
    <main class="fh-page py-5 text-dark bg-light">
        <section class="container">
            <div class="d-flex justify-content-center align-items-center flex-row gap-3">
              <div class="hr-text"></div>
                <h1 class="fw-bold text-center m-0">Rekomendasi Produk</h1>
              <div class="hr-text"></div>
            </div>
            <div class="d-flex contain-produk mt-3 flex-wrap gap-2">
                <div class="box-product rounded-2" onclick="handleDetailProduk()">
                    <div class="contain-img-produk">
                    <img class="box-product-img" src="https://snapy.co.id/gambar/produk/produk_85_0.jpg" alt="" />
                    </div>
                    <div class="px-1 d-flex flex-column">
                        <label class="box-product-title">Jasa design grafis</label>
                        <label class="box-product-price fw-bold">Rp 5.000,-</label>
                        <div class="mt-1 color-ac align-items-center box-product-star d-flex gap-2">
                            <span class="bi-star-fill"></span>
                            <span class="bi-star-fill"></span>
                            <span class="bi-star-fill"></span>
                            <span class="bi-star-fill"></span>
                            <span class="bi-star"></span>
                            <span class="text-dark">(29)</span>
                        </div>
                    </div>
                </div>
                <div class="box-product rounded-2" onclick="handleDetailProduk()">
                    <div class="contain-img-produk">
                    <img class="box-product-img" src="https://snapy.co.id/gambar/produk/produk_85_0.jpg" alt="" />
                    </div>
                    <div class="px-1 d-flex flex-column">
                        <label class="box-product-title">Jasa design grafis</label>
                        <label class="box-product-price fw-bold">Rp 5.000,-</label>
                        <div class="mt-1 color-ac align-items-center box-product-star d-flex gap-2">
                            <span class="bi-star-fill"></span>
                            <span class="bi-star-fill"></span>
                            <span class="bi-star-fill"></span>
                            <span class="bi-star-fill"></span>
                            <span class="bi-star"></span>
                            <span class="text-dark">(29)</span>
                        </div>
                    </div>
                </div>
            </div>
       </section>
    </main>
@endsection

@section('scripts')
 <script>
  function handleTrack() {
      window.location.href = "/order/" + document.getElementById('order_id').value
  }
 </script>
@endsection