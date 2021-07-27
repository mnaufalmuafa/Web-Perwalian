<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/pages/admin/input_kelas.css') }}">
    <title>Input Kelas</title>
</head>
<body>
    <header>
        <a href="/"><h1>Web Berita Acara Perwalian</h1></a>
        <hr>
    </header>
    <main id="body-main-content">
        <h2>Input Kelas</h2>
        <form>
            <label for="inputLecturerCode">Nama Kelas</label>
            <br>
            <input type="text" name="name" id="inputName">

            <label for="inputGeneration">Angkatan</label>
            <br>
            <select name="generation_id" id="inputGeneration">
                <option value="1">2014</option>
                <option value="2">2015</option>
                <option value="3">2016</option>
                <option value="4">2017</option>
                <option value="5">2018</option>
                <option value="6">2019</option>
                <option value="7">2020</option>
                <option value="8">2021</option>
            </select>

            <label for="inputHomeroom">Dosen Wali</label>
            <br>
            <select name="homeroom_id" id="inputHomeroom">
                <option value="1">ABC</option>
                <option value="1">DEF</option>
            </select>

            <input type="hidden" name="is_deleted" value="0">

            <input type="submit" value="Submit">
        </form>
    </main>
    <!-- <script type="text/javascript" src="{{ url('/javascript/admin/dosen.js') }}"></script> -->
</html>