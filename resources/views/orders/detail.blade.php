@extends('layouts.base')

@section('content')
<main class="fh-page py-5">
    <section class="container mt-5">
        @if(Session::has('success'))
        <h1 class="text-success fw-b">{{ Session::get('success') }}</h1>
        @endif
        <h2 class="fw-bold">Order id <span class="text-primary">{{ $data->order_id }}</span></h2>
        <div>
            <div>
                @php
                    $statusesIndonesia = [
                        'pending' => 'Menunggu',
                        'waiting payment' => 'Menunggu Pembayaran',
                        'preparing' => 'Diproses',
                        'shipping' => 'Sedang Dikirim',
                        'ready taken' => 'Pesanan Siap',
                        'success' => 'Sukses'
                    ];
                @endphp
                <div 
                class="d-flex rounded-2 py-2 align-items-center justify-content-center"
                style="width: 200px; 
                       background-color: 
                       @if($data->status == 'pending') #dbeafe; 
                       @elseif($data->status == 'waiting payment') rgba(255,145, 77, .17); 
                       @elseif($data->status == 'preparing') #bae6fd; 
                       @elseif($data->status == 'shipping') #ddd6fe; 
                       @elseif($data->status == 'ready taken') #bae6fd; 
                       @elseif($data->status == 'success') #bbf7d0; 
                       @else #e5e7eb; @endif;">
                    <span class="fw-bold" style="color:
                        @if($data->status == 'pending') #353499; 
                        @elseif($data->status == 'waiting payment') #ff914d; 
                        @elseif($data->status == 'preparing') #0097b2; 
                        @elseif($data->status == 'shipping') #8c52ff; 
                        @elseif($data->status == 'ready taken') #0097b2; 
                        @elseif($data->status == 'success') #00b14f; 
                        @else #e5e7eb; @endif;
                    ">
                        {{ ucfirst($statusesIndonesia[$data->status] ?? 'Status Tidak Diketahui') }}
                  </span>
                </div>            
            </div>
            <div class="mt-2">
                <span>
                    Order Dibuat Pada {{ $data->created_at }}
                </span>
            </div>
            <div class="timeline-container mt-4">
                @php
                   $statusesIndonesia = ['pending', 'diproses', 'sedang dikirim', 'pesanan siap', 'sukses'];
                   $statuses = ['pending', 'preparing', 'shipping', 'ready taken', 'success'];
                   $currentIndex = array_search(in_array($data->status, $statuses) ? $data->status : "pending", $statuses);
                @endphp
            
                @foreach ($statuses as $index => $status)
                    <div class="timeline-item">
                        <div class="timeline-circle"></div>
                        <div class="timeline-text">
                            <h4 class="m-0">
                                {{ ucfirst($statusesIndonesia[$index]) }}
                                @if ($data->status === 'success')
                                    <i class="bi-check-circle-fill"></i> <!-- Status aktif -->
                                @elseif ($index === $currentIndex)
                                    <i class="bi-question-circle-fill"></i> <!-- Status aktif -->
                                @elseif ($index < $currentIndex)
                                    <i class="bi-check-circle-fill"></i> <!-- Status sebelumnya -->
                                @endif
                            </h4>
                        </div>
                    </div>
            
                    <!-- Tampilkan garis hanya jika bukan item terakhir -->
                    @if ($index < count($statuses) - 1)
                        <div class="timeline-line"></div>
                    @endif
                @endforeach
            </div>            
            <div class="mt-4">
                <div class="row">
                    <div class="col-6 align-items-end" style="">
                        <label for="">Pemesan</label>
                        <input type="text" disabled class="form-control" value="{{ $data->order_name }}">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="">Pembayaran</label>
                        <input type="text" disabled class="form-control" value="{{ $data->product_payment_method }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-2">
                        <label for="">Catatan</label>
                        <textarea name="order_note" id="" class="form-control" cols="5" disabled rows="5" placeholder="Opsional, masukan pesan/catatan mu untuk penjual.. (maksimal 200 kata)" maxlength="200">{{ $data->order_message }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-2">
                        <label for="">Brand</label>
                        <input type="text" disabled class="form-control" value="{{ $data->product_brand }}">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="">Pengiriman</label>
                        <input type="text" disabled class="form-control" value="{{ str_replace("_", " ", $data->product_delivery) }}">
                    </div>
                </div>
                @if (Auth::user() || Session::get('user_ordered'))
                    {{-- @dd($data->order_is_multiplefile) --}}
                    @if (($data->order_name === Auth::user()->username || Session::get('user_ordered')) && $data->order_is_multiplefile == 1 && $data->status !== "success")
                        @foreach ($files as $index => $file)
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label for="">File {{ $index }}</label>
                                    <div class="rounded-2 py-2 px-3 overflow-hidden" style="background: #E9ECEF">
                                        <a class="" style="word-wrap: break-word" href="{{ url('/storage/' . $file) }}">{{ url('/storage/' . $file) }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif (($data->order_name === Auth::user()->username || Session::get('user_ordered')) && $data->order_is_onefile == 1 && $data->status !== "success")
                        @foreach ($files as $index => $file)
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label for="">File Yang Di Upload</label>
                                    <div class="rounded-2 py-2 px-3 overflow-hidden" style="background: #E9ECEF">
                                        <a class="" style="word-wrap: break-word" href="{{ url('/storage/' . $file) }}">{{ url('/storage/' . $file) }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- <p>File tidak tersedia atau kondisi tidak terpenuhi.</p> --}}
                    @endif
                    @else
                    <p>Harap login untuk melihat file.</p>
                @endif
            </div>
            <div class="mt-4">
                <h1>Produk Yang Dipesan</h1>
                <div class="w-100 rounded-2 py-4 mb-3 container-fluid" style="background: #E9ECEF">
                    {{-- @for ($i = 0; $i < $data->product_amount; $i++) --}}
                    <div class="d-flex justify-content-between flex-wrap gap-3 align-items-center mb-2">
                        <div class="d-flex align-items-center gap-3">
                            <img class="img-thumbnail img-item-ordered" src="{{ $data2->image_path }}" alt="">
                            <span>{{ $data->product_name }}</span>
                        </div>
                        <div>
                            <span>x{{ $data->product_amount }}</span>
                        </div>
                        <div>
                            <span>{{ 'Rp ' . number_format($data->product_price_unit, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    {{-- @endfor --}}
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between">
                            <span>Total Produk</span>
                            <span>{{ 'Rp ' . number_format($data->product_price_totals, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Pajak Admin</span>
                            <span>Rp 0</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold">{{ 'Rp ' .  number_format($data->product_price_totals + 0, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
                <span class="text-muted">Jika Anda memilih metode pembayaran non-tunai Pastikan pembayaran telah terbayar dan konfirmasi dengan mengunggah bukti pembayaran</span>
            </div>
        </div>
         <hr>
        </section>
    </main>
    @endsection