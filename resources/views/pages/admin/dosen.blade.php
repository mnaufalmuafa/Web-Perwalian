@extends('layouts.admin')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/admin/dosen.css') }}">
@endsection

@section('title')
    Data Dosen
@endsection

@section('content')
    <main id="body-main-content">
        <section id="firstSection">
            <h2>Data Dosen</h2>
            <a href="/admin/dashboard/dosen/input"><button>Tambah Dosen</button></a>
        </section>
        <section>
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Dosen</th>
                        <th>Kelas Wali</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(d, index) in dataDosen">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ d.lecturer_code }}</td>
                        <td>-</td>
                        <td>
                            <button class="btnEdit">Edit</button>
                            <button>Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section id="sectionNoDataInfo" v-if="dataDosen.length == 0">
            <p>Belum ada data dosen</p>
        </section>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/admin/dosen.js') }}"></script>
@endsection
