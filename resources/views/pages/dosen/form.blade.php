@extends('layouts.dosen')

@section('add-on-meta')
    <meta name="form_sequence" content="{{ $sequence }}">
@endsection

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/dosen/form.css') }}">
@endsection

@section('title')
    {{ $title }}
@endsection

@section('content')
    <main>
        <form>
            <article class="heading1Article headingArticle">
                <header></header>
                <h1>{{ $form_name }}</h1>
            </article>
            
            <!-- Kode Dosen -->
            <article class="ordinaryArticle">
                <p>Kode Dosen</p>
                <select
                    v-model="selectedLecturerId"
                    @change="selectLecturerOnChange()">
                    <option value="0">-- Kode Dosen --</option>
                    <option v-for="(d, index) in dataDosen" :value="d.id">@{{ d.lecturer_code }}</option>
                </select>
            </article>
            
            <p class="errorMessage" v-if="(arrClass === null || arrClass.length == 0) && selectedLecturerId != 0">Anda tidak memiliki kelas wali</p>
            <p class="info" id="fetchingClass">Fetching data...</p>
            
            <!-- Kelas -->
            <article class="ordinaryArticle" v-if="selectedLecturerId != 0 && arrClass !== null && arrClass.length > 0">
                <p>Pilih Kelas</p>
                <select
                    v-model="selectedClassId"
                    @change="selectClassOnChange()">
                    <option value="0">-- Kelas --</option>
                    <option v-for="(k, index) in arrClass" :value="k.id">@{{ k.name }}</option>
                </select>
            </article>

            <!-- Tahun Ajaran -->
            <article class="ordinaryArticle" v-if="selectedLecturerId !== 0 && arrClass.length > 0 && selectedClassId != 0">
                <p>Tahun Ajaran</p>
                <select
                    v-model="selectedSchoolYearId"
                    @change="reloadWithUpdatedValue()">
                    <option v-for="(ta, index) in arrSchoolYear" :value="ta.id">@{{ ta.first_year + '/' + ta.second_year }}</option>
                </select>
            </article>

            <!-- Semester -->
            <article class="ordinaryArticle" v-if="selectedLecturerId !== 0 && arrClass.length > 0  && selectedClassId != 0">
                <p>Semester</p>
                <input 
                    type="radio" 
                    name="semester" 
                    id="RBSemesterGanjil"
                    value="Ganjil" 
                    @change="rbSemesterOnChange($event)"
                    :checked="selectedSemester == 'Ganjil'">
                <label 
                    for="RBSemesterGanjil">Ganjil</label>
                <br>
                <input 
                    type="radio" 
                    name="semester" 
                    id="RBSemesterGenap" 
                    value="Genap" 
                    @change="rbSemesterOnChange($event)"
                    :checked="selectedSemester == 'Genap'">
                <label 
                for="RBSemesterGenap">Genap</label>
            </article>
            
            <table cellspacing="0" v-if="arrStudent !== null && arrStudent.length > 0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kehadiran</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(student, i) in arrStudent">
                        <td>@{{ i+1 }}</td>
                        <td>@{{ student.nim }}</td>
                        <td>@{{ student.name }}</td>
                        <td>
                            <input type="radio" :name="'presence'+student.nim" value="Hadir">
                            <label>Hadir</label>
                            <br>
                            <input type="radio" :name="'presence'+student.nim" value="Tidak Hadir">
                            <label>Tidak Hadir</label>
                        </td>
                        <td><input type="text" name="keterangan" value=""></td>
                    </tr>
                </tbody>
            </table>
            
            <section v-for="(subform, indexSubForm) in arrQuestions">
                <article class="heading2Article headingArticle">
                    <header></header>
                    <h2>@{{ subform.name }}</h2>
                </article>

                <article class="ordinaryArticle" v-for="question in subform.question">
                    <p>@{{ question.title }}</p>
                    <input type="file" accept=".pdf, .png, .jpg, .jpeg, .svg" v-if="question.question_type == 3">
                    <input type="text" :placeholder="question.hint" v-if="question.question_type == 5">
                    <textarea rows="3" :placeholder="question.hint" v-if="question.question_type == 6"></textarea>
                </article>
            </section>

            <!--
            <article class="ordinaryArticle">
                <p>Pertanyaan 3</p>
                <select>
                    <option>Pilihan 1</option>
                    <option>Pilihan 2</option>
                    <option>Pilihan 3</option>
                </select>
            </article> -->

            <button type="submit" class="btn">Submit</button>
            <div class="clear"></div>
        </form>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/dosen/form.js') }}"></script>
@endsection