@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/update_dosen.css') }}">
@endsection

@section('title')
    Update Dosen
@endsection

@section('content')
    <main id="body-main-content">
        <h2>Edit Dosen</h2>
        <form v-on:submit.prevent="onSubmit()">
            <label for="inputLecturerCode">Kode Dosen</label>
            <br>
            <input type="hidden" value="{{ $id }}" id="inputId">
            <input type="text" name="lecturer_code" id="inputLecturerCode" maxlength="3" value="{{ $lecturer_code }}">
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/admin/update_dosen.js') }}"></script>
@endsection