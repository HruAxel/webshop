<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz@1,6..96&family=Cinzel+Decorative&family=Manrope:wght@200..800&family=MedievalSharp&family=MonteCarlo&family=Playfair+Display&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="{{asset('/js/jquery.js')}}"></script>
    <title>@yield('title')</title>
</head>
<body class="w-100 bg-body-secondary min-vh-100">
    <nav class="fixed-top">
      <div class="navbar bg-black bg-opacity-50 z-3 py-2">
        <div class="w-25">
        <div class="d-flex justify-content-center">
          <a href="{{route('homepage')}}" class="navbar-brand d-flex justify-content-center"><img class="logo" src="{{asset('assets/pictures/logo.png')}}" alt=""></a>
        </div>
      </div>
        <div class="w-75 d-flex justify-content-start align-items-center">
        <div class="w-75 ">
          <ul class="navbar-nav d-flex flex-row justify-content-evenly py-4">
            <li class="nav-item dropdown px-2">
              <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                WEBSHOP
              </a>
              <ul class="dropdown-menu position-absolute  bg-black bg-opacity-50">
                <li class="text-center"><a class="dropdown-item py-3" href="{{route('webshop')}}">Minden termék</a></li>
                <li class="text-center"><a class="dropdown-item py-3" href="#">Matcha tea</a></li>
                <li class="text-center"><a class="dropdown-item py-3" href="#">Kiegészítők</a></li>
                {{-- <li><hr class="dropdown-divider"></li> --}}
                <li class="text-center"><a class="dropdown-item py-3" href="{{route('tea')}}">Szálas teák</a></li>
                <li class="text-center"><a class="dropdown-item py-3" href="#">Egyéb</a></li>
              </ul>
            </li>
            <li class="nav-item px-2"><a href="{{route('about')}}" class="nav-link">RÓLUNK</a></li>
            <li class="nav-item px-2"><a href="#" class="nav-link">MI A MATCHA?</a></li>
            <li class="nav-item px-2"><a href="#" class="nav-link">RECEPTEK</a></li>
            <li class="nav-item px-2"><a href="{{route('cart')}}" class="nav-link">KOSÁR</a></li>
            <li class="nav-item px-2 d-flex align-items-center text-white">|</li>
            <li class="nav-item px-2"><a href="{{route('logpage')}}" class="nav-link">FIÓKOM</a></li>
          </ul>
        </div>
      </div>
      </div>
    </nav>
    <div class="w-100">
      @yield('content')
    </div>

    {{-- <div class="w-100 bg-dark" style="height: 300px" >
      <div class="w-100" style="height:300px" >

      </div> --}}
    </div>

    

    <script src="/js/app.js"></script>
</body>
</html>