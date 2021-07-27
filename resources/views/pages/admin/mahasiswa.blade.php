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
    <title>Data Mahasiswa</title>
</head>
<body>
    <header>
        <a href="/"><h1>Web Berita Acara Perwalian</h1></a>
        <hr>
    </header>
    <main id="body-main-content">
        <section id="classHeadingSection" class="headingSection">
            <h2>Data Mahasiswa</h2>
            <a href="/admin/dashboard/mahasiswa/input"><button>Tambah Mahasiswa</button></a>
        </section>

        <section id="classDaataSection">
            <table cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>FAUZAN IRALDI</td>
                    <td>1301140026</td>
                    <td>IF-38-06</td>
                    <td>Aktif</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>LUTHFI FAUZANI AHMAD</td>
                    <td>1301140027</td>
                    <td>IF-38-06</td>
                    <td>Aktif</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>ERBINA SELVIA BR. PERANGIN-ANGIN</td>
                    <td>1301140028</td>
                    <td>IFX-38-06-INT</td>
                    <td>Tidak Aktif</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
            </table>
        </section>

        <section id="sectionNoDataClassInfo" class="noDataSection">
            <p>Belum ada data mahasiswa</p>
    </main>
    <script type="text/javascript" src="{{ url('/javascript/pages/admin/mahasiswa.js') }}"></script>
</html>