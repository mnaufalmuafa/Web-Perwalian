@extends('layouts.dosen')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/dosen/home.css') }}">
@endsection

@section('title')
    Beranda
@endsection

@section('content')
    <main>
        <a href="/form2"><button class="default-button-color">Isi form 2</button></a>
        <a href=""><button class="default-button-color">Isi form 3</button></a>
    </main>
@endsection