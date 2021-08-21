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

        <h2>Rekap Perwalian</h2>
        <section id="filterSection">
            <section>
                <p id="filterTitle">Filter</p> {{-- Semester, Tahun Ajaran, Status --}}
            </section>
            <section>
                <form action="">
                    <section class="formSection">
                        <section>
                            <p>Tahun Ajaran</p>
                        </section>
                        <section>
                            <input type="checkbox" name="" id="ta1">
                            <label for="ta1">2020/2021</label>
                            <br>
                            <input type="checkbox" name="" id="ta2">
                            <label for="ta2">2021/2022</label>
                            <br>
                            <input type="checkbox" name="" id="ta3">
                            <label for="ta3">2021/2022</label>
                        </section>
                    </section>

                    <section class="formSection">
                        <section>
                            <p>Semester</p>
                        </section>
                        <section>
                            <input type="checkbox" name="" id="ganjilOpt">
                            <label for="ganjilOpt">Ganjil</label>
                            <br>
                            <input type="checkbox" name="" id="genapOpt">
                            <label for="genapOpt">Genap</label>
                        </section>
                    </section>

                    <section class="formSection">
                        <section>
                            <p>Status</p>
                        </section>
                        <section>
                            <input type="checkbox" name="" id="ganjilOpt">
                            <label for="ganjilOpt">Sudah Mengisi</label>
                            <br>
                            <input type="checkbox" name="" id="genapOpt">
                            <label for="genapOpt">Belum Mengisi</label>
                        </section>
                    </section>
                </form>
            </section>
        </section>

        <section id="sortingSection">
            <label for="">Urutkan berdasarkan : </label>
            <select>
                <option>-- Pilih metode pengurutan --</option>
                <option value="">Tahun Ajaran</option>
                <option value="">Semester</option>
                <option value="">Status</option>
            </select>
        </section>

        <section id="tableContainer">
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Kode Dosen</th>
                        <th>Status</th>
                        <th>Kelas</th>
                        <th>Link File</th>
                        <th>Tanggal Upload</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2020/2021</td>
                        <td>Genap</td>
                        <td>ASD</td>
                        <td>Belum Mengisi</td>
                        <td>IFX-43-INT</td>
                        <td><a href="#">https://mail.google.com/mail/u/0/#inbox/FfghMfcgzGkZsxGkjJCgNCFEBEDFNfdgsdSAPpCpLKSlqbkMV</a></td>
                        <td>23-09-2021 04:32</td>
                    </tr>
                    <tr>
                        <td>2020/2021</td>
                        <td>Genap</td>
                        <td>SDF</td>
                        <td>Sudah Mengisi</td>
                        <td>IFX-43-INT</td>
                        <td><a href="#">https://mail.google.com/mail/u/0/#inbox/FfghMfcgzGkZsxGkjJCgNCFEBEDFNfdgsdSAPpCpLKSlqbkMV</a></td>
                        <td>23-09-2021 04:32</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('javascript/pages/admin/dashboard_admin.js') }}"></script>
@endsection