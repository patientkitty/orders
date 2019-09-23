<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>User Portal</title>
        <base href="{{ URL::asset('/') }}" target="_top">
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
        <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    </head>
    {{-- website menu --}}


    <body>
    <div class="container my-4">
        @include('layouts.errors')
        @yield('content')
    </div>
    {{-- Footer --}}
    <div class="card">
        <div class="card-body text-center">
            This is the footer.
        </div>
    </div>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>

    </body>
</html>