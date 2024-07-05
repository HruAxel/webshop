@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success mt-5 pt-3">{{ Session::get('success') }}</div>
@endif

@endsection
