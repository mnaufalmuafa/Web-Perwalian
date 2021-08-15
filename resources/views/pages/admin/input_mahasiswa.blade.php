@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/input_mahasiswa.css') }}">
@endsection

@section('title')
    Input Mahasiswa
@endsection

@section('content')
    <main id="body-main-content">
        <h2>Input Mahasiswa</h2>
        <form v-on:submit.prevent="onSubmit">
            <label for="inputName">Nama</label>
            <br>
            <input type="text" name="name" id="inputName">

            <label for="inputNIM">NIM</label>
            <br>
            <input type="number" name="nim" id="inputNIM" max="9999999999" min="1000000000">
            <small id="smallError">NIM sudah digunakan</small>

            <label for="inputStatus">Status</label>
            <select name="status" id="inputStatus">
                <option value="Aktif">Aktif</option>
                <option value="TidakAktif">Tidak Aktif</option>
                <option value="Cuti">Cuti</option>
            </select>

            <label for="inputClassId">Kelas</label>
            <br>
            <select name="class_id" id="inputClassId">
                <option value="0">--NULL--</option>
                <option v-for="kelas in dataKelas" :value="kelas.id">@{{ kelas.name }}</option>
            </select>

            <input type="hidden" name="is_deleted" value="0">

            <input type="submit" value="Submit">
        </form>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/admin/input_mahasiswa.js') }}"></script>
@endsection
