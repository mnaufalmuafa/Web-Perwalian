<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    @include('includes.style.admin')
    @yield('add-on-style')
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header.admin')
    @yield('content')
    @include('includes.script.admin')
    @yield('add-on-script')
</html>
