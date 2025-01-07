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
        <section class="container pt-5">
            <div class="d-flex justify-content-center align-items-center flex-row gap-3 wow fadeInUp" data-wow-delay="">
              <div class="hr-text"></div>
                <h1 class="fw-bold m-0">Produk Endez</h1>
              <div class="hr-text"></div>
            </div>
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
              <div class="box-product position-relative rounded-2 wow fadeInUp" data-wow-delay=".5s" onclick="handleDetailProduk('{{ $product->brand }}', '{{ $product->name }}')">
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
                        <div class="badge bg-success">{{ ucfirst($product->brand) }}</div>
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
              url: "{{ route('produk.endez') }}",
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
                                  <div class="badge bg-success">${element.brand[0].toUpperCase() + element.brand.slice(1)}</div>
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
                    <img src="{{ asset('images/no_data.png') }}" style="width: 300px" alt="">
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
                  url: "{{ route('produk.endez') }}",
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
                                  <div class="badge bg-success">${element.brand[0].toUpperCase() + element.brand.slice(1)}</div>
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