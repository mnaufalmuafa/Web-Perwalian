<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/pages/admin/dosen.css') }}">
    <title>Dashboard Admin</title>
</head>
<body>
    <header>
        <a href="/"><h1>Web Berita Acara Perwalian</h1></a>
        <hr>
    </header>
    <main id="body-main-content">
        <section id="firstSection">
            <h2>Data Dosen</h2>
            <a href="/admin/dashboard/dosen/input"><button>Tambah Dosen</button></a>
        </section>
        <section>
            <table>
                <tr>
                    <th>No</th>
                    <th>Kode Dosen</th>
                    <th>Kelas Wali</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC</td>
                    <td>IF-45-09<br>IF-43-09</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>ABC</td>
                    <td>IF-45-09</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>ABC</td>
                    <td>IF-45-09<br>IF-43-09</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>ABC</td>
                    <td>IF-45-09</td>
                    <td>
                        <button class="btnEdit">Edit</button>
                        <button>Hapus</button>
                    </td>
                </tr>
            </table>
        </section>
        <section id="sectionNoDataInfo">
            <p>Belum ada data dosen</p>
        </section>
    </main>
    <script type="text/javascript" src="{{ url('/javascript/admin/dosen.js') }}"></script>
</html>