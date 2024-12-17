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
            <div class="rounded-2 mb-3 contain-img-about">
                <img src="http://gencerling.com/storage/artwork/1733214288-WhatsApp Image 2024-12-03 at 15.23.07.jpeg" alt="">
            </div>
            <div class="d-flex justify-content-center mb-1 align-items-center flex-row gap-3">
              <div class="hr-text"></div>
                <h1 class="fw-bold m-0">Tentang Kami</h1>
              <div class="hr-text"></div>
            </div>
            <div class="text-center about-p">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde nihil illo nam dignissimos. Quasi harum, hic placeat perspiciatis excepturi eligendi vitae obcaecati vero quis sapiente aliquid, corrupti, quisquam dolorum dignissimos.</p>
            </div>
            </div>
            <div class="contain-visi-misi w-100 bg-dark py-4 mt-5">
                <div class="container mb-4 text-center">
                <div class="d-flex justify-content-center mb-1 align-items-center flex-row gap-3">
                  <div class="hr-text"></div>
                    <h1 class="fw-bold text-light m-0">Visi</h1>
                  <div class="hr-text"></div>
                </div>
                <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, consectetur eum sapiente eos iure minima tempora eligendi qui! Voluptates, dolor!</p>
              </div>
                <div class="container text-center">
                <div class="d-flex justify-content-center mb-1 align-items-center flex-row gap-3">
                  <div class="hr-text"></div>
                    <h1 class="fw-bold text-light m-0">Misi</h1>
                  <div class="hr-text"></div>
                </div>
                <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, consectetur eum sapiente eos iure minima tempora eligendi qui! Voluptates, dolor!</p>
              </div>
            </div>
                <div class="container mt-5 text-center">
                <div class="d-flex justify-content-center mb-1 align-items-center flex-row gap-3">
                  <div class="hr-text"></div>
                    <h1 class="fw-bold m-0">Tujuan</h1>
                  <div class="hr-text"></div>
                </div>
                <p class="">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, consectetur eum sapiente eos iure minima tempora eligendi qui! Voluptates, dolor!
                </p>
              </div>
       </section>
    </main>
@endsection