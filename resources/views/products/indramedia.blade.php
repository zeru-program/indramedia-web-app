@extends('layouts.base')

@section('styles')
  <style>
   .accordion-button:not(.collapsed) {
      color: #ffffff;
      background-color: #F3A81B;
    }
    @media screen and (max-width: 700px) {
        .contain-produk {
          justify-content: center;
        }
    }
    @media screen and (min-width: 700px) {
        .accordion-produk {
            width: 28%;
        }
        .contain-produk {
            width: 80%;
        }
        .contain-div-produk {
            align-items: start;
            gap: 10px;
            /* background: red; */
            display: flex;
        }
    }
  </style>
@endsection

@section('content')
    <main class="fh-page py-5 text-dark bg-light">
      {{-- title page  --}}
      <section class="page-header bg-tertiary">
          <div class="container">
              <div class="row">
                  <div class="col-8 mx-auto text-center">
                      <h2 class="mb-3 text-capitalize fw-bold">Produk Indramedia</h2>
                      <ul class="list-inline breadcrumbs text-capitalize" style="font-weight:500">
                          <li class="list-inline-item"><a href="{{ route('home') }}">Home</a>
                          </li>
                          <li class="list-inline-item">/ &nbsp; <a href="{{ route('produk.index') }}">Produk</a>
                          </li>
                          <li class="list-inline-item">/ &nbsp; <a href="{{ route('produk.indramedia') }}">Indramedia</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="has-shapes">
              <svg class="shape shape-left text-gray" viewBox="0 0 192 752" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M-30.883 0C-41.3436 36.4248 -22.7145 75.8085 4.29154 102.398C31.2976 128.987 65.8677 146.199 97.6457 166.87C129.424 187.542 160.139 213.902 172.162 249.847C193.542 313.799 149.886 378.897 129.069 443.036C97.5623 540.079 122.109 653.229 191 728.495" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M-55.5959 7.52271C-66.0565 43.9475 -47.4274 83.3312 -20.4214 109.92C6.58466 136.51 41.1549 153.722 72.9328 174.393C104.711 195.064 135.426 221.425 147.449 257.37C168.829 321.322 125.174 386.42 104.356 450.559C72.8494 547.601 97.3965 660.752 166.287 736.018" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M-80.3302 15.0449C-90.7909 51.4697 -72.1617 90.8535 -45.1557 117.443C-18.1497 144.032 16.4205 161.244 48.1984 181.915C79.9763 202.587 110.691 228.947 122.715 264.892C144.095 328.844 100.439 393.942 79.622 458.081C48.115 555.123 72.6622 668.274 141.552 743.54" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M-105.045 22.5676C-115.506 58.9924 -96.8766 98.3762 -69.8706 124.965C-42.8646 151.555 -8.29436 168.767 23.4835 189.438C55.2615 210.109 85.9766 236.469 98.0001 272.415C119.38 336.367 75.7243 401.464 54.9072 465.604C23.4002 562.646 47.9473 675.796 116.838 751.063" stroke="currentColor" stroke-miterlimit="10" />
              </svg>
              <svg class="shape shape-right text-gray" viewBox="0 0 731 746" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.1794 745.14C1.80036 707.275 -5.75764 666.015 8.73984 629.537C27.748 581.745 80.4729 554.968 131.538 548.843C182.604 542.703 234.032 552.841 285.323 556.748C336.615 560.64 391.543 557.276 433.828 527.964C492.452 487.323 511.701 408.123 564.607 360.255C608.718 320.353 675.307 307.183 731.29 327.323" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M51.0253 745.14C41.2045 709.326 34.0538 670.284 47.7668 635.783C65.7491 590.571 115.623 565.242 163.928 559.449C212.248 553.641 260.884 563.235 309.4 566.931C357.916 570.627 409.887 567.429 449.879 539.701C505.35 501.247 523.543 426.331 573.598 381.059C615.326 343.314 678.324 330.853 731.275 349.906" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M89.8715 745.14C80.6239 711.363 73.8654 674.568 86.8091 642.028C103.766 599.396 150.788 575.515 196.347 570.054C241.906 564.578 287.767 573.629 333.523 577.099C379.278 580.584 428.277 577.567 465.976 551.423C518.279 515.172 535.431 444.525 582.62 401.832C621.964 366.229 681.356 354.493 731.291 372.46" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M128.718 745.14C120.029 713.414 113.678 678.838 125.837 648.274C141.768 608.221 185.939 585.788 228.737 580.659C271.536 575.515 314.621 584.008 357.6 587.282C400.58 590.556 446.607 587.719 482.028 563.16C531.163 529.111 547.275 462.733 591.612 422.635C628.572 389.19 684.375 378.162 731.276 395.043" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M167.564 745.14C159.432 715.451 153.504 683.107 164.863 654.519C179.753 617.046 221.088 596.062 261.126 591.265C301.164 586.452 341.473 594.402 381.677 597.465C421.88 600.527 464.95 597.872 498.094 574.896C544.061 543.035 559.146 480.942 600.617 443.423C635.194 412.135 687.406 401.817 731.276 417.612" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M817.266 289.466C813.108 259.989 787.151 237.697 759.261 227.271C731.372 216.846 701.077 215.553 671.666 210.904C642.254 206.24 611.795 197.156 591.664 175.224C555.853 136.189 566.345 75.5336 560.763 22.8649C552.302 -56.8256 498.487 -130.133 425 -162.081" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M832.584 276.159C828.427 246.683 802.469 224.391 774.58 213.965C746.69 203.539 716.395 202.246 686.984 197.598C657.573 192.934 627.114 183.85 606.982 161.918C571.172 122.883 581.663 62.2275 576.082 9.55873C567.62 -70.1318 513.806 -143.439 440.318 -175.387" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M847.904 262.853C843.747 233.376 817.789 211.084 789.9 200.659C762.011 190.233 731.716 188.94 702.304 184.292C672.893 179.627 642.434 170.544 622.303 148.612C586.492 109.577 596.983 48.9211 591.402 -3.74766C582.94 -83.4382 529.126 -156.746 455.638 -188.694" stroke="currentColor" stroke-miterlimit="10" />
                  <path d="M863.24 249.547C859.083 220.07 833.125 197.778 805.236 187.353C777.347 176.927 747.051 175.634 717.64 170.986C688.229 166.321 657.77 157.237 637.639 135.306C601.828 96.2707 612.319 35.6149 606.738 -17.0538C598.276 -96.7443 544.462 -170.052 470.974 -202" stroke="currentColor" stroke-miterlimit="10" />
              </svg>
          </div>
      </section>
      {{-- title page  --}}
        <section class="container">
            <div class="contain-div-produk">
            <div class="accordion accordion-produk mt-3 wow fadeInUp" data-wow-delay=".7s" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Filter Produk
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                      <form method="GET" action="{{ route('produk.indramedia') }}" class="w-100 d-flex px-2">
                          {{-- @csrf --}}
                          <div class="w-100">
                            <div class="row align-items-center">
                              <div class="col-12 mb-3">
                                <label for="nama_produk">Cari Produk</label>
                                <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="masukan nama produk.." id="searchInput">
                              </div>
                            </div>
                            <div class="row align-items-center">
                              <div class="col-12 mb-3">
                                <label for="type_produk">Type Produk</label>
                                <select name="type" class="select2 select2-type" id="type">
                                  <option></option>
                                </select>
                              </div>
                            </div>
                            <div class="row align-items-center">
                              <div class="col-12 mb-3">
                                <label for="category_produk">Category Produk</label>
                                <select name="category" class="select2 select2-category" id="category">
                                  <option></option>
                                </select>
                              </div>
                            </div>
                            <div class="row align-items-center">
                              <div class="col-12 mb-3">
                                <label for="category_produk">Harga Awal</label>
                                <input type="number" name="harga_awal" id="harga_awal" class="form-control" placeholder="Masukan harga awal">
                              </div>
                            </div>
                            <div class="row align-items-center">
                              <div class="col-12 mb-4">
                                <label for="category_produk">Harga Akhir</label>
                                <input type="number" name="harga_akhir" id="harga_akhir" class="form-control" placeholder="Masukan harga akhir">
                              </div>
                            </div>
                            <div class="row align-items-center">
                              <div class="col-12 mb-3">
                                <button type="button" id="resetButton" class="btn bg-sc color-ac w-100">Reset</button>
                              </div>
                            </div>
                            <div class="row align-items-center">
                              <div class="col-12 mb-3">
                                <button type="button" onclick="filter()" class="btn bg-ac text-light w-100">Filter</button>
                              </div>
                            </div>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex contain-produk mt-3 flex-wrap gap-2" id="searchResults">
              @foreach ($data as $product)
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
                          <div class="badge bg-primary">{{ ucfirst($product->brand) }}</div>
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
          </div>
          <div>
            <div class="mt-3">
              <!-- Tampilkan Pagination -->
              <nav aria-label="Page navigation">
                  {{ $data->links('pagination::bootstrap-5') }}
              </nav>
           </div>          
          </div>
       </section>
    </main>

@section ('scripts')
<script>
      function formatDate(date) {
          const year = date.getFullYear();
          const month = String(date.getMonth() + 1).padStart(2, "0");
          const day = String(date.getDate()).padStart(2, "0");
          const hours = String(date.getHours()).padStart(2, "0");
          const minutes = String(date.getMinutes()).padStart(2, "0");
          const seconds = String(date.getSeconds()).padStart(2, "0");
          return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
      }

      function filter() {
          const query = $('#searchInput').val();
          const type = $('#type').val();
          const category = $('#category').val();
          const hargaAwal = $('#harga_awal').val();
          const hargaAkhir = $('#harga_akhir').val();
          
          const url = new URL(window.location.href);  
          url.searchParams.set('q', query);
          url.searchParams.set('type', type);
          url.searchParams.set('category', category);
          url.searchParams.set('harga_awal', hargaAwal);
          url.searchParams.set('harga_akhir', hargaAkhir);
          
          window.history.pushState(null, '', url);
          $.ajax({
          type: "GET",
          url: "{{ route('produk.indramedia') }}",
          data: { 
            q: $('#searchInput').val(),
            type: $('#type').val(),
            category: $('#category').val(),
            harga_awal: $('#harga_awal').val(),
            harga_akhir: $('#harga_akhir').val(),
           },   
          dataType: "json",  
          success: function (response) {
              // console.log(response.items)
              $('#searchResults').html("");
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
                              <div class="badge bg-primary">${element.brand[0].toUpperCase() + element.brand.slice(1)}</div>
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
                  $('#searchResults').append(newEl);
              });
            } else {
              var noDataElem = `
              <div class="w-100 d-flex flex-wrap align-items-center">
                <img src="{{ asset('images/no_data.png') }}"   alt="">
                <h4>Ups, Produk tidak Tersedia.</h4>
              </div>
              `;
              $('#searchResults').html(noDataElem);
            }
          },
          error: function(xhr, status, error) {
              console.error("Error fetching search results:", error); // Tangani error jika ada
          }
        });
        }
      $(document).ready(function () {
        $('.select2').select2()
        $('.select2-type').select2({
            width: '100%',
            placeholder: 'Pilih Type',
            //minimumInputLength: 2,
            ajax: {
                url: "{{ route('master.type') }}", 
                dataType: 'json',
                delay: 250,
                processResults: function(data, params) {
                    console.log("Fetched data:", data); // Check data structure here
                    return {
                        results: data.items.map(function(item) {
                            return {
                                id: item.type_name,
                                text: item.type_name.toUpperCase(),
                                price: item.price
                            };
                        })
                    };
                },
                cache: true
            }
        })
        $('.select2-category').select2({
            width: '100%',
            placeholder: 'Pilih Category',
            //minimumInputLength: 2,
            ajax: {
                url: "{{ route('master.category') }}", 
                dataType: 'json',
                delay: 250,
                processResults: function(data, params) {
                    console.log("Fetched data:", data); // Check data structure here
                    return {
                        results: data.items.map(function(item) {
                            return {
                                id: item.category_id,
                                text: item.category_name.toUpperCase(),
                                price: item.price
                            };
                        })
                    };
                },
                cache: true
            }
        })

        $('#resetButton').on('click', function() {
          // Reset form fields
          $('#searchInput').val('');
          $('#type').val('').trigger("change");
          $('#category').val('').trigger("change");
          $('#harga_awal').val('');
          $('#harga_akhir').val('');

          const url = new URL(window.location.href);
          url.search = '';
          window.history.pushState(null, '', url);

          $.ajax({
              type: "GET",
              url: "{{ route('produk.indramedia') }}",
              dataType: "json",
              success: function(response) {
                  $('#searchResults').html(''); 
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
                                  <div class="badge bg-primary">${element.brand[0].toUpperCase() + element.brand.slice(1)}</div>
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
                      $('#searchResults').append(newEl);
                  });
              },
              error: function(xhr, status, error) {
                  console.error("Error fetching default data:", error);
              }
          });
      });

        
      });
      // document.getElementById('searchInput').addEventListener('input', function () {
      //     const query = this.value;
          
      //     const url = new URL(window.location.href);  
      //     url.searchParams.set('q', query);
          
      //     window.history.pushState(null, '', url);
      //     $.ajax({
      //     type: "GET",
      //     url: "{{ route('produk.indramedia') }}",
      //     data: { q: $('#searchInput').val() },   
      //     dataType: "json",  
      //     success: function (response) {
      //         // console.log(response.items)
      //         $('#searchResults').html("");
      //         if (response.items && response.items.length > 0) {
      //         response.items.forEach(element => {
      //           let starHtml = '';
      //           const maxStars = 5;
      //           for (let i = 0; i < element.star; i++) {
      //               starHtml += `<span class="bi-star-fill"></span>`;
      //           }
      //           for (let i = element.star; i < maxStars; i++) {
      //               starHtml += `<span class="bi-star"></span>`;
      //           }
      //           const newEl = `
      //           <div class="box-product rounded-2" onclick="handleDetailProduk('${element.brand}', '${element.name}')">
      //               <div class="contain-img-produk">
      //                 <img class="box-product-img" style="object-fit: fill" src="${element.image_path}" alt="${element.name}" />
      //               </div>
      //               <div class="px-2 d-flex flex-column">
      //                   <label class="box-product-title">${element.name}</label>
      //                   <div class="mb-2 d-flex gap-2 flex-wrap">
      //                     <div class="badge bg-primary">${element.brand}</div>
      //                     <div class="badge bg-danger"><i>COD</i></div>
      //                  </div>
      //                  <label class="box-product-price fw-bold text-danger">${new Intl.NumberFormat('id-ID', {
      //                       style: 'currency',
      //                       currency: 'IDR'
      //                   }).format(element.price)}</label>
      //                   <div class="mt-1 color-ac align-items-center box-product-star d-flex gap-2">
      //                        ${starHtml}
      //                       <span class="text-dark">(${element.reviews || 0})</span>
      //                   </div>
      //               </div>
      //           </div>
      //           `;
      //           $('#searchResults').append(newEl);
      //         });
      //       } else {
      //         var noDataElem = `
      //         <div class="w-100 d-flex flex-wrap align-items-center">
      //           <img src="{{ asset('images/no_data.png') }}" style="width: 300px" alt="">
      //           <h4>Ups, Produk tidak Tersedia.</h4>
      //         </div>
      //         `;
      //         $('#searchResults').html(noDataElem);
      //       }
      //     },
      //     error: function(xhr, status, error) {
      //         console.error("Error fetching search results:", error); // Tangani error jika ada
      //     }
      //   });
      // });

  </script>
  
@endsection
@endsection