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
                            <div v-for="(ta, i) in tahunAjaran">
                                <input type="checkbox" name="" :id="'ta'+i" @click="addTaFilter(ta.id)">
                                <label for="'ta'+i">@{{ ta.tahun_ajaran }}</label>
                                <br>
                            </div>
                        </section>
                    </section>

                    <section class="formSection">
                        <section>
                            <p>Semester</p>
                        </section>
                        <section>
                            <input type="checkbox" name="" id="ganjilOpt" @click="addSemesterFilter('Ganjil')">
                            <label for="ganjilOpt">Ganjil</label>
                            <br>
                            <input type="checkbox" name="" id="genapOpt" @click="addSemesterFilter('Genap')">
                            <label for="genapOpt">Genap</label>
                        </section>
                    </section>

                    <section class="formSection">
                        <section>
                            <p>Form</p>
                        </section>
                        <section>
                            <input type="checkbox" name="" id="form1" @click="addFormIdFilter(1)">
                            <label for="form1">Form 1</label>
                            <br>
                            <input type="checkbox" name="" id="form2" @click="addFormIdFilter(2)">
                            <label for="form2">Form 2</label>
                            <br>
                            <input type="checkbox" name="" id="form3" @click="addFormIdFilter(3)">
                            <label for="form3">Form 3</label>
                        </section>
                    </section>

                    <section class="formSection">
                        <section>
                            <p>Status</p>
                        </section>
                        <section>
                            <input type="checkbox" name="" id="alreadyFill" @click="addStatusFilter('Sudah Mengisi')">
                            <label for="alreadyFill">Sudah Mengisi</label>
                            <br>
                            <input type="checkbox" name="" id="notYetFill" @click="addStatusFilter('Belum Mengisi')">
                            <label for="notYetFill">Belum Mengisi</label>
                        </section>
                    </section>
                </form>
            </section>
        </section>

        <!-- <section id="sortingSection">
            <label for="">Urutkan berdasarkan : </label>
            <select>
                <option>-- Pilih metode pengurutan --</option>
                <option value="">Tahun Ajaran</option>
                <option value="">Semester</option>
                <option value="">Status</option>
            </select>
        </section> -->

        <section id="tableContainer">
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Form</th>
                        <th>Kode Dosen</th>
                        <th>Status</th>
                        <th>Kelas</th>
                        <th>Link File</th>
                        <th>Tanggal Upload</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(fill, index) in fills" v-if="(selectedTahunAjaran.length == 0 || selectedTahunAjaran.includes(fill.school_year_id)) && (selectedSemester.length == 0 || selectedSemester.includes(fill.semester)) && (selectedFormId.length == 0 || selectedFormId.includes(fill.form_id)) && (selectedStatus.length == 0 || selectedStatus.includes(fill.status))">
                        <td>@{{ fill.school_year }}</td>
                        <td>@{{ fill.semester }}</td>
                        <td>@{{ fill.form_id | formName }}</td>
                        <td>@{{ fill.lecturer_code }}</td>
                        <td>@{{ fill.status }}</td>
                        <td>@{{ fill.class_name }}</td>
                        <td><a :href="fill.download_url" target="_blank">@{{ fill.download_url }}</a></td>
                        <td>@{{ fill.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('javascript/pages/admin/dashboard_admin.js') }}"></script>
@endsection