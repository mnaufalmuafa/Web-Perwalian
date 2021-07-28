@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/input_dosen.css') }}">
@endsection

@section('title')
    Input Dosen
@endsection

@section('content')
    <main id="body-main-content">
        <h2>Input Dosen</h2>
        <form v-on:submit.prevent="onSubmit" ref="form" target="_blank" action="http://127.0.0.1:8000/post/store_dosen" method="GET">
            <label for="inputLecturerCode">Kode Dosen</label>
            <br>
            <input type="text" name="lecturer_code" id="inputLecturerCode" maxlength="3">
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('javascript/pages/admin/input_dosen.js') }}"></script>
@endsection