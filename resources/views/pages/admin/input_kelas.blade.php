@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/input_kelas.css') }}">
@endsection

@section('title')
    Input Kelas
@endsection

@section('content')
    <main id="body-main-content">
        <h2>Input Kelas</h2>
        <form v-on:submit.prevent="onSubmit">
            <label for="inputName">Nama Kelas</label>
            <br>
            <input type="text" name="name" id="inputName">
            <small id="smallError">Nama kelas sudah digunakan</small>

            <label for="inputGeneration">Angkatan</label>
            <br>
            <select name="generation_id" id="inputGeneration">
                <option value="0">--Pilih Angkatan--</option>
                <option v-for="(angkatan, index) in dataAngkatan" :value="angkatan.id">@{{ angkatan.generation }}</option>
            </select>

            <label for="inputHomeroom">Dosen Wali</label>
            <br>
            <select name="homeroom_id" id="inputHomeroom">
                <option value="0">--Pilih Dosen Wali--</option>
                <option v-for="(dosen, index) in dataDosen" :value="dosen.id">@{{ dosen.lecturer_code }}</option>
            </select>

            <input type="hidden" name="is_deleted" value="0">

            <input type="submit" value="Submit">
        </form>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/admin/input_kelas.js') }}"></script>
@endsection