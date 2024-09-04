@extends('layout.main')

@section('title', 'Halo Laravel')

@section('content')
    <h2>Selamat datang di halaman Halo Laravel</h2>
    <p>Ini adalah halaman contoh dengan layout Blade sederhana.</p>
    <p>Nama saya adalah {{$namaku}} dan saya berasal dari {{$alamat}}</p>
@endsection
