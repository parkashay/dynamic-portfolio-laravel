<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

   <link rel="stylesheet" href="{{asset('css/index.css')}}">
   <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
   <link rel="stylesheet" href="{{asset('css/home.css')}}">
   <link rel="stylesheet" href="{{asset('css/admin.css')}}">
   <link rel="stylesheet" href="{{asset('css/footer.css')}}">
</head>

<body>
    <header class="navbar">
        @yield('navbar')
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        @yield('footer')
    </footer>

</body>

</html>