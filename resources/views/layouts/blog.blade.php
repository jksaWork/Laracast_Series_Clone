<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="scrf-toekn" content="{{ csrf_token() }}">
    <title>
        {{-- <?php echo  $new_title ?> --}}
        Blog System
    </title>
    <link rel="shortcut icon" href="design/img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('design/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('design/css/custom_style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="{{ asset('design/index.js') }}"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body>
<div id="app">
    @include('layouts.includes.nav')
    <div style='min-height:76vh'>
        @yield('content')
    </div>
    @include('layouts.includes.footer')
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

