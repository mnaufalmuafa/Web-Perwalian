@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/mahasiswa.css') }}">
@endsection

@section('title')
    Data Mahasiswa
@endsection

@section('content')
    <main id="body-main-content">
        <section id="classHeadingSection" class="headingSection">
            <h2>Data Mahasiswa</h2>
            <a href="/admin/dashboard/mahasiswa/input"><button>Tambah Mahasiswa</button></a>
        </section>

        <section>
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(mahasiswa, index) in dataMahasiswa">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ mahasiswa.name }}</td>
                        <td>@{{ mahasiswa.nim }}</td>
                        <td>@{{ mahasiswa.class | showClass() }}</td>
                        <td>@{{ mahasiswa.status }}</td>
                        <td>
                            <button @click="redirectToEditPage(mahasiswa.id)">Edit</button>
                            <button @click="deleteMahasiswa(mahasiswa.id, mahasiswa.name)">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="sectionNoDataClassInfo" class="noDataSection" v-if="dataMahasiswa == null || dataMahasiswa.length == 0">
            <p>Belum ada data mahasiswa</p>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/admin/mahasiswa.js') }}"></script>
@endsection
