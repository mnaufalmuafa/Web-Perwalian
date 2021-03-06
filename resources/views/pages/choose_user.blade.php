<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/choose_user.css') }}">
    <title>Pilih user</title>
</head>
<body>
    <header>
        <a href="/"><h1>Web Berita Acara Perwalian</h1></a>
        <hr>
    </header>
    <main id="body-main-content">
        <article>
            <header>
                <h2>Siapa yang menggunakan web?</h2>
            </header>
            <main id="article-main-content">
                <a href="/beranda">
                    <figure>
                        <img src="{{ url('image/icon/lecturer.jpeg') }}" >
                        <figcaption>Dosen</figcaption>
                    </figure>
                </a>
                <a href="/login_admin">
                    <figure id="adminFigure">
                        <img src="{{ url('image/icon/admin.jpeg') }}" >
                        <figcaption>Admin</figcaption>
                    </figure>
                </a>
            </main>
        </article>
    </main>
    <script type="text/javascript" src="{{ url('javascript/choose_user.js') }}"></script>
</html>