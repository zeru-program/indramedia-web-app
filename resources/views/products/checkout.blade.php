@extends('layouts.base')

@section('content')
<main class="fh-page py-5">
    <section class="container mt-5">
        @if(Session::has('success'))
        <h1 style="font-size:2em" class="text-success fw-b">{{ Session::get('success') }}</h1>
        @endif
        <h1 class="fw-bold">Konfirmasi Pesanan</h1>
        <div class="d-flex text-muted flex-column">
            @for($i = 0; $i < $order_qty; $i++)
                <div class="d-flex position-relative">
                    <span>{{ $order_product }}  <span class="mx-2">x1</span></span>
                    <span class="position-absolute end-0">
                        Rp {{ number_format($order_price) }}
                    </span>
                </div>
                @endfor
                @php
                $sub = $order_price * $order_qty;
                @endphp
                <div class="d-flex position-relative">
                    <span>Subtotal</span>
                    <span class="position-absolute end-0">
                        Rp {{ number_format($sub) }}
                    </span>
                </div>
                <div class="d-flex position-relative">
                    <span>Shipping</span>
                    <span class="position-absolute end-0">
                        Rp {{ number_format($shipping) }}
                    </span>
                </div>
                <div class="d-flex position-relative">
                    <span class="fw-bold">Total</span>
                    <span class="position-absolute fw-bold end-0">
                        Rp {{ number_format($sub + $shipping) }}
                    </span>
                </div>
            </div>
            <hr>
            <form action="{{ route('produk.checkout.create') }}" method="POST" class="mt-2">
                @csrf
                <div class="row col-md-12">
                    <div class="mb-2 col-md-12">
                        <label for="order_produk">Nama produk</label>
                        <input type="text" name="order_product" placeholder="" value="{{ $order_product }}" required disabled class="form-control" id="">
                    </div>
                </div>
                <div class="row mb-2 col-md-12">
                    <div class="mb-2 col-md-6">
                        <label for="order_name">Nama pembeli</label>
                        <input type="text" name="order_name" placeholder="masukan nama mu.." required class="form-control" id="" disabled value="{{ $order_name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="order_phone">Nomor WA pembeli</label>
                        <input type="number" name="order_phone" placeholder="masukan nomor handphone (wa) mu.." required class="form-control" disabled value="{{ $order_phone }}" id="">
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="mb-2 col-md-12">
                        <label for="order_note">Catatan</label>
                        <textarea name="order_note" id="" class="form-control" cols="5" disabled value="{{ $order_note }}" rows="5" placeholder="masukan pesan/catatan mu untuk penjual.. (maksimal 200 kata)" maxlength="200"></textarea>
                    </div>
                    <div class="mb-2 col-md-12">
                        <label for="order_files">File produk (bisa lebih dari 1)</label>
                        <input type="file" name="order_files[]" multiple class="form-control" disabled id="">
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="mb-2 col-md-6">
                        <label for="order_qty">Jumlah produk</label>
                        <select name="order_qty" class="form-control" required disabled value="{{ $order_qty }}" id="">
                            <option value="1">X1</option>
                            <option value="2">X2</option>
                            <option value="3">X3</option>
                            <option value="4">X4</option>
                            <option value="5">X5</option>
                        </select>
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="order_delivery">Pengiriman</label>
                        <select name="order_delivery" class="form-control" required disabled value="{{ $order_delivery }}" disabled id="">
                            <option value="ambil_ditempat">Ambil ditempat</option>
                        </select>
                    </div>
                 </div>
                <div class="row mb-2 col-md-12">
                    <div class="col-md-12">
                        <label for="order_payment">Motede Pembayaran</label>
                        <select name="order_payment" class="form-control" required value="{{ $order_payment }}" disabled id="">
                            <option value="cod">COD (di Indramedia store)</option>
                        </select>
                    </div>
                </div>
                <span class="text-muted mb-3" style="font-size:11px">* Jika data tidak sesuai silakan ulangi proses checkout</span>
                <div>
                    <input type="hidden" name="order_product" value="{{ $order_product }}">
                    <input type="hidden" name="order_name" value="{{ $order_name }}">
                    <input type="hidden" name="order_phone" value="{{ $order_phone }}">
                    <input type="hidden" name="order_note" value="{{ $order_note }}">
                    @if(!empty($order_files))
                    @foreach($order_files as $file)
                        <div class="file-input-wrapper">
                            <label>File yang sudah diunggah:</label>
                            <span>{{ $file['file_name'] }}</span> {{-- Nama file dari server --}}
                            <input type="hidden" name="existing_files[]" value="{{ $file['file_path'] }}"> {{-- Path file untuk referensi --}}
                            
                            <label for="order_file_{{ $loop->index }}">Ganti file:</label>
                            <input type="file" name="order_files[{{ $loop->index }}]" id="order_file_{{ $loop->index }}">
                        </div>
                    @endforeach
                @else
                    <input type="file" name="order_files[]">
                @endif

                    <input type="hidden" name="order_qty" value="{{ $order_qty }}">
                    <input type="hidden" name="order_delivery" value="{{ $order_delivery }}">
                    <input type="hidden" name="order_payment" value="{{ $order_payment }}">
                </div>
                <div class="row col-md-12">
                    <div class="mt-3 col-md-12">
                        <button class="btn bg-success w-100 color-pm" type="submit">
                            <i class="bi-cart"></i>
                            <span style="margin-left:6px">Pesan Sekarang</span>
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </main>
    @endsection