<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/pages/admin/input_angkatan.css') }}">
    <title>Input Angkatan</title>
</head>
<body>
    <header>
        <a href="/"><h1>Web Berita Acara Perwalian</h1></a>
        <hr>
    </header>
    <main id="body-main-content">
        <h2>Input Angkatan</h2>
        <form>
            <label for="inputLecturerCode">Kode Dosen</label>
            <br>
            <input type="number" name="generation" id="inputGeneration" max="9999">
            <input type="submit" value="Submit">
        </form>
    </main>
    <!-- <script type="text/javascript" src="{{ url('/javascript/admin/dosen.js') }}"></script> -->
</html>