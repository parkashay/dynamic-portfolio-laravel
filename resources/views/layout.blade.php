<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

    {{-- CSS Imports --}}
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

</head>

<body>
    <header>
        @yield('navbar')
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        @yield('footer')
    </footer>

    {{-- Scripts and Library imports --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/particles.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>

    {{-- This is for the initialization of the materialize box for image popup --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems);
        });
    </script>
    
    {{-- Dropdown Initialization --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown');
        var instances = M.FormSelect.init(elems);
    });
</script>
</body>

</html>
