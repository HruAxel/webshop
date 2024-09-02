@extends('layouts.main')

@section('title', 'Receptek')

@section('content')

<div class="col-12 d-flex justify-content-center align-items-center" style="height: 400px">
    <img class="col-12 position-absolute top-0 z-0 img_1 object-fit-cover" style="height: 400px" src="{{asset('assets/pictures/about.jpeg')}}" alt="">
    <h2 class="z-2 text-white">Receptek</h2>
</div>
<div class="col-12 d-flex justify-content-center">
    <div class="col-10 p-5 d-flex flex-wrap justify-content-center flex-row">

        <div class="card m-2 text-center col-4">
            <a href="#" ><div class="fadein"><img src="{{asset('assets/pictures/matcha-tiramisu.jpeg')}}" class="object-fit-cover border rounded col-12"  alt="Tiramisu recept"></a></div>
            <div class="card-body">
              <h5 class="card-title"><a href="" style="color: #4bb857" class="link-offset-2 link-underline link-underline-opacity-0">MATCHA TIRAMISU</a></h5>
            </div>
          </div>

          <div class="card m-2 text-center col-4">
            <a href="#" ><div class="fadein"><img src="{{asset('assets/pictures/matcha-coctail.jpeg')}}" class="object-fit-cover border rounded col-12"  alt="Tiramisu recept"></a></div>
            <div class="card-body">
              <h5 class="card-title"><a href="" style="color: #4bb857" class="link-offset-2 link-underline link-underline-opacity-0">MATCHA TONIC</a></h5>
            </div>
          </div>

          <div class="card m-2 text-center col-4">
            <a href="#" ><div class="fadein"><img src="{{asset('assets/pictures/matcha-honeybread.jpeg')}}" class="object-fit-cover border rounded col-12"  alt="Tiramisu recept"></a></div>
            <div class="card-body">
              <h5 class="card-title"><a href="" style="color: #4bb857" class="link-offset-2 link-underline link-underline-opacity-0">MÉZES-RICOTTÁS PIRÍTÓS MATCHÁVAL</a></h5>
            </div>
          </div>

          <div class="card m-2 text-center col-4">
            <a href="#" ><div class="fadein"><img src="{{asset('assets/pictures/matcha-dessert.jpeg')}}" class="object-fit-cover border rounded col-12"  alt="Tiramisu recept"></a></div>
            <div class="card-body">
              <h5 class="card-title"><a href="" style="color: #4bb857" class="link-offset-2 link-underline link-underline-opacity-0">MATCHA KRÉMES</a></h5>
            </div>
          </div>

        
    </div>
   
</div>


@endsection