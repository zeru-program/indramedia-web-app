@extends('layouts.base')

@section('styles')
  <style>
/* only home */
.accordion-button:hover,
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
}
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
    <header class="header-home hero color-pm bg-ac">
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
    </header>
    
    <main class="w-100">
        
        <!-- section value -->
        <section id="section-value" class="bg-sc mt-5 py-3 w-100 justify-content-center section-value d-flex gap-3 color-ac">
           <div class="d-flex align-items-center gap-2 wow fadeInUp" data-wow-delay="">
              <span class="bi-check2-circle"></span>
              <label>Terpercaya</label>
           </div> 
           <div class="d-flex align-items-center gap-2 wow fadeInUp" data-wow-delay=".5s">
              <span class="bi-clock-history"></span>
              <label>Tercepat</label>
           </div> 
           <div class="d-flex align-items-center gap-2 wow fadeInUp" data-wow-delay="1s">
              <span class="bi-cash"></span>
              <label>Terjangkau</label>
           </div> 
        </section>
        <!-- section value -->
        
        <!-- section jobs -->
        <section id="section-jobs" class="container mt-5 w-100 text-dark">
            <div class="d-flex justify-content-center align-items-center flex-row gap-3 wow fadeInUp" data-wow-delay=".5s">
              <div class="hr-text"></div>
                <h1 class="fw-bold m-0">Tersedia Untuk</h1>
              <div class="hr-text"></div>
            </div>
            <div class="mt-3 d-flex justify-content-center flex-wrap gap-4">
                <div class="box-jobs px-3 text-dark rounded-2 wow fadeInUp" data-wow-delay=".7s">
                    <img src="images/value1.png" alt="value 1">
                    <h5 class="fw-bold">Bookstore, Digital, Computer</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet vero, architecto labore consectetur alias culpa!</p>
                </div>
                <div class="box-jobs px-3 text-dark rounded-2 wow fadeInUp" data-wow-delay=".7s">
                    <img src="images/value2.png" alt="value 2">
                    <h5 class="fw-bold">Web Development</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet vero, architecto labore consectetur alias culpa!</p>
                </div>
                <div class="box-jobs px-3 text-dark rounded-2 wow fadeInUp" data-wow-delay=".7s">
                    <img src="images/value3.png" alt="value 3">
                    <h5 class="mt-3 fw-bold">Furniture Office & School</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet vero, architecto labore consectetur alias culpa!</p>
                </div>
                <div class="box-jobs px-3 text-dark rounded-2 wow fadeInUp" data-wow-delay=".7s">
                    <img src="images/value4.png" alt="value 4">
                    <h5 class="fw-bold">Fotografi</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet vero, architecto labore consectetur alias culpa!</p>
                </div>
            </div>
        </section>
        <!-- section jobs -->
        
        <!-- section popular product -->
        <section id="produk-populer" class="container mt-5 w-100 text-dark">
            <div class="d-flex justify-content-center align-items-center flex-row gap-3 wow fadeInUp" data-wow-delay=".7s">
              <div class="hr-text"></div>
                <h1 class="fw-bold m-0">Produk Populer</h1>
              <div class="hr-text"></div>
            </div>
            <div class="w-100 my-3 justify-content-center d-flex wow fadeInUp" data-wow-delay=".7s">
                <button class="py-2 d-flex justify-content-center align-items-center px-4 text-light rounded-2 border-0 btn-sort"><i class="bi-sort-up" style="margin-right:5px"></i>Indramedia</button>
            </div>
            <div class="d-flex justify-content-center mt-4 flex-wrap gap-2">
              @foreach ($dataPopular as $product)
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
                     <label class="box-product-price fw-bold text-danger" style="{{ $product->is_promo == 1 ? 'display: none;' : 'display: flex;' }}">{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</label>
                     @if ($product->is_promo == 1 && $product->promo && $product->promo->status === "active" && ($product->promo->start_date <= now() && $product->promo->end_date >= now()))
                        <div class="d-flex align-items-center gap-2">
                          <label class="box-product-price fw-bold text-danger" >{{ 'Rp ' . number_format($product->promo->promo_price, 2, ',', '.') }}</label>
                          <del class="box-product-price-slash fw-bold text-danger" >{{ 'Rp ' . number_format($product->promo->initial_price, 2, ',', '.') }}</del>
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
        <!-- section popular product -->
        
        <!-- section newest product -->
        <section id="produk-terbaru" class="container mt-5 w-100 text-dark">
            <div class="d-flex justify-content-center align-items-center flex-row gap-3 wow fadeInUp" data-wow-delay=".7s">
              <div class="hr-text"></div>
                <h1 class="fw-bold m-0">Produk Terbaru</h1>
              <div class="hr-text"></div>
            </div>
            <div class="w-100 my-3 justify-content-center d-flex wow fadeInUp" data-wow-delay=".7s">
                <button class="py-2 d-flex justify-content-center align-items-center px-4 text-light rounded-2 border-0 btn-sort"><i class="bi-sort-up" style="margin-right:5px"></i>Indramedia</button>
            </div>
            <div class="d-flex justify-content-center mt-4 flex-wrap gap-2">
              @foreach ($dataNewest as $product)
              <div class="box-product position-relative rounded-2 wow fadeInUp" data-wow-delay=".7s" onclick="handleDetailProduk('{{ $product->brand }}', '{{ $product->name }}')">
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
                      @if ($product->is_promo == 1 && $product->promo && $product->promo->status === "active" && ($product->promo->start_date <= now() && $product->promo->end_date >= now()))
                        <div class="position-absolute start-0 top-0 bg-danger text-light p-1" style="z-index: 999">
                          <span>-{{ floatval($product->promo->percentage) }}%</span>
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
            </div>
            <div>
              <div class="mt-3 d-flex justify-content-center text-center">
                <!-- Tampilkan Pagination -->
                <nav aria-label="Page navigation" class="d-flex" style="flex-direction: column">
                    {{ $dataPopular->links('pagination::bootstrap-5') }}
                </nav>
             </div>          
            </div>
        </section>
        <!-- section pupular product -->
        
        <div class="d-flex flex-wrap">
          <!-- section more product -->
          <section id="produk-lainnya" class="container mt-5 w-responsive-lg text-dark">
              <div class="d-flex justify-content-center align-items-center flex-row gap-3 wow fadeInUp" data-wow-delay=".7s">
                <div class="hr-text"></div>
                  <h1 class="fw-bold m-0">Produk Lainnya</h1>
                <div class="hr-text"></div>
              </div>
              <div class="mt-3 gap-3 d-flex flex-column">
                  <a href="#" class="px-3 py-3 accordion-item btn-ac wow fadeInUp" data-wow-delay=".7s">Lihat Semua Indramedia Produk <span class="mx-2 bi-arrow-right"></span></a>
                  <a href="#" class="px-3 py-3 accordion-item btn-ac wow fadeInUp" data-wow-delay="1s">Lihat Semua Endez Produk <span class="mx-2 bi-arrow-right"></span></a>
              </div>
          </section>
          <!-- section more product -->
          
          <!-- section faq  -->
          <section id="faq" class="container mt-5 w-responsive-lg text-dark">
              <div class="d-flex justify-content-center align-items-center flex-row gap-3 wow fadeInUp" data-wow-delay=".7s">
                <div class="hr-text"></div>
                  <h1 class="fw-bold m-0">Faq</h1>
                <div class="hr-text"></div>
              </div>
              <div class="accordion gap-3 mt-3 accordion-flush" id="accordionFlushExample">
            <div class="accordion-item mb-2">
              <h2 class="accordion-header">
                <button class="accordion-button bg-ac text-light collapsed wow fadeInUp" data-wow-delay="" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Accordion Item #1
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
              </div>
            </div>
            <div class="accordion-item mb-2">
              <h2 class="accordion-header">
                <button class="accordion-button bg-ac text-light collapsed wow fadeInUp" data-wow-delay=".5s" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  Accordion Item #2
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button bg-ac text-light collapsed wow fadeInUp" data-wow-delay=".7s" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  Accordion Item #3
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
              </div>
            </div>
          </div>
          </section>
          <!-- section faq -->
       </div>
        
        <!-- section blog -->
        <section id="artikel" class="container pb-3 mt-5 w-100 text-dark" style="height:auto">
            <div class="d-flex justify-content-center align-items-center flex-row gap-3">
              <div class="hr-text"></div>
                <h1 class="fw-bold m-0">Artikel Terbaru</h1>
              <div class="hr-text"></div>
            </div>
            <div class="w-100 mt-3 contain-artikel-display" style="height:auto">
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
            <div class="d-flex w-100 justify-content-center">
            <button class="mt-2 mb-3 text-light bg-ac btn" onclick="window.location.href = '/artikel'">Lihat Lainnya</button>
            </div>
        </section>
        <!-- section blog -->
        
    </main>
@endsection