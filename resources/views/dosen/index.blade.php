@extends('layout.backend.app',[
	'title' => 'Welcome',
	'pageTitle' => '',
])
@section('content')
<div class="jumbotron">
  <h1 class="display-5">Selamat Datang, {{ Auth::user()->name }}</h1>
  <hr class="my-4">
  <p>Anda login sebagai {{ Auth::user()->roles == 'student' ? 'Mahasiswa' : 'Dosen' }}</p>
</div>
@endsection
