<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>@yield('title', 'E-com')</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>
    @include('includes.header')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @yield('content')
            </div>
        </div>
    </div>
    @include('includes.footer')
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    {{-- @yield('script') --}}
</body>

</html>
