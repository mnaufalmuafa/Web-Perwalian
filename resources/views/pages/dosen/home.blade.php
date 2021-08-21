@extends('layouts.dosen')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/dosen/home.css') }}">
@endsection

@section('title')
    Beranda
@endsection

@section('content')
    <main>
    <div class="card">
            <div class="container">    
                <h4><b>FORM 1</b></h4>
                <p>info.......</p>
                <a href="/form1?lecturer_id=0&class_id=0&school_year_id=1&semester=Ganjil"><button class="default-button-color">Isi form 1</button></a>
            </div>
        </div>

        <div class="card">
            <div class="container">
                <h4><b>FORM 2</b></h4>
                <p>info.......</p>
                <a href="/form2?lecturer_id=0&class_id=0&school_year_id=1&semester=Ganjil"><button class="default-button-color">Isi form 2</button></a>
            </div>
        </div>

        <div class="card">
            <div class="container">
                <h4><b>FORM 3</b></h4>
                <p>info.......</p>
                <a href="/form3?lecturer_id=0&class_id=0&school_year_id=1&semester=Ganjil"><button class="default-button-color">Isi form 3</button></a>
            </div>
        </div>
    </main>
@endsection