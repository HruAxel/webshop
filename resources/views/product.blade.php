@extends('layouts.main')

@section('title', $product->name)

@section('content')

    {{-- <div class="w-100 d-flex justify-content-center align-items-center" style="height: 400px">
        <img class="w-100 position-absolute top-0 z-0 img_1" style="height: 400px"
            src="{{ asset('assets/pictures/main.webp') }}" alt="">
        <h2 class="z-2 text-white">Termék</h2>
    </div> --}}




    <div class="d-flex justify-content-center product_top">

        <div class="w-75 d-flex flex-column mx-3 my-3 bg-white border border-2 rounded-2">
            <div class="d-flex flex-row">
                <div class="p-5 d-flex justify-content-center w-50">
                    @if ($product->thumbnail)
                        <img class="my-4 w-75" src="{{ $product->thumbnail }}" alt="...">
                    @else
                        <img class="my-4" src="{{ asset('assets/pictures/no-photo.jpeg') }}" alt="{{ $product->name }}">
                    @endif
                </div>
                <div class="p-5">
                    <h2>{{ $product->name }}</h2>
                    <p>Organikus matcha zöld tea</p>
                    <h4>{{ $product->price }} Ft</h4>
                    <small>{{$product->pack}}</small>
                    <form action="/add-to-cart/{{ $product->id }}" method="post">
                        @csrf
                        <div class=" d-flex flex-row pt-5 w-100">
                            <input class="p-2 w-25"  type="number" value="1" min="1" max="100"
                                name="qtty" id="">

                            <div class="ps-4"><button class="cart-button">Kosárba</button></div>
                        </div>
                    </form>
                    <div class="data mt-5">
                        <p><b>Származás:</b> {{$product->from}}</p>
                        <p><b>Íz:</b> {{$product->taste}}</p>
                        <p><b>Ajánlott felhasználás:</b> {{$product->use}}</p>
                        <p><b>Összetevők:</b> {{$product->ingredients}}</p>
                        
                    </div>
                    <p style="font-style: italic" class="mt-5">10.000Ft felett ingyenes kiszállítás! 2-3 munkanapon belül!</p>
                </div>
            </div>
            <div class="w-50 p-5 d-flex">
                <p>{{ $product->description }}</p>
            </div>

        </div>

    </div>


@endsection
