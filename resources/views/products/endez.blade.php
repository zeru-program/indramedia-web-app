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
    <main class="fh-page py-5 text-dark bg-light">
        <section class="container pt-5">
            <div class="d-flex justify-content-center align-items-center flex-row gap-3">
              <div class="hr-text"></div>
                <h1 class="fw-bold m-0">Produk Endez</h1>
              <div class="hr-text"></div>
            </div>
            <div class="contain-div-produk">
            <div class="accordion accordion-produk mt-3" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Filter Produk
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                      <form method="" class="w-100 d-flex px-2">
                          @csrf
                          <div class="row align-items-center">
                              <div class="">
                              <label for="nama_produk">Cari Produk</label>
                              <input type="text" name="nama_produk" class="form-control" placeholder="masukan nama produk.." id="">
                          </div>
                       </div>
                    </form>
                  </div>
                </div>
              </div>
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
          </div>
       </section>
    </main>
@endsection