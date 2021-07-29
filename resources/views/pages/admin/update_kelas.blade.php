@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/update_kelas.css') }}">
@endsection

@section('title')
    Edit Kelas
@endsection

@section('content')
    <main id="body-main-content">
        <h2>Edit Kelas</h2>
        <form v-on:submit.prevent="onSubmit">
            <label for="inputName">Nama Kelas</label>
            <br>
            <input type="text" name="name" id="inputName" value="{{ $class->name }}">
            <small id="smallError">Nama kelas sudah digunakan</small>

            <label for="inputGeneration">Angkatan</label>
            <br>
            <select name="generation_id" id="inputGeneration" v-model="generation_id">
                <option value="0">--NULL--</option>
                <option v-for="(angkatan, index) in dataAngkatan" :value="angkatan.id">@{{ angkatan.generation }}</option>
            </select>

            <label for="inputHomeroom">Dosen Wali</label>
            <br>
            <select name="homeroom_id" id="inputHomeroom" v-model="homeroom_id">
                <option value="0">--NULL--</option>
                <option v-for="(dosen, index) in dataDosen" :value="dosen.id">@{{ dosen.lecturer_code }}</option>
            </select>

            <input type="hidden" name="id" value="{{ $id }}" id="inputId">
            <input type="hidden" name="generation_id" value="{{ $class->generation_id }}" id="prevGeneration">
            <input type="hidden" name="homeroom_id" value="{{ $class->homeroom_id }}" id="prevHomeRomm">

            <input type="submit" value="Submit">
        </form>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/admin/update_kelas.js') }}"></script>
@endsection