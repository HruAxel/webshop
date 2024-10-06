@extends('layouts.main')

@section('title', $product->name)

@section('content')

    {{-- <div class="w-100 d-flex justify-content-center align-items-center" style="height: 400px">
        <img class="w-100 position-absolute top-0 z-0 img_1" style="height: 400px"
            src="{{ asset('assets/pictures/main.webp') }}" alt="">
        <h2 class="z-2 text-white">Termék</h2>
    </div> --}}




    <div class="d-flex justify-content-center product_top">

        <div class=" d-flex flex-column px-5 mx-3 my-3 bg-white resp_product">
            <div class="d-flex resp_product_1">
                <div class="p-5 d-flex justify-content-center w-50 fade-1 resp_product_2" style="display: none">
                    @if ($product->thumbnail)
                        <img class="my-4 col-9 object-fit-cover" src="{{ $product->thumbnail }}" alt="...">
                    @else
                        <img class="my-4" src="{{ asset('assets/pictures/no-photo.jpeg') }}" alt="{{ $product->name }}">
                    @endif
                </div>
                <div class="p-5 fade-1 " style="display: none">
                    <h2>{{ $product->name }}</h2>
                    <p>Organikus matcha zöld tea</p>
                    <h3 style="color: green">{{ $product->price }} Ft</h3>
                    <small>Kiszerelés: {{ $product->pack }} g</small>
                    @if ($product->stock > 0)
                    <form class="add-to-cart-form" action="/add-to-cart/{{ $product->id }}" method="post">
                        @csrf
                        <small class="text-success d-block">Még <b class="fs-6">{{$product->stock}}</b> van készleten!</small>
                        <div class=" d-flex flex-row pt-5 w-100">
                            
                            <input class="p-2 col-3" type="number" value="1" min="1" max="100"
                                name="qtty">

                            <div class="ps-4"><button class="cart-button">Kosárba</button></div>
                        </div>
                    </form>
                    @else
                        <p class="text-danger pt-5">A termék jelenleg nem elérhető</p>
                    @endif
                    

                    <div class="data mt-5 fade-1" style="display: none">
                        @if ($product->from)
                            <p><b>Származás:</b> {{ $product->from }}</p>
                        @endif

                        @if ($product->taste)
                            <p><b>Íz:</b> {{ $product->taste }}</p>
                        @endif

                        @if ($product->use)
                            <p><b>Ajánlott felhasználás:</b> {{ $product->use }}</p>
                        @endif

                        @if ($product->ingredients)
                            <p><b>Összetevők:</b> {{ $product->ingredients }}</p>
                        @endif

                    </div>
                    <p style="font-style: italic" class="mt-5 fade-2" style="display: none">10.000Ft felett ingyenes
                        kiszállítás! 2-3 munkanapon belül!</p>
                </div>
            </div>
            <div class="col-6 p-5 d-flex mt-5 flex-column fade-3" style="display: none">
                <h4 style="font-family: Roboto Condensed, sans-serif;">{{ $product->name }} :</h4>
                <p style="font-family: Roboto Condensed, sans-serif;">{{ $product->description }}</p>
            </div>

        </div>

    </div>


@endsection
