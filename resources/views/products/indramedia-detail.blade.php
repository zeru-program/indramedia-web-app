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
            <div class="rounded-2 mb-3 contain-img-produk-detail">
                <img src="http://gencerling.com/storage/artwork/1733214288-WhatsApp Image 2024-12-03 at 15.23.07.jpeg" style="width:100%;height:100%" alt="">
            </div>
            <div class="">
                <h2 class="fw-bolder">Title produk</h2>
                <h3 class="color-ac fw-bold">Rp 54.000,-</h3>
                <div class="mt-1 mb-5 color-ac align-items-center box-product-star d-flex gap-2">
                    <span class="bi-star-fill"></span>
                    <span class="bi-star-fill"></span>
                    <span class="bi-star-fill"></span>
                    <span class="bi-star-fill"></span>
                    <span class="bi-star"></span>
                    <span class="text-dark">(29)</span>
                </div>
                <span class="fw-bold">Deskripsi Produk</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At ducimus recusandae veniam omnis, eius dignissimos, quaerat natus accusantium in nihil. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque recusandae animi fugit vel cupiditate expedita impedit nostrum adipisci deleniti alias.</p>
                   <span class="fw-bold">Formulir Pemesanan</span>
                   <form action="{{ route('produk.to.checkout') }}" method="POST" class="mt-2">
                      @csrf
                      <div class="row col-md-12">
                      <div class="mb-2 col-md-12">
                          <label for="order_produk">Nama produk</label>
                          <input type="text" name="order_product" placeholder="" value="produk" required disabled class="form-control" id="">
                          <input type="text" name="order_product" placeholder="" hidden value="produk test">
                          <input type="text" name="order_price" placeholder="" hidden value="54000">
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
                      <div class="row col-md-12">
                      <div class="mb-2 col-md-12">
                          <label for="order_note">Catatan</label>
                          <textarea name="order_note" id="" class="form-control" cols="5" rows="5" placeholder="masukan pesan/catatan mu untuk penjual.. (maksimal 200 kata)" maxlength="200"></textarea>
                      </div>
                      <div class="mb-2 col-md-12">
                          <label for="order_files">File produk (bisa lebih dari 1)</label>
                          <input type="file" name="order_files[]" multiple class="form-control" id="">
                      </div>
                      </div>
                      <div class="row col-md-12">
                      <div class="mb-2 col-md-6">
                          <label for="order_qty">Jumlah produk</label>
                          <select name="order_qty" class="form-control" required value="1" id="">
                          <option value="1">X1</option>
                          <option value="2">X2</option>
                          <option value="3">X3</option>
                          <option value="4">X4</option>
                          <option value="5">X5</option>
                          </select>
                      </div>
                      <div class="mb-2 col-md-6">
                          <label for="order_delivery">Pengiriman</label>
                          <input type="hidden" name="order_delivery" value="ambil_ditempat">
                          <select name="order_delivery" class="form-control" required value="ambil_ditempat" disabled id="">
                          <option value="ambil_ditempat">Ambil ditempat</option>
                          </select>
                      </div>
                      </div>
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
@endsection