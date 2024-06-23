@extends('layouts.main')

@section('title')

@section('content')

    <div class="w-100 min-vh-100 d-flex">
        <div class="w-50 min-vh-100 d-flex justify-content-end align-items-center overflow-hidden position-relative">
            
                <img class="w-100 position-absolute object-fit-cover top-0 h-100 side-left-hover" src="{{ asset('assets/pictures/log_1.jpeg') }}" alt="">
            
            <div class="me-5 pe-5 z-2 left_h">
                <a href="{{ route('login') }}" class="link-offset-2 link-underline link-underline-opacity-0 ">
                    <h2 class=" fs-1" style="color: #ffffff">Bejelentkezés</h2>
                </a>
            </div>
        </div>
        <div class="w-50 min-vh-100 d-flex justify-content-start align-items-center overflow-hidden position-relative">
            <img class="w-100 position-absolute object-fit-cover top-0 h-100 side-right-hover" src="{{ asset('assets/pictures/log_2.jpeg') }}" alt="">
            <div class="ms-5 ps-5 z-2 right_h">
                <a href="{{ route('register') }}" class="link-offset-2 link-underline link-underline-opacity-0 ">
                    <h2 class=" fs-1" style="color: #ffffff">Regisztráció</h2>
                </a>
            </div>
        </div>
    </div>


@endsection
