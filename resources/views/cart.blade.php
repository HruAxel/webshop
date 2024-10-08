@extends('layouts.main')

@section('title', 'Kosár')

@section('content')

    <div class="col-12 d-flex justify-content-center align-items-center" style="height: 400px">
        <img class="col-12 position-absolute top-0 z-0 img_1 object-fit-cover" style="height: 400px"
            src="{{ asset('assets/pictures/main.webp') }}" alt="">
        <h2 class="z-2 text-white">Kosár</h2>
    </div>

    <div class="d-flex justify-content-center">

        <div class="col-9 d-flex justify-content-center flex-column-reverse m-5">


            @php
                $cart = session('cart', []);
            @endphp
            @php
                $cart = session('cart', []);
                $total = 0;
            @endphp
            @if (!empty($cart))
                <form class="d-flex flex-column-reverse" action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
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

                            </th>
                            <th>
                                Összesen
                            </th>
                        </tr>



                        @foreach ($cart as $key => $item)
                            <tr>
                                <td class="col-3"><img class="col-6" src="{{ $item['product']->thumbnail }}"
                                        alt="">
                                </td>
                                <td><a href="{{ route('product.view', $item['product']) }}">{{ $item['product']->name }}</a>
                                </td>
                                <td>{{ $item['product']->price }} Ft</td>
                                <td> <input class="col-3 text-center" type="number" name="items[{{ $key }}][qtty]"
                                        value="{{ $item['qtty'] }}" min="1"></td>
                                <td><button type="submit" name="update_item" value="{{ $key }}"
                                        class="btn btn-primary">Frissítés</button></td>
                                <td>{{ $item['subtotal'] }} Ft</td>
                            </tr>
                            @php
                                $total += $item['subtotal'];
                            @endphp
                        @endforeach

                </form>


                <div>
                    <h3>Végösszeg: {{ $total }} Ft</h3>
                </div>
                <div class="d-flex justify-content-evenly">
                    <form action="{{ route('clear.cart') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger mb-5 col-3 me-auto"
                            onclick="return confirm('Biztosan törölni szeretnéd a kosarat?')">KOSÁR TÖRLÉSE</button>
                    </form>
                    <form action="" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success mb-5 w-25">PÉNZTÁR</button>
                    </form>
                </div>
            @else
                <div class="col-12 d-flex justify-content-center align-items-center" style="height: 500px">
                    <p>A kosarad üres.</p>
                </div>

            @endif

            </table>
            </form>
        </div>
    </div>

















@endsection
