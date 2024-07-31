<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz@1,6..96&family=Cinzel+Decorative&family=Manrope:wght@200..800&family=MedievalSharp&family=MonteCarlo&family=Playfair+Display&family=Poppins:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <title>@yield('title')</title>
</head>

<body class="w-100 bg-body-secondary min-vh-100">

    <div class="w-100">

        @auth('admin')
            <nav class="navbar bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route('dashboard')}}">MOYA webshop admin</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Irányítópanel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#"></a></li>
                                    </ul>
                                </li> --}}
                            </ul>

                            
                            <form action="{{ route('admin.logout') }}" method="post">
                                @csrf
                                <button onclick="return confirm('Biztosan ki szeretnél lépni?')" class="button btn btn-outline-danger ">
                                    Kijelentkezés
                                </button>
                            </form>
                            






                        </div>
                    </div>
                </div>
            </nav>
            @endauth
            <div class="col-12 min-vh-100 mt-5">
                @yield('content')
            </div>
            




    </div>

    {{-- <div class="w-100 bg-dark" style="height: 300px" >
      <div class="w-100" style="height:300px" >

      </div> --}}
    </div>



    <script src="/js/app.js"></script>
</body>

</html>
