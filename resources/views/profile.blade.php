@extends('layouts.main')

@section('title', 'Profil')

@section('content')

<div class="w-100 d-flex justify-content-center align-items-center" style="height: 400px">
    <img class="w-100 position-absolute top-0 z-0 img_1 object-fit-cover" style="height: 400px"
        src="{{ asset('assets/pictures/main.webp') }}" alt="">
    <h2 class="z-2 text-white">
        <div class="w-100">
            <p class="text-center">Szia {{ Auth::user()->name }} most éppen be vagy lépve!</p>
        </div>
    </h2>
</div>


<div class="container mt-5 my-3 my-5">

    <form action="{{route('post.generalData')}}" method="post" class="row col-md-6 col-lg-4 mx-auto g-3">

        @csrf

        <div class="mx-auto g-3">
            <h4 class="text-center">ÁLTALÁNOS</h4>
        </div>

        <div class="col-12">
            <label for="name" class="fs-6 pb-1">Név:</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ Auth::user()->name }}">
        </div>

        <div class="col-12">
            <label for="email" class="fs-6 pb-1">Email cím:</label>
            <input type="email" name="email" id="email" class="form-control"
                value="{{ Auth::user()->email }}">
        </div>

        <div class="col-12">
            <label for="mobil" class="fs-6 pb-1">Telefonszám:</label>
            <input type="text" name="mobil" id="mobil" class="form-control" value="{{ Auth::user()->mobil }}">
        </div>
        <div class="col-12">
          <button class="button btn btn-outline-success position-relative top-50 start-50 translate-middle">
              Mentés
          </button>
      </div>

    </form>
    <form action="{{route('post.changePasswordSave')}}" method="post" class="row col-md-6 col-lg-4 mx-auto g-3">
        <div class="mx-auto p-4">
            <h5 class="text-center">JELSZÓ MEGVÁLTOZTATÁSA</h5>
        </div>

        @if($errors->any())
    {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
    @endif
    @if(Session::get('error') && Session::get('error') != null)
    <div style="color:red">{{ Session::get('error') }}</div>
    @php
    Session::put('error', null)
    @endphp
    @endif
    @if(Session::get('success') && Session::get('success') != null)
    <div style="color:green">{{ Session::get('success') }}</div>
    @php
    Session::put('success', null)
    @endphp
    @endif

        <form class="form" action="{{ route('post.changePasswordSave') }}" method="post">
          @csrf
          <div class="col-12">
              <label for="current_password" class="form-label">Aktuális jelszó:</label>
              <input type="password" class="form-control" id="current_password" name="current_password">
          </div>
          <div class="col-12">
              <label for="new_password" class="form-label">Új jelszó:</label>
              <input type="password" class="form-control" id="new_password" name="new_password">
          </div>
          <div class="col-12">
              <label for="new_password_confirmation" class="form-label">Új jelszó mégegyszer:</label>
              <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
          </div>
          <div class="col-12">
            <button class="button btn btn-outline-success position-relative top-50 start-50 translate-middle">
                Mentés
            </button>
        </div>
      </form>



    <form action="{{route('post.changeBilling')}}" method="post" class="row col-md-6 col-lg-4 mx-auto g-3">
        <div class="mx-auto p-4">
            <h4 class="text-center">SZÁMLÁZÁSI ADATOK</h4>
        </div>
        @csrf
        <div class=" col-12">
            <label for="" class="pb-1">Irányító szám, város:</label>
            <div class="d-flex">
                <input type="number" name="zip" id="zip" class="form-control w-25 me-1" value="{{Auth::user()->billingData->zip ?? ''}}">
                <input type="text" name="city" id="city" class="form-control w-75" value= "{{ Auth::user()->billingData->city ?? ''}}">
            </div>
        </div>

        <div class="col-12">
            <label for="address" class="fs-6 pb-1">Cím, házszám:</label>
            <input type="text" name="address" id="address" class="form-control" value = "{{ Auth::user()->billingData->address ?? ''}}">
        </div>

        <div class="col-12">
            <label for="" class="fs-6 pb-1">Emelet, kapucsengő:</label>
            <div class="d-flex">
                <input type="text" name="floor" id="floor" class="form-control w-50 me-1" value = "{{Auth::user()->billingData->floor ?? ''}}">
                <input type="text" name="doorbell" id="doorbell" class="form-control w-50" value = "{{Auth::user()->billingData->doorbell ?? ''}}">
            </div>
        </div>
        <div class="col-12">
          <button class="button btn btn-outline-success position-relative top-50 start-50 translate-middle">
              Mentés
          </button>
      </div>
    </form>




</div>

@endsection