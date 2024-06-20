@extends('layouts.main')

@section('title', 'Profil')

@section('content')

<div class="w-100 d-flex justify-content-center align-items-center" style="height: 400px">
    <img class="w-100 position-absolute top-0 z-0 img_1" style="height: 400px"
        src="{{ asset('assets/pictures/main.webp') }}" alt="">
    <h2 class="z-2 text-white">
        <div class="row col-md-6 col-lg-4 mx-auto g-3">
            <p class="text-center">Szia {{ Auth::user()->name }} most éppen be vagy lépve!</p>
        </div>
    </h2>
</div>


@endsection