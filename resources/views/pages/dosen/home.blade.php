@extends('layouts.dosen')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/dosen/home.css') }}">
@endsection

@section('title')
    Beranda
@endsection

@section('content')
    <main>
        <a href="/form1?lecturer_id=0&class_id=0&school_year_id=1&semester=Ganjil"><button class="default-button-color">Isi form 1</button></a>
        <a href="/form2?lecturer_id=0&class_id=0&school_year_id=1&semester=Ganjil"><button class="default-button-color">Isi form 2</button></a>
        <a href="/form3?lecturer_id=0&class_id=0&school_year_id=1&semester=Ganjil"><button class="default-button-color">Isi form 3</button></a>
    </main>
@endsection