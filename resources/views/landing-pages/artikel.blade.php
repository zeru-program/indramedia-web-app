@extends('layouts.artikel')

@section('meta-title')
  <title></title>
@endsection

@section('styles')
  <style>
   .accordion-button:not(.collapsed) {
      color: #ffffff;
      background-color: #F3A81B;
    }
    .contain-artikel {
        justify-content: center;
    }
    @media screen and (min-width: 700px) {
        .accordion-produk {
            width: 35%;
        }
        .contain-artikel {
            width: 70%;
            justify-content: start;
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
                <h1 class="fw-bold m-0 wow fadeInUp" data-wow-delay=".7s">Artikel Kami</h1>
              <div class="hr-text"></div>
            </div>
            <div class="contain-div-produk">
            <div class="accordion accordion-produk mt-3 wow fadeInUp" data-wow-delay=".7s" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Filter Artikel
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                      <form method="" class="w-100 d-flex px-2">
                          @csrf
                          <div class="row align-items-center">
                              <div class="">
                              <label for="nama_produk">Cari Artikel</label>
                              <input type="text" name="nama_artikel" class="form-control" placeholder="masukan nama artikel.." id="">
                          </div>
                       </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex contain-artikel mt-3 flex-wrap gap-2">
                <div class="box-artikel rounded-2 shadow-sm mb-2" onclick="handleArtikelDetail()">
                    <div class="overflow-hidden">
                    <img src="http://gencerling.com/storage/artwork/1733214288-WhatsApp Image 2024-12-03 at 15.23.07.jpeg" alt="">
                    </div>
                    <div class="m-2">
                      <h6 class="fw-bold mb-0">Title artikel</h6>
                      <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, vel.</p>
                      <div class="d-flex color-ac gap-3 mt-2">
                          <div class="gap-2 d-flex box-supporter">
                              <i class="bi-person-fill mb-0"></i>
                              <span class="mb-0">Penerbit</span>
                          </div>
                          <div class="gap-2 d-flex box-supporter">
                              <i class="bi-calendar"></i>
                              <span>20-12-2024</span>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="box-artikel rounded-2 shadow-sm mb-2" onclick="handleArtikelDetail()">
                    <div class="overflow-hidden">
                    <img src="http://gencerling.com/storage/artwork/1733214288-WhatsApp Image 2024-12-03 at 15.23.07.jpeg" alt="">
                    </div>
                    <div class="m-2">
                      <h6 class="fw-bold mb-0">Title artikel</h6>
                      <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, vel.</p>
                      <div class="d-flex color-ac gap-3 mt-2">
                          <div class="gap-2 d-flex box-supporter">
                              <i class="bi-person-fill mb-0"></i>
                              <span class="mb-0">Penerbit</span>
                          </div>
                          <div class="gap-2 d-flex box-supporter">
                              <i class="bi-calendar"></i>
                              <span>20-12-2024</span>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="box-artikel rounded-2 shadow-sm mb-2" onclick="handleArtikelDetail()">
                    <div class="overflow-hidden">
                    <img src="http://gencerling.com/storage/artwork/1733214288-WhatsApp Image 2024-12-03 at 15.23.07.jpeg" alt="">
                    </div>
                    <div class="m-2">
                      <h6 class="fw-bold mb-0">Title artikel</h6>
                      <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, vel.</p>
                      <div class="d-flex color-ac gap-3 mt-2">
                          <div class="gap-2 d-flex box-supporter">
                              <i class="bi-person-fill mb-0"></i>
                              <span class="mb-0">Penerbit</span>
                          </div>
                          <div class="gap-2 d-flex box-supporter">
                              <i class="bi-calendar"></i>
                              <span>20-12-2024</span>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
       </section>
    </main>
@endsection

@section('scripts')
     <script>
         function handleArtikelDetail() {
             
         }
     </script>
@endsection