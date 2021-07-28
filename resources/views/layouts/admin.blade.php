<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    @include('includes.style')
    @yield('add-on-style')
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header')
    @yield('content')
    @include('includes.script')
    @yield('add-on-script')
</html>
