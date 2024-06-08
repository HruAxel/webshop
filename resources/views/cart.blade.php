@extends('layouts.main')

@section('title, Kezdőlap')

@section('content')

    <div class="w-100 d-flex justify-content-center align-items-center" style="height: 400px">
        <img class="w-100 position-absolute top-0 z-0 img_1" style="height: 400px"
            src="{{ asset('assets/pictures/main.webp') }}" alt="">
        <h2 class="z-2 text-white">Kosár</h2>
    </div>

    <div class="d-flex justify-content-center">

        <div class="w-75 d-flex justify-content-center flex-column-reverse">


            @php
                $cart = session('cart', []);
            @endphp
            @php
            $cart = session('cart', []); 
            $total = 0; 
        @endphp
            @if (!empty($cart))

                <table class="table table-borderless">
                    <tr>
                        <th>
                            Kép
                        </th>
                        <th>
                            Név
                        </th>
                        <th>
                            Egységár
                        </th>
                        <th>
                            Mennyiség
                        </th>
                        <th>
                            Összesen
                        </th>
                    </tr>

                    @foreach (Session::get('cart') as $item)
                        <tr>
                            <td class="w-25"><img class="w-50" src="{{ $item['product']->thumbnail }}" alt="">
                            </td>
                            <td>{{ $item['product']->name }}</td>
                            <td>{{ $item['product']->price }}Ft</td>
                            <td> <input class="w-25 text-center" type="number" name="" value="{{ $item['qtty'] }}" id=""></td>
                            <td>{{ $item['subtotal'] }}Ft</td>
                        </tr>
                        @php
                        $total += $item['subtotal'];
                    @endphp
                    @endforeach

                    

                <div>
                    <h3>Végösszeg: {{$total}}</h3>
                </div>
                    <div class="d-flex justify-content-evenly">
                        <form action="{{ route('clear.cart') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger mb-5 w-25 me-auto"
                                onclick="return confirm('Biztosan törölni szeretnéd a kosarat?')">KOSÁR TÖRLÉSE</button>
                        </form>
                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success mb-5 w-25">PÉNZTÁR</button>
                        </form>
                    </div>
                @else
                    <div class="w-100 d-flex justify-content-center align-items-center" style="height: 500px">
                        <p>A kosarad üres.</p>
                    </div>

            @endif

            </table>

        </div>
    </div>

















@endsection
