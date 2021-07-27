<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/pages/admin/input_mahasiswa.css') }}">
    <title>Input Mahasiswa</title>
</head>
<body>
    <header>
        <a href="/"><h1>Web Berita Acara Perwalian</h1></a>
        <hr>
    </header>
    <main id="body-main-content">
        <h2>Input Mahasiswa</h2>
        <form>
            <label for="inputName">Nama</label>
            <br>
            <input type="text" name="name" id="inputName">

            <label for="inputNIM">NIM</label>
            <br>
            <input type="number" name="nim" id="inputNIM" max="9999999999" min="1000000000">

            <label for="inputStatus">Status</label>
            <br>
            <select name="status" id="inputStatus">
                <option value="1">Aktif</option>
                <option value="2">Tidak Aktif</option>
            </select>

            <label for="inputClassId">Kelas</label>
            <br>
            <select name="class_id" id="inputClassId">
                <option value="0">--Pilih Kelas--</option>
                <option value="1">IF-42-01</option>
                <option value="1">IF-42-02</option>
                <option value="1">IF-42-03</option>
                <option value="1">IF-42-04</option>
                <option value="1">IF-42-05</option>
            </select>

            <input type="hidden" name="is_deleted" value="0">

            <input type="submit" value="Submit">
        </form>
    </main>
    <!-- <script type="text/javascript" src="{{ url('/javascript/admin/dosen.js') }}"></script> -->
</html>