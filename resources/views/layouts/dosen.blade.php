<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    @include('includes.style.dosen')
    @yield('add-on-style')
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header.dosen')
    @yield('content')
    @include('includes.script.dosen')
    @yield('add-on-script')
</html>
