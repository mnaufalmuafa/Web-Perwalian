@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/dashboard.css') }}">
@endsection

@section('title')
    Dashboard Admin
@endsection

@section('content')
    <main id="body-main-content">
        <section id="firstSection">
            <article>
                <main>
                    <div>
                        <h3>@{{ dosenCount }}</h3>
                        <h3>Dosen</h3>
                    </div>
                    <img src="/image/icon/png/teacher.png" alt="Dosen">
                </main>
                <footer v-on:click="redirectToInfo('dosen')">Lebih Lanjut</footer>
            </article>

            <article>
                <main>
                    <div>
                        <h3>@{{ kelasCount }}</h3>
                        <h3>Kelas</h3>
                    </div>
                    <img src="/image/icon/png/class.png" alt="Kelas">
                </main>
                <footer v-on:click="redirectToInfo('kelas')">Lebih Lanjut</footer>
            </article>

            <article>
                <main>
                    <div>
                        <h3>@{{ mahasiswaCount }}</h3>
                        <h3>Mahasiswa</h3>
                    </div>
                    <img src="/image/icon/png/student.png" alt="Mahasiswa">
                </main>
                <footer v-on:click="redirectToInfo('mahasiswa')">Lebih Lanjut</footer>
            </article>
        </section>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('javascript/pages/admin/dashboard_admin.js') }}"></script>
@endsection