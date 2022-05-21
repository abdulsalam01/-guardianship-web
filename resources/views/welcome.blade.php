<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>K-PERWALIAN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('images/logo-stmik.png') }}" rel="icon">
    <link href="{{ asset('images/logo-stmik.png') }}" rel="apple-touch-icon">
    <link rel="icon" href="data:,">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-4/css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="/">K-PERWALIAN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="{{ route('admin') }}">Dashboard</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    @endauth
                </li>
            </ul>
            <span class="navbar-text">

            </span>
        </div>
    </nav>

    <div class="container-fluid mt-5">

        <div class="jumbotron">
            @guest
                <h1 class="display-4">Selamat Datang di K-PERWALIAN</h1>
            @endguest

            @auth
                <h1 class="display-4">Hello , {{ Auth::user()->name }}</h1>
            @endauth

            <p class="lead">K-Perwalian merupakan sistem yang mengelola
                data pelaksanaan
                perwalian oleh mahasiswa dengan dosen wali</p>
        </div>

    </div>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-4/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-4/js/bootstrap.min.js') }}"></script>
</body>

</html>
