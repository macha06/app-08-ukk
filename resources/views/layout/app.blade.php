<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('part.link')
</head>

<body>
    <div id="app">
        @if (Auth::user()->akses == 'admin')
            @include('layout.sidebar')
        @elseif (Auth::user()->akses == 'petugas')
            @include('layout.sidebar_petugas')
        @else
            @include('layout.sidebar_peminjam')
        @endif
        <div id="main">
            @include('layout.header')
            @include('sweetalert::alert')
            @yield('konten')
            @include('layout.footer')
        </div>
    </div>
    @include('part.script')
</body>

</html>
