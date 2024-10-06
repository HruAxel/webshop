@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success mt-5 pt-3">{{ Session::get('success') }}</div>
    @endif


    <div class="d-flex justify-content-center align-items-center flex-column min-vh-100">
        <div class=" d-flex justify-content-center col-12 mx-2 my-2 px-5 py-5 ">
            {{-- <button class="col-5 btn btn-success"><a href="{{route('newproduct.view')}}">Új termék</a></button> --}}
        </div>



        <div class="card col-7 min-vh-100 px-5 py-5 mx-2 my-2">



            <table class="table table-border text-center ">
                <tr>
                    <th>
                        Cikkszám
                    </th>
                    <th class="col-4">
                        Név
                    </th>
                    <th>
                        Összes készlet
                    </th>
                    <th>
                        Szabad készlet
                    </th>
                    <th>
                        Foglalt készlet
                    </th>
                    <th>
                        Egységár
                    </th>
                </tr>


                @foreach ($list as $item)
                    <tr>
                        <td class="py-4">{{ $item->id }}</td>
                        <td class="py-4">{{ $item->name }}</td>
                        <td class="py-4">

                            @php
                                $num1 = $item->stock;
                                $num2 = $item->reserved_stock;

                                $sum = $num1 += $num2;
                            @endphp
                            {{ $sum }}

                        </td>
                        <td class="py-4">
                            <form action="{{route('admin.stockUpdate', $item->id)}}" method="POST" class="d-flex justify-content-center align-items-center">
                                @csrf
                                <div class="mx-4"><input type="number" name="stock" id="stock" min="0"
                                        value="{{ $item->stock }}" class="w-100 text-center"></div>


                        </td>
                        <td class="py-4">

                            {{ $item->reserved_stock }}
                            {{-- <div class="d-flex">
                                    <a href="{{ route('adminedit', $item->id) }}" class="me-2"><button type="button"
                                            class="btn btn-warning">M</button></a>
                                    <form action="{{ route('product.delete', $item->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan törlöd?')">T</button>
                                    </form>
                                </div> --}}


                        </td>
                        <td class="py-4"><button type="submit" class="btn btn-success">Mentés</button></td>
                    </tr>
                    </form>
                @endforeach
            </table>


        </div>



    </div>


@endsection