@extends('layouts.base')

@section('styles')
    <style>
    .about-p {
        font-size: 14px;
    }
    .contain-visi-misi {
    }
    </style>
@endsection

@section('content')
    <main class="fh-page py-5 text-dark bg-light">
        <section class="align-items-center d-flex flex-column pt-5">
            <div class="container d-flex flex-column align-items-center">
            <div class="rounded-2 mb-3 contain-map-contact">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0502220692633!2d106.81923928885497!3d-6.640685899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c7418edb6ac1%3A0x3dfd14e89d90aad5!2sIndramedia%20Store!5e0!3m2!1sid!2sid!4v1734141757083!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="d-flex justify-content-center mb-1 align-items-center flex-row gap-3">
              <div class="hr-text"></div>
                <h1 class="fw-bold m-0">Hubungi Kami</h1>
              <div class="hr-text"></div>
            </div>
            <div class="text-center about-p">
                <p>Jl. Kp. Buntar, RT.02/RW.08, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137</p>
            </div>
            <div class="d-flex justify-content-center flex-wrap text-primary gap-2">
                <div class="d-flex align-items-center gap-1" onclick="window.location.href = 'https://wa.me/62811111'">
                 <i class="bi-whatsapp"></i>
                 <span>+628111111111</span>
                </div>
                <div class="d-flex align-items-center gap-1" onclick="window.location.href = 'mailto:service@indramedia.com'">
                 <i class="bi-envelope"></i>
                 <span>service@indramedia.com</span>
                </div>
            </div>
            </div>
       </section>
    </main>
@endsection