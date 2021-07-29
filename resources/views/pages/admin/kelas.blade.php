@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/kelas.css') }}">
@endsection

@section('title')
    Data Kelas
@endsection

@section('content')
    <main id="body-main-content">
        <section id="classHeadingSection" class="headingSection">
            <h2>Data Kelas</h2>
            <a href="/admin/dashboard/kelas/input"><button>Tambah Kelas</button></a>
        </section>

        <section id="classDaataSection">
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Angkatan</th>
                        <th>Dosen Wali</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(kelas, index) in dataKelas">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ kelas.name }}</td>
                        <td>@{{ kelas.generation | showGeneration() }}</td>
                        <td>@{{ kelas.dosen_wali | showDosenWali() }}</td>
                        <td>
                            <button class="btnEdit">Edit</button>
                            <button>Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="sectionNoDataClassInfo" class="noDataSection" v-if="dataKelas == null || dataKelas.length == 0">
            <p>Belum ada data kelas</p>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/admin/kelas.js') }}"></script>
@endsection