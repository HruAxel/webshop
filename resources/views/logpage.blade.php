@extends('layouts.main')

@section('title, Kezdőlap')

@section('content')

<div class="w-100 min-vh-100 d-flex">
    <div class="w-50 min-vh-100 right d-flex justify-content-end align-items-center" style="background-color: #3BAF29">
        <div class="me-5 pe-5">
           <a href="{{route('signin')}}" class="link-offset-2 link-underline link-underline-opacity-0"><h2 style="color: #000000">Bejelentkezés</h2></a> 
        </div>
    </div>
    <div class="w-50 min-vh-100 left d-flex justify-content-start align-items-center" style="background-color: #000000">
        <div class="ms-5 ps-5">
            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 "><h2  style="color: #3BAF29">Regisztráció</h2></a>
        </div>
    </div>
</div>


@endsection