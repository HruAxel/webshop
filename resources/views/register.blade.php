@extends('layouts.main')

@section('title', 'Bejelentkezés')

@section('content')

    <div class=" col-12 d-flex justify-content-center align-items-center" style="height: 400px">
        <img class="col-12 min-vh-100 position-absolute top-0 z-0 img_1" src="{{ asset('assets/pictures/log_2.jpeg') }}"
            alt="">
        <h2 class="z-2 text-white">Regisztráció</h2>
    </div>


    <div class="col-12  d-flex justify-content-center ">
        <form class="col-3  z-2" action="{{route('post.register')}}" method="post">
            @if (Session::has('error'))
                <div class="alert alert-danger my-3">{{ Session::get('error') }}</div>
            @endif

            @csrf
            <div class=" d-flex justify-content-center flex-column">
                <div class=" pb-3">

                    <input  type="text" name="name" id="name" class="form-control" value="{{ old('email') }}" placeholder="Teljes név">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
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
                <div class="pt-3">

                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Jelszó mégegyszer">
                </div>

                <div class="mt-3 d-flex justify-content-center">
                    <button class="button btn btn-success ">
                        Regisztráció
                    </button>
                </div>
            </div>
        </form>
    </div>


@endsection
