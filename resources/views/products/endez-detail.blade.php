@extends('layouts.base')

@section('styles')
<style>
@media screen and (min-width: 700px) {
    .contain-img-produk-detail {
        width: 100%;
    }
}
</style>
@endsection

@section('content')
<main class="fh-page py-5 text-dark bg-light">
    <section class="align-items-center d-flex flex-column pt-5">
        <div class="container d-flex flex-column">
            <div class="w-100 d-flex justify-content-start contain-head-detail-product">
                <div class="rounded-2 mb-3 contain-img-produk-detail img-thumbnail">
                    <img src="{{ $data->image_path }}" style="width:100%;height:100%" alt="">
                </div>
                <div class="mx-lg-5 w-sub-detail">
                    <div class="d-flex gap-4 align-items-center">
                        <h2 class="fw-bolder">{{ $data->name }}</h2>
                        @if ($data->is_promo == 1 && $data->promo && $data->promo->status === "active" && ($data->promo->start_date <= now() && $data->promo->end_date >= now()))
                        <div class="mb-0 bg-danger text-light p-1" style="z-index: 999">
                            <span class="mb-0">-{{ floatval($data->promo->percentage) }}%</span>
                        </div>
                        @endif
                    </div>
                    <h3 class=" fw-bold text-danger" style="{{ $data->is_promo == 1 && $data->promo && $data->promo->status === "active" && ($data->promo->start_date <= now() && $data->promo->end_date >= now()) ? 'display: none;' : 'display: flex;' }}">{{ 'Rp ' . number_format($data->price, 2, ',', '.') }}</h3>
                    @if ($data->is_promo == 1 && $data->promo && $data->promo->status === "active" && ($data->promo->start_date <= now() && $data->promo->end_date >= now()))
                       <div class="d-flex align-items-center gap-2">
                         <h3 class="fw-bold text-danger" >{{ 'Rp ' . number_format($data->promo->promo_price, 2, ',', '.') }}</h3>
                         <del class="box-product-price-slash fw-bold text-danger" >{{ 'Rp ' . number_format($data->promo->initial_price, 2, ',', '.') }}</del>
                       </div>
                    @endif
                    <div class="mt-1 mb-3 color-ac align-items-center box-product-star d-flex gap-2">
                        {{-- Tampilkan jumlah bintang penuh --}}
                        @for ($i = 0; $i < $data->star; $i++)
                        <span class="bi-star-fill"></span>
                        @endfor
                        {{-- Tampilkan jumlah bintang kosong (maksimal 5 bintang) --}}
                        @for ($i = $data->star; $i < 5; $i++)
                            <span class="bi-star"></span>
                        @endfor
                        <span class="text-dark">({{ $data->reviews }})</span>
                    </div>
                    <div class="mb-4 d-flex gap-3 flex-wrap">
                        <div class="badge bg-success">{{ ucfirst($data->brand) }}</div>
                        <div class="badge bg-warning">{{ ucfirst($data->type) }}</div>
                        <div class="badge bg-info">{{ ucfirst($data->category) }}</div>
                        <div class="badge bg-danger"><i>COD</i></div>
                    </div>
                    <h3 class="fw-bold">Deskripsi Produk</h3>
                    <p class="mb-5">{{ $data->description ?? "-" }}</p>
                 </div>
            </div>
            <div class="">
                   <h3 class="fw-bold">Formulir Pemesanan</h3>
                   <form action="{{ route('produk.endez.create') }}" enctype='multipart/form-data' method="POST" class="mt-2">
                      @csrf
                      <div class="row col-md-12">
                      <div class="mb-2 col-md-12">
                          <label for="order_produk">Nama produk</label>
                          <input type="text" name="order_product" value="{{ $data->name }}" required disabled class="form-control" id="">
                          <input type="text" name="order_product" hidden value="{{ $data->name }}">
                          <input type="text" name="order_product_sku" hidden value="{{ $data->sku }}">
                          @if ($data->is_promo == 1 && $data->promo && $data->promo->status === "active" && ($data->promo->start_date <= now() && $data->promo->end_date >= now()))
                              <input type="text" name="order_price" hidden value="{{ floatval($data->promo->promo_price) }}">
                          @else
                              <input type="text" name="order_price" hidden value="{{ $data->price }}">
                          @endif
                        </div>
                      </div>
                      @guest
                      <div class="row mb-2 col-md-12">
                      <div class="mb-2 col-md-6">
                          <label for="order_name">Nama pembeli</label>
                          <input type="text" name="order_name" placeholder="masukan nama mu.." required class="form-control" id="">
                      </div>
                      <div class="col-md-6">
                          <label for="order_phone">Nomor WA pembeli</label>
                          <input type="number" name="order_phone" placeholder="masukan nomor handphone (wa) mu.." required class="form-control" id="">
                      </div>
                      </div>
                      @endguest
                      @auth
                      <div class="row mb-2 col-md-12">
                      <div class="mb-2 col-md-6">
                          <label for="order_name">Nama pembeli</label>
                          <input type="text" name="order_name" placeholder="masukan nama mu.." disabled value="{{ Auth::user()->username }}" required class="form-control" id="">
                          <input type="text" name="order_name" hidden required value="{{ Auth::user()->username }}">
                        </div>
                        <div class="col-md-6">
                            <label for="order_phone">Nomor WA pembeli</label>
                            <input type="number" name="order_phone" placeholder="masukan nomor handphone (wa) mu.." value="{{ Auth::user()->phone }}" disabled required class="form-control" id="">
                            <input type="text" name="order_phone" hidden required value="{{ Auth::user()->phone }}">
                      </div>
                      </div>
                      @endauth
                      <div class="row">
                          <div class="mb-2 col-md-12">
                              <label for="order_note">Catatan</label>
                              <textarea name="order_note" id="" class="form-control" cols="5" rows="5" placeholder="Opsional, masukan pesan/catatan mu untuk penjual.. (maksimal 200 kata)" maxlength="200"></textarea>
                        </div>
                    </div>
                  <div class="row col-md-12">
                    <input type="number" name="order_is_file" required hidden  value="{{ $data->is_file }}">
                    @if ($data->is_file == 1)
                      <div class="mb-2 col-md-6">
                          <label for="order_qty">Jumlah produk</label>
                          <input type="number" name="order_qty" min="1" placeholder="Masukan jumlah pesanan" min="1" class="form-control">
                          {{-- <select name="order_qty" class="form-control" onchange="handleChangeInputFile(event)" required id="">
                          <option hidden value="">Pilih jumlah</option>
                          <option value="1">X1</option>
                          <option value="2">X2</option>
                          <option value="3">X3</option>
                          <option value="4">X4</option>
                          <option value="5">X5</option>
                          </select> --}}
                      </div>
                      @else
                      <div class="mb-2 col-md-6">
                          <label for="order_qty">Jumlah produk</label>
                          <input type="number" name="order_qty" min="1" placeholder="Masukan jumlah pesanan" min="1" class="form-control">
                          {{-- <select name="order_qty" class="form-control" required id="">
                          <option hidden value="">Pilih jumlah</option>
                          <option value="1">X1</option>
                          <option value="2">X2</option>
                          <option value="3">X3</option>
                          <option value="4">X4</option>
                          <option value="5">X5</option>
                          </select> --}}
                      </div>
                      @endif
                      <div class="mb-2 col-md-6">
                          <label for="order_delivery">Pengiriman</label>
                          <input type="hidden" name="order_delivery" value="ambil_ditempat">
                          <select name="order_delivery" class="form-control" required value="ambil_ditempat" disabled id="">
                          <option value="ambil_ditempat">Ambil ditempat</option>
                          </select>
                      </div>
                      </div>
                      @if ($data->is_file == 1)
                      <div id="appendInputFile">
                        <div class="row col-md-12">
                            <div class="mb-2 col-md-12">
                                <label for="order_files">File produk </label>
                                <input type="file" name="order_files1" disabled class="form-control" id="">
                            </div>
                        </div>
                    </div>
                      @endif
                      <div class="row mb-2 col-md-12">
                      <div class="mb-2 col-md-12">
                          <label for="order_payment">Motede Pembayaran</label>
                          <input type="hidden" name="order_payment" value="cod">
                          <select name="order_payment" class="form-control" required value="cod" disabled id="">
                          <option value="cod">COD (di Indramedia store)</option>
                          </select>
                      </div>
                      </div>
                      <div class="row col-md-12">
                      <div class="mt-2 col-md-12">
                          <button class="btn bg-success w-100 color-pm" type="submit">
                              <i class="bi-cart"></i>
                              <span style="margin-left:6px">Checkout</span>
                          </button>
                          </div>
                      </div>
                   </form>
            </div>
        </div>
    </section>
</main>

@section('scripts')
@if ($errors->has('error_checkout'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ $errors->first('error_checkout') }}"
            });
        </script>
    @endif
 <script>
    function handleChangeInputFile(e) {
        $('#appendInputFile').html('')
        for (let i = 0; i < e.target.value; i++) {
            var newEl = `
             <div class="row col-md-12">
                <div class="mb-2 col-md-12">
                    <label for="order_file">File produk ${i + 1}</label>
                    <input type="file" required name="order_file${i + 1}" accept="image/png, image/gif, image/jpeg" class="form-control" id="">
                </div>
            </div>
            `
            $('#appendInputFile').append(newEl)
        }
    }
 </script>
@endsection

@endsection