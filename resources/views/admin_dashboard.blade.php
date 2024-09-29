@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success mt-5 pt-3">{{ Session::get('success') }}</div>
@endif


<div class="card-group mx-5 my-5 py-5 px-5">
    <div class="card">
      <div class="card-body d-flex justify-content-center align-items-center">
        <h5 class="card-title"><a class="link-offset-2 link-underline link-underline-opacity-0" style="color: white" href="{{route('productlist')}}">Termék lista</a> </h5>

      </div>
    </div>
 
    </div>
    {{-- <div class="card p-5">
      <div class="card-body d-flex justify-content-center align-items-center">
        <h5 class="card-title"><a class="link-offset-2 link-underline link-underline-opacity-0" style="color: white" href="">Kategória hozzáadása</a></h5>

      </div>
    </div> --}}
  </div>
  

@endsection
