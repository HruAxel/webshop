@extends('layouts.main')

@section('title', 'Minden termék')

@section('content')

    <div class="w-100 d-flex justify-content-center align-items-center" style="height: 400px">
        <img class="w-100 position-absolute top-0 z-0 img_1" style="height: 400px"
            src="{{ asset('assets/pictures/main.webp') }}" alt="">
        <h2 class="z-2 text-white">Minden termék</h2>
    </div>


    <div class="my-3 mx-5 px-5 d-flex justify-content-between flex-wrap">


        @foreach ($list as $item)
            <form action="/add-to-cart/{{$item->id}}" method="post" class="product-card d-flex flex-column mx-1 my-3 align-items-center bg-white border border-2 rounded-2">
                @csrf
                @if ($item->thumbnail)
                    <a class="d-flex justify-content-center" href="{{route('product.view', $item->id)}}"><img class="my-4" src="{{ $item->thumbnail }}" alt="..."></a>
                @else
                   <a class="d-flex justify-content-center" href=""><img class="my-4" src="{{ asset('assets/pictures/no-photo.jpeg') }}" alt="{{ $item->name }}"></a> 
                @endif
                <a class="link-offset-2 link-underline link-underline-opacity-0" style="color: black" href="{{route('product.view', $item->id)}}"><p class="mx-2 my-4 text-center nowrap" style="font-size: 1rem">{{ $item->name }}</p></a>
                <small class="px-3">{{ $item->price }} Ft</small>
                <div class=" d-flex flex-row p-3 justify-content-evenly w-100">
                    <input class="p-2 text-center" style="width: 30%" type="number" min="1" max="100" name="qtty" value="1" id="">
                    
                    <button class="cart-button">Kosárba</button>
                </div>
            </form>
        @endforeach
        </div>


@endsection
