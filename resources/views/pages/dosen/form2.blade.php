@extends('layouts.dosen')

@section('add-on-style')
    <link rel="stylesheet" href="{{ url('css/pages/dosen/form2.css') }}">
@endsection

@section('title')
    Form 2
@endsection

@section('content')
    <main>
        <form>
            <article class="heading1Article headingArticle">
                <header></header>
                <h1>Berita Acara Perwalian ke-2</h1>
            </article>
            
            <article class="ordinaryArticle">
                <p>Kode Dosen</p>
                <select>
                    <option>-- Kode Dosen --</option>
                    <option>REG</option>
                    <option>TYG</option>
                    <option>FTG</option>
                    <option>QDF</option>
                </select>
            </article>
            
            <p class="errorMessage">Anda tidak memiliki kelas wali</p>
            <p class="info">Fetching data...</p>
            
            <article class="ordinaryArticle">
                <p>Pilih Kelas</p>
                <select>
                    <option>-- Kelas --</option>
                    <option>IF-42-01</option>
                    <option>IF-42-02</option>
                    <option>IF-42-03</option>
                    <option>IF-42-04</option>
                </select>
            </article>
            
            <table cellspacing="0">
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
                    <tr>
                        <td>1</td>
                        <td>1301140026</td>
                        <td>FAUZAN IRALDI</td>
                        <td>
                            <input type="radio" name="mahasiswaX" value="Hadir">
                            <label>Hadir</label>
                            <br>
                            <input type="radio" name="mahasiswaX" value="Tidak Hadir">
                            <label>Tidak Hadir</label>
                        </td>
                        <td><input type="text" name="keterangan" value=""></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1301140029</td>
                        <td>LUTHFI FAUZANI AHMAD</td>
                        <td>
                            <input type="radio" name="mahasiswa2" value="Hadir">
                            <label>Hadir</label>
                            <br>
                            <input type="radio" name="mahasiswa2" value="Tidak Hadir">
                            <label>Tidak Hadir</label>
                        </td>
                        <td><input type="text" name="keterangan" value=""></td>
                    </tr>
                </tbody>
            </table>
            
            <article class="heading2Article headingArticle">
                <header></header>
                <h2>Perwalian mahasiswa angkatan 2020</h2>
            </article>

            <article class="ordinaryArticle">
                <p>Pertanyaan 1</p>
                <input type="text" placeholder="Hint...">
            </article>

            <article class="ordinaryArticle">
                <p>Pertanyaan 2</p>
                <textarea rows="3" placeholder="Hint..."></textarea>
            </article>

            <article class="ordinaryArticle">
                <p>Pertanyaan 3</p>
                <select>
                    <option>Pilihan 1</option>
                    <option>Pilihan 2</option>
                    <option>Pilihan 3</option>
                </select>
            </article>

            <article class="ordinaryArticle">
                <p>Pertanyaan 4</p>
                <input type="file">
            </article>

            <button type="submit" class="btn">Submit</button>
            <div class="clear"></div>
        </form>
    </main>
@endsection