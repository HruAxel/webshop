<!DOCTYPE html>
<html lang="en">

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
        @yield('content')
    </div>

    {{-- <div class="w-100 bg-dark" style="height: 300px" >
      <div class="w-100" style="height:300px" >

      </div> --}}
    </div>



    <script src="/js/app.js"></script>
</body>

</html>
