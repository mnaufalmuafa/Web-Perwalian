@extends('layouts.dosen')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/change_password.css') }}">
@endsection

@section('title')
    Ubah Password
@endsection

@section('content')
    <main>
        <form v-on:submit.prevent="onSubmit">
            
            <h1>Ubah Password</h1>

            <!-- WebPerwalian -->
            <label 
                for="inputOldPassword">
                Password Lama
            </label>
            <input 
                type="password" 
                name="oldPassword" 
                id="inputOldPassword" 
                v-model="oldPassword"
                minlength="8"
                required>

            <small 
                id="errorOldPassword"
                v-if="!oldPasswordNotFetched && oldPasswordWrong && !oldPasswordIsBeingFetching">
                Password salah
            </small>

            <label 
                for="inputNewPassword">
                Password Baru
            </label>
            <input 
                type="password" 
                name="newpassword" 
                id="inputNewPassword" 
                v-model="newPassword"
                minlength="8" 
                required>

            <small 
                id="errorNewPassword"
                v-if="newPassword.length > 0 && newPassword.length < 8">
                Password kurang dari 8 karakter
            </small>

            <label 
                for="inputRetypeNewPassword">
                Ulangi Password Baru
            </label>
            <input 
                type="password" 
                name="retypeNewpassword" 
                id="inputRetypeNewPassword" 
                v-model="retypeNewPassword"
                minlength="8" 
                required>

            <small 
                id="errorRetypePassword"
                v-if="newPassword.length > 0 && retypeNewPassword.length > 0 && newPassword != retypeNewPassword">
                Password tidak sama
            </small>

            <button type="submit">Ubah Password</button>
        </form>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/change_password.js') }}"></script>
@endsection