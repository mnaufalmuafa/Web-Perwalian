<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/pages/admin/kelas.css') }}">
    <title>Data Kelas</title>
</head>
<body>
    <header>
        <a href="/"><h1>Web Berita Acara Perwalian</h1></a>
        <hr>
    </header>
    <main id="body-main-content">
        <section id="classHeadingSection" class="headingSection">
            <h2>Data Kelas</h2>
            <a href="/admin/dashboard/dosen/input"><button>Tambah Kelas</button></a>
        </section>

        <section id="classDaataSection">
            <table cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Angkatan</th>
                    <th>Dosen Wali</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>IF-45-09</td>
                    <td>2018</td>
                    <td>ABC</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
            </table>
        </section>

        <section id="sectionNoDataClassInfo" class="noDataSection">
            <p>Belum ada data kelas</p>
        </section>

        <section id="classHeadingSection" class="headingSection">
            <h2>Data Angkatan</h2>
            <a href="/admin/dashboard/angkatan/input"><button>Tambah Angkatan</button></a>
        </section>

        <section>
            <table cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Tahun Angkatan</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2018</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2019</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2020</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
            </table>
        </section>

        <section id="sectionNoDataGenerationInfo" class="noDataSection">
            <p>Belum ada data angkatan</p>
        </section>
    </main>
    <!-- <script type="text/javascript" src="{{ url('/javascript/pages/admin/dosen.js') }}"></script> -->
</html>