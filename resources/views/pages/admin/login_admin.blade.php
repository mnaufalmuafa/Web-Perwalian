@extends('layouts.dosen')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/login_admin.css') }}">
@endsection

@section('title')
    Login Admin
@endsection

@section('content')
    <main id="body-main-content">
        <article>
            <header>
                <h2>Login Admin</h2>
            </header>
            <main id="article-main-content">
                <form v-on:submit.prevent="onSubmit">
                    <label for="">Username</label>
                    <input type="text" id="inputUsername" v-model="username">
                    <br>
                    <label for="">Password</label>
                    <input type="password" id="inputPassword" v-model="password">
                    <br>
                    <small v-if="alreadyFetching && !currentlyFetching && usernameOrPasswordFalse">Username atau password salah</small>
                    <button type="submit">Login</button>
                    <a href="/edit_password">Ganti Password</a>
                </form>
            </main>
        </article>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('javascript/pages/admin/login_admin.js') }}"></script>
@endsection