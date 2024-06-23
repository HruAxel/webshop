@extends('layouts.main')

@section('title', 'Bejelentkezés')

@section('content')

    <div class="w-100 d-flex justify-content-center align-items-center" style="height: 400px">
        <img class="w-100 min-vh-100 position-absolute top-0 z-0 img_1" src="{{ asset('assets/pictures/log_1.jpeg') }}"
            alt="">
        <h2 class="z-2 text-white">Bejelentkezés</h2>
    </div>


    <div class="w-100  d-flex justify-content-center ">
        <form class="col-3  z-2" action="{{route('post.login')}}" method="post">
            @if (Session::has('error'))
                <div class="alert alert-danger my-3">{{ Session::get('error') }}</div>
            @endif

            @csrf
            <div class=" d-flex justify-content-center flex-column">
                <div class=" pb-3">

                    <input  type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="E-mail cím">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="">

                    <input type="password" name="password" id="password" class="form-control" placeholder="Jelszó">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3 d-flex justify-content-center">
                    <button class="button btn btn-success ">
                        Bejelentkezés
                    </button>
                </div>
            </div>
        </form>
    </div>


@endsection
