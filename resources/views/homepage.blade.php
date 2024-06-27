@extends('layouts.main')

@section('title', 'Kezdőlap')

@section('content')

<div class="w-100">
    <img class="w-100 position-absolute top-0 z-0 img_1 object-fit-cover" style="height: 1000px" src="{{asset('assets/pictures/main.webp')}}" alt="">
</div>
    <div class="content" style="height: 1000px">
        <div class="w-100 d-flex justify-content-center align-items-center h-100">
            <img class="z-4 position-absolute" src="{{asset('assets/pictures/Moya_Logo_White.png')}}" alt="">
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <h2>Legnépszerűbb termékek</h2>
    </div>
    
    <div class="my-3 mx-5  d-flex justify-content-between flex-wrap"  style="padding-left: 200px; padding-right: 200px">



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