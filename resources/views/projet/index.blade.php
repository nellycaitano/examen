<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="app.css">

    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
    <script src="index.js" ></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script> src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"</script>
</head>
<body >
    <div class="container">
      @yield('content')
    </div>
</body>
</html>
