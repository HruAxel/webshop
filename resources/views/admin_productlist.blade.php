@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success mt-5 pt-3">{{ Session::get('success') }}</div>
    @endif


    <div class="d-flex justify-content-center col-12 min-vh-100">

        <div class="card col-9 px-5 py-5">

            <div class="card min-vh-100 px-5 py-5">



                <table class="table table-border">
                    <tr>
                        <th class="w-25">
                            Cikkszám
                        </th>
                        <th>
                            Név
                        </th>
                        <th>
                            Mósosítás/Törlés
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
                              <a href="{{route('adminedit', $item->id)}}" class="me-2"><button type="button" class="btn btn-warning">M</button></a>
                                             <a href=""><button type="button" class="btn btn-danger">T</button></a>
                            </td>
                            <td class="py-4">{{ $item->price }} Ft</td>
                        </tr>
                    @endforeach
                </table>


            </div>

        </div>

    </div>


@endsection
