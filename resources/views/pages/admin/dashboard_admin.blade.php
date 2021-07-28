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
                        <h3>11</h3>
                        <h3>Dosen</h3>
                    </div>
                    <img src="/image/icon/png/teacher.png" alt="Dosen">
                </main>
                <footer id="footerLecturer">Lebih Lanjut</footer>
            </article>

            <article>
                <main>
                    <div>
                        <h3>33</h3>
                        <h3>Kelas</h3>
                    </div>
                    <img src="/image/icon/png/class.png" alt="Kelas">
                </main>
                <footer id="footerClass">Lebih Lanjut</footer>
            </article>

            <article>
                <main>
                    <div>
                        <h3>22</h3>
                        <h3>Mahasiswa</h3>
                    </div>
                    <img src="/image/icon/png/student.png" alt="Mahasiswa">
                </main>
                <footer id="footerStudent">Lebih Lanjut</footer>
            </article>
        </section>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('javascript/pages/admin/dashboard_admin.js') }}"></script>
@endsection