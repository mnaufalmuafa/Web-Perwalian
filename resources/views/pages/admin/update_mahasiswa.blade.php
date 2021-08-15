@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/input_mahasiswa.css') }}">
@endsection

@section('title')
    Update Mahasiswa
@endsection

@section('content')
<main id="body-main-content">
        <h2>Update Mahasiswa</h2>
        <form v-on:submit.prevent="onSubmit">
            <label for="inputName">Nama</label>
            <br>
            <input type="text" name="name" value="{{ $name }}" id="inputName">

            <label for="inputNIM">NIM</label>
            <br>
            <input type="number" name="nim" id="inputNIM" max="9999999999" min="1000000000" value="{{ $nim }}">
            <small id="smallError">NIM sudah digunakan</small>

            <label for="inputStatus">Status</label>
            <select name="status" id="inputStatus" v-model="status">
                <option value="Aktif">Aktif</option>
                <option value="TidakAktif">Tidak Aktif</option>
                <option value="Cuti">Cuti</option>
            </select>

            <label for="inputClassId">Kelas</label>
            <br>
            <select name="class_id" id="inputClassId" v-model="class_id">
                <option value="0">--NULL--</option>
                <option v-for="kelas in dataKelas" :value="kelas.id">@{{ kelas.name }}</option>
            </select>

            <input type="hidden" name="status" value="{{ $status }}" id="inputPrevStatus">
            <input type="hidden" name="class_id" value="{{ $class_id }}" id="inputPrevKelasId">
            <input type="hidden" name="id" value="{{ $id }}" id="inputId">

            <input type="submit" value="Submit">
        </form>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/admin/update_mahasiswa.js') }}"></script>
@endsection