@extends('layouts.base')

@section('content')
<main class="fh-page py-5">
    <section class="container mt-5">
        @if(Session::has('success'))
        <h1 style="font-size:2em" class="text-success fw-b">{{ Session::get('success') }}</h1>
        @endif
        <h1 class="fw-bold">Order id </h1>
        {{ $order_product }}
         <hr>
        </section>
    </main>
    @endsection