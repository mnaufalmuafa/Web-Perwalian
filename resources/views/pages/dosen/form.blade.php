@extends('layouts.dosen')

@section('add-on-meta')
    <meta name="form_id" content="{{ $id }}">
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
        <form
            method="POST"
            action="api/post/form/fill"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="form_id" value="{{ $id }}">
            <article class="heading1Article headingArticle">
                <header></header>
                <h1>{{ $form_name }}</h1>
            </article>
            
            <!-- Kode Dosen -->
            <article class="ordinaryArticle">
                <p>Kode Dosen</p>
                <select
                    v-model="selectedLecturerId"
                    @change="selectLecturerOnChange()"
                    name="lecturer_id">
                    <option value="0">-- Kode Dosen --</option>
                    <option v-for="(d, index) in dataDosen" :value="d.id">@{{ d.lecturer_code }}</option>
                </select>
            </article>
            
            <p 
                class="errorMessage" 
                v-if="(arrClass === null || arrClass.length == 0) && selectedLecturerId != 0">
                Anda tidak memiliki kelas wali
            </p>
            
            <!-- Kelas -->
            <article class="ordinaryArticle" v-if="selectedLecturerId != 0 && arrClass !== null && arrClass.length > 0">
                <p>Pilih Kelas</p>
                <select
                    v-model="selectedClassId"
                    @change="selectClassOnChange()"
                    name="class_id"
                    id="selectClass">
                    <option value="0">-- Kelas --</option>
                    <option v-for="(k, index) in arrClass" :value="k.id">@{{ k.name }}</option>
                </select>
            </article>

            <p 
                class="errorMessage" 
                v-if="selectedClassId != 0 && selectedClassGenerationId === 0">
                Tahun angkatan kelas tidak diketahui
            </p>

            <!-- Tahun Ajaran -->
            <article class="ordinaryArticle" v-if="selectedLecturerId !== 0 && arrClass.length > 0 && selectedClassId != 0 && selectedClassGenerationId !== 0">
                <p>Tahun Ajaran</p>
                <select
                    v-model="selectedSchoolYearId"
                    @change="reloadWithUpdatedValue()"
                    name="school_year_id"
                    id="selectTahunAjaran">
                    <option v-for="(ta, index) in arrSchoolYear" :value="ta.id">@{{ ta.first_year + '/' + ta.second_year }}</option>
                </select>
            </article>

            <!-- Semester -->
            <article class="ordinaryArticle" v-if="selectedLecturerId !== 0 && arrClass.length > 0  && selectedClassId != 0 && selectedClassGenerationId !== 0">
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
            
            <p 
                class="errorMessage" 
                v-if="selectedClassId != 0 && !(arrStudent !== null && arrStudent.length > 0 && selectedClassGenerationId !== 0)">
                Tidak ada mahasiswa yang terdaftar di kelas
            </p>

            <p 
                class="errorMessage" 
                v-if="formHasBeenFilled">
                @{{ | formHasBeenFilledText }}
            </p>

            <section id="sectionPresenceAll" v-if="arrStudent !== null && arrStudent.length > 0 && selectedClassGenerationId !== 0 && !formHasBeenFilled">
                <p>Hadirkan semua</p>
                <div class="toggleWrapper" id="togglePresenceAll">
                    <div class="circleToggle"></div>
                </div>
            </section>

            <table cellspacing="0" v-if="arrStudent !== null && arrStudent.length > 0 && selectedClassGenerationId !== 0 && !formHasBeenFilled">
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
                            <input type="radio" :name="'presence'+student.nim" value="Hadir" required>
                            <label>Hadir</label>
                            <br>
                            <input type="radio" :name="'presence'+student.nim" value="Tidak Hadir" @click="unableToggle">
                            <label>Tidak Hadir</label>
                        </td>
                        <td><input type="text" :name="'keterangan'+student.nim" value=""></td>
                    </tr>
                </tbody>
            </table>
            
            <!-- Pertanyaan -->
            <section 
                v-for="(subform, indexSubForm) in arrQuestions"
                v-if="selectedClassGenerationId >= subform.min_generation_id && selectedClassGenerationId <= subform.max_generation_id && arrStudent !== null && arrStudent.length > 0 && selectedClassGenerationId !== 0 && !formHasBeenFilled">
                <article class="heading2Article headingArticle">
                    <header></header>
                    <h2>@{{ subform.name }}</h2>
                </article>

                <article 
                    class="ordinaryArticle" 
                    v-for="(question, questionIndex) in subform.question">
                    <p>@{{ question.title }}</p>
                    <input 
                        type="file" 
                        accept=".pdf, .png, .jpg, .jpeg, .svg, .zip, .rar, .tgz" 
                        v-if="question.question_type == 3" 
                        :name="'question' + questionIndex"
                        required>
                    
                    <input 
                        type="text" 
                        :placeholder="question.hint" 
                        v-if="question.question_type == 5" 
                        :name="'question' + questionIndex"
                        required>
                    
                    <textarea 
                        rows="3" 
                        :placeholder="question.hint" 
                        v-if="question.question_type == 6"
                        :name="'question' + questionIndex" 
                        required></textarea>

                    <input 
                        type="hidden" 
                        :name="'question' + questionIndex + '_type_id'"
                        :value="question.question_type">
                </article>
            </section>

            <button 
                type="submit" 
                class="btn"
                v-if="arrStudent !== null && arrStudent.length > 0 && selectedClassGenerationId !== 0 && arrQuestions.length > 0  && !formHasBeenFilled">
                Submit
            </button>
            <div class="clear"></div>
        </form>
    </main>
@endsection

@section('add-on-script')
    <script type="text/javascript" src="{{ url('/javascript/pages/dosen/form.js') }}"></script>
@endsection